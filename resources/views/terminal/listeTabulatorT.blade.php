@extends('../layout/' . $layout)



@section('subhead')

    <title>Tabulator - Rubick - Tailwind HTML Admin Template</title>

@endsection



@section('subcontent')

                @if($messageError==1)

                    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">

                        <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> ce terminal existe deja

                        <button type="button" class="btn-close pull" data-bs-dismiss="alert" aria-label="Close">

                            <i data-feather="x" class="w-4 h-4"></i>

                        </button>

                    </div>

                @elseif($messageError==0)

                    <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">

                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> Nouvel ajout 

                        <button type="button" class="btn-close pull" data-bs-dismiss="alert" aria-label="Close">

                            <i data-feather="x" class="w-4 h-4"></i>

                        </button>

                    </div>

                @endif

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

        <h2 class="text-lg font-medium mr-auto">Liste des terminaux</h2>

        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

            <a href="javascript:;" data-toggle="modal" data-target="#modalForm" class="btn btn-primary shadow-md mr-2">Nouveau

            

                <div class="dropdown ml-auto sm:ml-0">

                    <button class="dropdown-toggle ml-5 btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">

                        <span class="w-5 h-5 flex items-center justify-center">

                            <i class="w-4 h-4" data-feather="plus"></i>

                        </span>

                    </button>

                    <!-- <div class="dropdown-menu w-40">

                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2">

                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                                <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> New Category

                            </a>

                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                                <i data-feather="users" class="w-4 h-4 mr-2"></i> New Group

                            </a>

                        </div>

                    </div> -->

                </div>

            </a>

        </div>

    </div>

    <!-- BEGIN: HTML Table Data -->

    <div class="intro-y box p-5 mt-5">

        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">

            <div class="flex mt-5 sm:mt-0">

                <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2">

                    <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print

                </button>

                <div class="dropdown w-1/2 sm:w-auto">

                    <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false">

                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export <i data-feather="chevron-down" class="w-4 h-4 ml-auto sm:ml-2"></i>

                    </button>

                    <div class="dropdown-menu w-40">

                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2">

                            <a id="tabulator-export-csv" href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export CSV

                            </a>

                            <a id="tabulator-export-json" href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export JSON

                            </a>

                            <a id="tabulator-export-xlsx" href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export XLSX

                            </a>

                            <a id="tabulator-export-html" href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export HTML

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="overflow-x-auto scrollbar-hidden">

            <div id="terminalListe" class="mt-5 table-report table-report--tabulator"></div>

        </div>

    </div>

    <!-- END: HTML Table Data -->

    <!-- START:Modal Table formular -->

    <div id="modalForm" class="modal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-body p-10 text-center">

                        <h2 class="text-lg font-medium mr-auto">Formulaire du Terminal</h2>

                    </div>

                                <div class="intro-y box">

                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                    <h2 class="font-medium text-base mr-auto">ADS.net Terminals</h2>

                </div>

                <div id="vertical-form" class="p-5">

                    <div class="preview">

                        <form method="post" action="{{route('addTerm')}}">

                                    @csrf

                                    @method('put')

                        <div>

                                <label for="vertical-form-1" class="form-label">Terminal</label>

                                <input type="text" id="vertical-form-1" class="form-control" name="Name" placeholder="{{ __('nom du terminal') }}" value="" required />

                            </div>

                            <div class="mt-3">

                                <label class="form-label" for="Fabriquant">{{ __('Fabriquant') }}</label>

                                <div class="form-group">

                                            <select data-search="false" class="tail-select w-full" id="fabriquantId"  name="fabriquant_id">

                                                <option  disabled selected value="Choississez un Modèle">Choississez un Fabriquant</option>

                                                @foreach ($dataFabriquant as $nameF)

                                                        <option value="{{$nameF->id}}">{{$nameF->Name}}</option>

                                                @endforeach

                                            </select>

                                </div>

                            </div>

                            <div class="mt-3">



                                <label class="form-label" for="Modeles">{{ __('Modele') }}</label>

                                        <div>

                                            <div class="form-group" id="DivMod">

                                                <select class="tail-select" id="ModeleId" name="modeles_id">

                                                    <option  disabled selected value="Choississez un Modèle">Choississez un Modèle</option>

                                                

                                                </select>

                                            </div>

                                        </div>

                            </div>

                            

                            <div class="mt-3">

                                <label class="form-label" for="NumeroSerie">{{__('Numéro de série')}}</label>

                                <input type="number" class="form-control" name="NumeroSerie" style="-moz-appearance: textfield" placeholder="{{__('Entrez le numéro de série')}}">

                            </div>

                            <div class="mt-3">

                                <label class="form-label" for="PartName">{{__('part number')}}</label>



                                <input type="text" class="form-control" name="PartName" placeholder="{{__('Entrez le pash number')}}">



                            </div>

                            <div class="mt-3">   

                                <label class="form-label" for="input-operator">{{ __('Opérateur carte') }}</label>

                                <div class="form-group">

                                    <select data-search="false" class="tail-select w-full" name="OperateurCarte">

                                        <option  disabled selected value="Choississez un Opérateur">Choississez un Opérateur</option>

                                        <option  value="MTN">MTN</option>

                                        <option  value="ORANGE">ORANGE</option>

                                        <option  value="NEXTTEL">NEXTTEL</option>

                                        <option  value="CAMTEL">CAMTEL</option>

                                    </select>

                                </div>

                            </div>

                            <div class="mt-3">

                                <label class="form-label" for="SIMId">{{ __('SIMId') }}</label>

                                <input class="form-control" name="SIMId" type="number" placeholder="{{ __('Entrez le numéro de SIM') }}" value="" required />

                            </div>

                            <div class="mt-3">

                                <label class="form-label" for="Marchand">{{ __('Marchand') }}</label>

                                <div class="form-group">

                                    <select data-search="false" class="tail-select w-full" name="marchants_id">

                                        <option  disabled selected value="Choississez un Marchand">Choississez un Marchand</option>

                                        @foreach ($dataMarchand as $nameM)

                                                <option value="{{$nameM->id}}">{{$nameM->Name}}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            <div class="mt-3">

                                <label class="form-label" for="villes">{{ __('Villes') }}</label>

                                <div class="form-group">

                                    <select data-search="false" required class="tail-select w-full" name="villes_id">

                                        <option  disabled selected value="Choississez une Ville">Choississez une Ville</option>

                                        @foreach ($dataVilles as $nameM)

                                                <option value="{{$nameM->id}}">{{$nameM->Name}}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            <button id="" class="btn btn-primary mt-5"  type="submit" >Enregistrer</button>





                        </form>

                    </div>

                </div>

            </div>

                </div>

            </div>

        </div>

    </div>



