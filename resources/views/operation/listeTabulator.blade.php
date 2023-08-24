@extends('../layout/' . $layout)

@section('subhead')
    <title>GMAO</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Liste des opérations</h2>

        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="dropdown ml-auto sm:ml-0">
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> New Category
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="users" class="w-4 h-4 mr-2"></i> New Group
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- BEGIN: Wizard Layout "intro-y px-5 box box-border h-100 w-150 sm:pt-6  -->
    <div>
 
        <div class="intro-y box px-10 sm:py-20 mt-5  sm:pt-6">
                <div class="font-medium text-base">Filtre</div>
            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <label for="input-wizard-1" class="form-label">De</label> 
                        <div class="relative mx-auto">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                <i data-feather="calendar" class="w-4 h-4"></i>
                            </div>
                            <input id="date1" type="text" class="datepicker form-control pl-12" data-single-mode="true">                                                    
                        </div>                               
                    </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <label for="input-wizard-2" class="form-label">A</label>
                    <div class="relative mx-auto">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                <i data-feather="calendar" class="w-4 h-4"></i>
                            </div>
                        <input id="date2" type="text" class="datepicker form-control pl-12" data-single-mode="true">

                    </div>
                </div>
                
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="form-group">
                                    <select data-search="false" class="tail-select w-full" id="technicienId"  name="user_id">
                                        <option  disabled selected value="">Selectionner un utilisateur</option>
                                        @foreach ($dataTech as $user)
                                            <option value="{{$user->name}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="form-group">
                                    <select data-search="false" class="tail-select w-full" id="terminalId"  name="terminal_id">
                                        <option  disabled selected value="">Selectionner un terminal</option>
                                        @foreach ($dataTer as $term)
                                            <option value="{{$term->Name}}">{{$term->Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="form-group">
                                    <select data-search="false" class="tail-select w-full" id="ModeleId"  name="modele_id">
                                        <option  disabled selected value="">Selectionner un modèle</option>
                                        @foreach ($dataM as $modele)
                                            <option value="{{$modele->Name}}">{{$modele->Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="form-group">
                                    <select data-search="false" class="tail-select w-full" id="MarchandId"  name="marchand_id">
                                        <option  disabled selected value="">Selectionner un marchand</option>
                                        @foreach ($dataMar as $marchand)
                                            <option value="{{$marchand->Name}}">{{$marchand->Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="form-group">
                                    <select data-search="false" class="tail-select w-full" id="fabriquantId"  name="fabriquant_id">
                                        <option  disabled selected value="">selectionner un marchand</option>
                                        @foreach ($dataF as $fabriquant)
                                            <option value="{{$fabriquant->Name}}">{{$fabriquant->Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                   <!--  <button class="btn btn-secondary w-24" id="filtreDynamique">Previous</button>
                    <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-24" >Reset</button> -->
                    <button id="searchButton" type="button" class="btn btn-primary w-24">Chercher</button>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
<!--             <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" >
                <div class="sm:flex items-center sm:mr-4">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Field</label>
                    <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 xxl:w-full mt-2 sm:mt-0 sm:w-auto">
                        <option value="name">Name</option>
                        <option value="category">Category</option>
                        <option value="remaining_stock">Remaining Stock</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Type</label>
                    <select id="tabulator-html-filter-type" class="form-select w-full mt-2 sm:mt-0 sm:w-auto" >
                        <option value="like" selected>like</option>
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value="<=">&lt;=</option>
                        <option value=">">></option>
                        <option value=">=">>=</option>
                        <option value="!=">!=</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                    <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 xxl:w-full mt-2 sm:mt-0"  placeholder="Search...">
                </div>
                <div class="mt-2 xl:mt-0">
                    <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16" >Go</button>
                    <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1" >Reset</button>
                </div>
            </form> -->
            <div class="flex mt-5 pull-right">
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
                            <a id="tabulator-export-pdf" href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export PDF
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
            <div id="listeOperation" class="mt-5 table-report table-report--tabulator"></div>
        </div>
    </div>
    <!-- END: HTML Table Data -->
@endsection
@section('script')
    <script>
        cash(function () {
            cash('#filtreDynamique').on('click', function() {
                
                alert("hello");
            })

        })        
    </script>
@endsection
