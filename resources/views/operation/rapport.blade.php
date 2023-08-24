@extends('layouts.app', ['activePage' => 'operationRapport', 'titlePage' => __('Reporting')])


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('addModele') }}" class="form-horizontal">
                    @csrf
                    @method('put')

                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Reporting') }}</h4>
                            <p class="card-category">{{ __('Entrées') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                            <label class="col-sm-1 col-form-label" for="Nom">{{ __('De :') }}</label>
                                <div class="col-sm-5">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input type="datetime" class="form-control" name="Name" placeholder="{{ __('nom du modèle') }}" value="" required />
                                    </div>
                                </div>
                                <label class="col-sm-1 col-form-label" for="Nom">{{ __('A :') }}</label>
                                <div class="col-sm-5">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input type="datetime" class="form-control" name="Name" placeholder="{{ __('nom du modèle') }}" value="" required />
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