@endsection



@section('script')

    <script>

        cash(function () {

            async function modelByFabriq(fabriquantId) {

                axios.get('http://127.0.0.1:8000/api/modeles/'+fabriquantId)

                .then(response => response)

                .then(modeleElement => {

                console.log('Success modele by fabriquant:', modeleElement);

                var selectField = '<select class="tail-select" id="ModeleId" name="modeles_id">';

                for(var i=0; i < modeleElement.data.length; i++) {

                    console.log(modeleElement.data[i].Name);

                    //addMarchand(marchands[i].Name);

                    selectField +='<option value=' + modeleElement.data[i].id + '>' + modeleElement.data[i].Name + '</option>';

                    //alert(cash('#ModeleId').html());

                }

                selectField +="</select>";

                cash('#DivMod').empty();

                cash('#DivMod').html(selectField);

                })

                .catch((error) => {

                    console.error('Error modeleElement:', error);

                }); 



            }

            cash('#login-form').on('keyup', function(e) {

                if (e.keyCode === 13) {

                    login()

                }

            })

            

            cash('#btn-term').on('click', function() {

                alert("you have clicked");

            })

             cash('#fabriquantId').on('change', function() {

                

                let fab = cash('#fabriquantId').val() ;

                modelByFabriq(fab);

            })

        })

    </script>

@endsection



