@extends('../layout/' . $layout)

@section('subhead')
    <title>Terminal Formulaire </title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Formulaire du Terminal</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
        </div>
</div>
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('addTerm') }}" class="form-horizontal">
            @csrf
            @method('put')
            @if($messageError)
                        <p class="text-danger text-center">Le terminal que vous venez d'entrer existe déjà dans la base de données</p>
                    @endif
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Nouveau Terminal') }}</h4>
                <p class="card-category">{{ __('Entrées') }}</p>
              </div>
              <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="Nom">{{ __('Nom') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <input type="text" class="form-control" name="Name" placeholder="{{ __('nom du terminal') }}" value="" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                                <label class="col-sm-2 col-form-label" for="Fabriquant">{{ __('Fabriquant') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="my-1 mr-sm-2 custom-select" id="fabriquantId"  name="fabriquant_id">
                                            <option  disabled selected value="Choississez un Modèle">Choississez un Fabriquant</option>
                                            @foreach ($dataFabriquant as $nameF)
                                                    <option value="{{$nameF->id}}">{{$nameF->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                     </div>
                    <div class="row">
                                <label class="col-sm-2 col-form-label" for="Modeles">{{ __('Modele') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="my-1 mr-sm-2 custom-select" id="ModeleId" name="modeles_id">
                                            <option  disabled selected value="Choississez un Modèle">Choississez un Modèle</option>
                                           
                                        </select>
                                    </div>
                                </div>
                     </div>
                     <div class="row">
                            <label class="col-sm-2 col-form-label" for="NumeroSerie">{{__('Numéro de série')}}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="NumeroSerie" style="-moz-appearance: textfield" placeholder="{{__('Entrez le numéro de série')}}">
                                </div>
                            </div>
                    </div>
                    <div class="row">
                            <label class="col-sm-2 col-form-label" for="PartName">{{__('part number')}}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="PartName" placeholder="{{__('Entrez le pash number')}}">
                                </div>

                            </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-operator">{{ __('Opérateur carte') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="my-1 mr-sm-2 custom-select" name="OperateurCarte">
                                    <option  disabled selected value="Choississez un Opérateur">Choississez un Opérateur</option>
                                    <option  value="MTN">MTN</option>
                                    <option  value="ORANGE">ORANGE</option>
                                    <option  value="NEXTTEL">NEXTTEL</option>
                                    <option  value="CAMTEL">CAMTEL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="SIMId">{{ __('SIMId') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="SIMId" type="number" placeholder="{{ __('Entrez le numéro de SIM') }}" value="" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="Marchand">{{ __('Marchand') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="my-1 mr-sm-2 custom-select" name="marchants_id">
                                    <option  disabled selected value="Choississez un Marchand">Choississez un Marchand</option>
                                    @foreach ($dataMarchand as $nameM)
                                            <option value="{{$nameM->id}}">{{$nameM->Name}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                            <label class="col-sm-2 col-form-label" for="marque">{{__('Marque')}}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="Marque" placeholder="{{__('Entrez la marque')}}">
                                </div>
'http://127.0.0.1:8000/api/modeles/'
                            </div>
                    </div> -->
                </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                    </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

@endsection

@push('js')
  <script>
    $(document).ready(function() {

        $('#fabriquantId').change(function(){
            $('#ModeleId').empty()
            .append('<option  disabled selected value="Choississez un Modèle">Choississez un Modèle</option>');
            
            var fabriquantId = document.getElementById("fabriquantId").value;
            fetch('https://operations.easypay.cm/public/api/modeles/'+fabriquantId
            )
            .then(response => response.json())
            .then(modeleElement => {
              console.log('Success modele by fabriquant:', modeleElement);
              for(var i=0; i < modeleElement.length; i++) {
                  console.log(modeleElement[i].Name);
                  //addMarchand(marchands[i].Name);
                 $('#ModeleId').push('<option value=' + modeleElement[i].id + '>' + modeleElement[i].Name + '</option>');
                  
              }
              })
              .catch((error) => {
              console.error('Error modeleElement:', error);
              }); 

        });
    });
  </script>
@endpush