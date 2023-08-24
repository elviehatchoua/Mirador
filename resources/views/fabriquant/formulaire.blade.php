@extends('layouts.app', ['activePage' => 'fabriquantform', 'titlePage' => __('Ajout Marchand')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('addFabriquant') }}" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    @if($messageError)
                        <p class="text-danger text-center">Le fabriquant que vous venez d'entrer existe déjà dans la base de données</p>
                    @endif
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Ajout de Fabriquants') }}</h4>
                            <p class="card-category">{{ __('Entrées') }}</p>
                        </div>
                        <div class="card-body ">
                           
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="name">{{ __('Nom du Fabriquant') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input type="text" class="form-control" name="Name" placeholder="{{ __('nom du fabriquant') }}" value=""  required />
                                    </div>
                                </div>
                            </div>
                           <!--  <div class="row">
                                <label class="col-sm-2 col-form-label" for="code">{{ __('Code') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input type="text" class="form-control" name="Code" placeholder="{{ __('Entrez le code') }}" value="" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="Description">{{ __('Description') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input type="text" class="form-control" name="Description" placeholder="{{ __('Entrez une description') }}" value="" required />
                                    </div>
                                </div>
                            </div> -->
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