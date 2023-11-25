<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\Faturas;
use GuzzleHttp\Client;

class Fatura extends Component
{
    public $selectsaldo = 0, $showAlert, $meusaldo, $auth, $enablefaturas = false,$viewpagas=false,$viewpandentes=false;
    public $faturas = array();
    public $notasfiscais = array();


    public function  mount()
    {
        $this->auth = Auth::user();
        $this->meusaldo = $this->auth->saldo;
        $this->faturas = $this->auth->faturas;
    }

    public function viewFaturas()
    {
        $this->enablefaturas = true;
        $this->viewpagas=false;
    }

    public function viewSaldo()
    {
        $this->meusaldo = $this->auth->saldo;
    }

    public function getpagamentos()
    {
        $url = "http://localhost:8080/pagamento/todos";
        $client = new Client();
        try {
            $response = $client->get($url);
            $body = json_decode($response->getBody(), true);                     
            $this->notasfiscais=$body;          
        } catch (\Exception $e) {
            session()->flash('saldonegativo', $e->getMessage());
        }
    }

    public function faturaspagas(){
        $this->viewpagas=true;  
        $this->viewpandentes=false;     
    }

    public function faturaspendetes(){
        $this->viewpagas=false;  
        $this->viewpandentes=true;     
    }

    public function pagar($fatura_id)
    {
        $fatura = Faturas::Find($fatura_id);

        $url = "http://localhost:8080/pagamento/realizarpagamento/saldo={$this->auth->saldo}/valorfatura={$fatura->valor}/data={$fatura->data}/status={$fatura->status}/idfatura={$fatura->id}";
    

        $client = new Client();

        try {
            if ($fatura->status == 'pendente') {
                $response = $client->post($url);
                $body = json_decode($response->getBody(), true);
                if ($response->getStatusCode() == 200) {
                    $fatura->status = 'pago';
                    $this->auth->saldo = $body['saldoAtualizado'];
                    $this->auth->save();
                    $fatura->save();
                    session()->flash('Faturasucesso', 'Pagamento Realizado com sucesso !!');
                }
            } else {
                session()->flash('saldonegativo', 'Esta fatura ja foi paga !!');
            }
        } catch (\Exception $e) {
            if ($this->auth->saldo < $fatura->valor)
                session()->flash('saldonegativo', 'Failure saldo indisponivel !!');

            session()->flash('saldonegativo', $e->getMessage());
        }
    }

    

    public function gerarFaturas()
    {
        $numeroDeFaturas = 1;
        for ($i = 0; $i < $numeroDeFaturas; $i++) {

            Faturas::create([
                'user_id' => $this->auth->id, 
                'valor' => rand(50, 200),
                'data' => now()->subDays(rand(1, 30)),
                'status' => 'pendente',
            ]);
        }          
        session()->flash('Faturasucesso', 'Faturas Geradas deste mes !!'); 
        $this->viewFaturas();       
    }

    public function AddSaldo()
    {
        $user = new User();
        $auth = Auth::user();
        $id = $auth->id;
        $user = User::Find($id);
        $user->saldo += $this->selectsaldo;
        $user->save();
        $this->selectsaldo = 0;


        $this->viewSaldo();

        session()->flash('sucesso', 'Saldo Efetuado !!');
    }


    public function closealert()
    {
        $this->showAlert = false;   
    }


    public function render()
    {
        return view('livewire.fatura');
    }
}
