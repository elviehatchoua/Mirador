@extends('layouts.app', ['activePage' => 'typeRequeteListe', 'titlePage' => __('Ajout Type de Requete')])

@section('content')

<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('addTypeRequete') }}" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Nouveau Type de Requete') }}</h4>
                <p class="card-category">{{ __('Entrées') }}</p>
              </div>
              <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="Nom">{{ __('Nom') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <input type="text" class="form-control" name="name" placeholder="{{ __('Type de Requete') }}" value="" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="description">{{ __('description') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="description" type="text" placeholder="{{ __('Entrez une description du type de requete') }}" value="" required />
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