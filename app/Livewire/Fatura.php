<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\Faturas;

class Fatura extends Component
{
    public $selectsaldo = 0, $showAlert,$meusaldo,$auth,$enablefaturas=false;
    public $faturas=array();


    public function  mount(){
        $this->auth = Auth::user();
        $this->meusaldo=$this->auth->saldo;  
        $this->faturas=$this->auth->faturas;   
    }

    public function viewFaturas(){
        $this->enablefaturas=true;
    }

    public function viewSaldo(){
        $this->meusaldo=$this->auth->saldo; 
    }




    public function gerarFaturas()
    {
        
        $numeroDeFaturas = 2;

        for ($i = 0; $i < $numeroDeFaturas; $i++) {
            
          Faturas::create([
                'user_id' => $this->auth->id, // Substitua pelos IDs de usuários existentes
                'valor' => rand(50, 200),
                'data' => now()->subDays(rand(1, 30)),
                'status' =>'pendente',
            ]);
        }

        
        
       $this->viewFaturas();
        return session()->flash('Faturasucesso', 'Faturas Geradas deste mes !!');
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
