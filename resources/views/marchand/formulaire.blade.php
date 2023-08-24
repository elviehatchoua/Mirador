@extends('layouts.app', ['activePage' => 'marchandListe', 'titlePage' => __('Ajout Marchand')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('addMarchand') }}" class="form-horizontal">
                    @csrf
                    @method('put')

                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Liste des marchands') }}</h4>
                            <p class="card-category">{{ __('Entrées') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="ville">{{ __('Ville du Marchand') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="my-1 mr-sm-2 custom-select" name="villes_id">
                                            <option  disabled selected value="Choississez une ville">Choississez une ville</option>
                                            @foreach ($donVille as $user)
                                            <option value="{{$user->id}}">{{$user->Name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="Nom">{{ __('Nom') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input type="text" class="form-control" name="Name" placeholder="{{ __('nom du Marchands') }}" value="" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="Nom">{{ __('Location') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input type="text" class="form-control" name="Location" placeholder="{{ __('') }}" value="" required />
                                    </div>
                                </div>
                            </div>
                          <!--   <div class="row">
                                <label class="col-sm-2 col-form-label" for="Location">{{ __('Localisation') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input type="text" class="form-control" name="description" placeholder="{{ __('une petite description') }}" value="" required />
                                    </div>
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