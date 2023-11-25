<div>
    @if (session()->has('sucesso'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Sucesso !!</strong>
            <span class="block sm:inline">{{ session('sucesso') }}.</span>
            <span wire:click.prevent='closealert' class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif

    @if (session()->has('Faturasucesso'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Sucesso !!</strong>
            <span class="block sm:inline">{{ session('Faturasucesso') }}.</span>
            <span wire:click.prevent='closealert' class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif

    @if (session()->has('saldonegativo'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error !!</strong>
            <span class="block sm:inline">{{ session('saldonegativo') }}.</span>
            <span wire:click.prevent='closealert' class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif

    <div class="">
        <div>
            <h1 class=" mt-8 mb-4 text-5xl font-medium text-gray-900 font-bold transform hover:text-blue-600 transition-transform hover:scale-95 pb-6 mt-2 text-2xl font-medium text-gray-900 ">
                @payment-dad
            </h1>
        </div>

        <div class="flex transform hover:text-blue-600 transition-transform hover:scale-95 pb-2 mt-2 text-2xl font-medium text-gray-900">
            <h1 class="pr-2 ">
                Gerar Fatura
            </h1>
            <button wire:click="gerarFaturas"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800">
                Gerar
                <span class="material-symbols-outlined">sync</span>
            </button>

            <h1 class="pl-4 pr-2 ">
                Faturas Pagas
            </h1>
            <button wire:click.prevent="faturaspagas"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 white:bg-green-600 white:hover:bg-green-700 white:focus:ring-green-800">
                Conferir
                <span class="material-symbols-outlined">sync</span>
            </button>

            <h1 class="pl-4 pr-2 ">
                Faturas Pendentes
            </h1>
            <button wire:click.prevent="faturaspendetes"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 white:bg-orange-600 white:hover:bg-orange-700 white:focus:ring-orange-800">
                Conferir
                <span class="material-symbols-outlined">sync</span>
            </button>

        </div>
    </div>

    <div class="pt-16 grid grid-flow-col justify-around ...">
        <div>
            <h1 class="transform hover:text-blue-600 transition-transform hover:scale-105  mt-2 text-2xl font-medium text-gray-900">
                Saldo
            </h1>

            <div class="">

                <form class="max-w-sm mx-auto pb-4">
                    <label for="number-input"
                        class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Depositar:</label>
                    <input wire:model.live="selectsaldo" type="number" id="number-input"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500"
                        placeholder="90210" required>
                </form>

                <button wire:click="AddSaldo" id="apropria" class="rounded-md bg-blue-600 font-bold text-slate-50"
                    type="text">
                    <span class="material-symbols-outlined">add</span>Adicionar
                </button>

                <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Saldo
                    Disponivel:</label>
                <span wire:click.prevent="viewSaldo"
                    class="bg-green-500 text-green-800 text-lg font-lg me-2 px-2.5 py-0.5 rounded white:bg-green-900 dark:text-white-300">{{ $meusaldo }}</span>

            </div>
        </div>
     
        <div class="pl-16">
            <div wire:click.prevent="viewFaturas">
                <h1 class="transform hover:text-blue-600 transition-transform hover:scale-105 pb-6 mt-2 text-2xl font-medium text-gray-900">
                    Faturas
                </h1>
            </div>
            @if ($enablefaturas || $faturas)
                <div class=" lg:flex lg:flex-wrap">
                    @foreach ($faturas as $fatura)
                        @if ($fatura->status == 'pendente' && $viewpagas==false)
                            <div
                                class="max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow white:bg-gray-800 white:border-gray-700 lg:w-1/1">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 white:text-white">
                                    {{ $fatura->status }}
                                </h5>
                                <p class="mb-3 font-normal text-gray-700 white:text-gray-400">Gerada em : {{ $fatura->data }}</p>
                                <p class="mb-3 font-normal text-gray-700 white:text-gray-400">R$ {{ $fatura->valor }}</p>
                                <button wire:click.prevent="pagar({{ $fatura->id }})"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800">
                                    Pagar
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                        @if ($fatura->status == 'pago' && $viewpagas && !$viewpandentes) 
                            <div
                                class="max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow white:bg-gray-800 white:border-gray-700 lg:w-1/1">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 white:text-white">
                                    {{ $fatura->status }}
                                </h5>
                                <p class="mb-3 font-normal text-gray-700 white:text-gray-400">Gerada em : {{ $fatura->data }}</p>
                                <p class="mb-3 font-normal text-gray-700 white:text-gray-400">R$ {{ $fatura->valor }}</p>
                                <button wire:click.prevent="pagar({{ $fatura->id }})"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800">
                                    Pagar
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                        @if ($fatura->status == 'pendente' && $viewpagas==false && $viewpandentes==true)
                            <div
                                class="max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow white:bg-gray-800 white:border-gray-700 lg:w-1/1">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 white:text-white">
                                    {{ $fatura->status }}
                                </h5>
                                <p class="mb-3 font-normal text-gray-700 white:text-gray-400">Gerada em : {{ $fatura->data }}</p>
                                <p class="mb-3 font-normal text-gray-700 white:text-gray-400">R$ {{ $fatura->valor }}</p>
                                <button wire:click.prevent="pagar({{ $fatura->id }})"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800">
                                    Pagar
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

        </div>
    </div>

    <div class=" pt-16 grid grid-flow-row  ...">
        <div class="pb-4">
            <h1 class="mt-2 text-2xl font-medium text-gray-900 pb-4">
                Notas Fiscais
            </h1>

            <button wire:click.prevent="getpagamentos" id="apropria"
                class="rounded-md bg-blue-600 font-bold text-slate-50" type="text">
                <span class="material-symbols-outlined">add</span>Ver
            </button>
        </div>
        <div class="lg:flex lg:flex-wrap">
            @foreach ($notasfiscais as $notas)
                <div class="max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow white:bg-gray-800 white:border-gray-700 lg:w-1/1">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 white:text-white">
                        {{ $notas['codigo'] }}
                    </h5>
                    <p class="mb-3 font-normal text-gray-700 white:text-gray-400">Empresa : {{ $notas['empresa'] }} </p>
        
                    
                    <p class="mb-3 font-normal text-gray-700 white:text-gray-400">Pago em :
                        {{ \Carbon\Carbon::parse($notas['dataTransacao'])->format('d/m/Y') }}</p>
        
                    
                    <p class="mb-3 font-normal text-gray-700 white:text-gray-400">Hora do pagamento :
                        {{ \Carbon\Carbon::parse($notas['dataTransacao'])->format('H:i:s') }}</p>
        
                    <p class="mb-3 font-normal text-gray-700 white:text-gray-400">Faturamento : {{ $notas['data'] }} </p>
                    <span class="bg-green-500 text-green-800 text-xs font-lg me-2 px-2.5 py-0.5 rounded white:bg-green-900 dark:text-white-300">{{ $notas['status'] }}</span>
                    <p class="mb-3 font-normal text-gray-700 white:text-gray-400">Valor : $RS {{ $notas['precoFatura'] }} </p>
                    <p class="mb-3 font-normal text-gray-700 white:text-gray-400">Saldo: $RS {{ $notas['saldoAtualizado'] }}</p>
                </div>
            @endforeach
        </div>
        
    </div>
