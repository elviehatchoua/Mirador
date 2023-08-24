@extends('layouts.app', ['activePage' => 'modeleListe', 'titlePage' => __('Ajout Modele')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('addModele') }}" class="form-horizontal">
                    @csrf
                    @method('put')
                    @if($messageError)
                        <p class="text-danger text-center">Le modèle que vous venez d'entrer existe déjà dans la base de données</p>
                    @endif

                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Liste des modèles') }}</h4>
                            <p class="card-category">{{ __('Entrées') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="ville">{{ __('Nom du fabriquant') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="my-1 mr-sm-2 custom-select" name="fabriquant_id">
                                            <option  disabled selected value="Choississez un fabriquant">Choississez un fabriquant</option>
                                            @foreach ($dataF as $fabriquant)
                                            <option value="{{$fabriquant->id}}">{{$fabriquant->Name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="Nom">{{ __('Nom') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input type="text" class="form-control" name="Name" placeholder="{{ __('nom du modèle') }}" value="" required />
                                    </div>
                                </div>
                            </div>                    

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