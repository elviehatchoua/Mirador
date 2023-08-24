@extends('layouts.app', ['activePage' => 'modeleListe', 'titlePage' => __('Ajout de Modèles')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
                <h4 class="card-title ">Modèles
                    <a class="pull-right btn btn-warning" type="submit" href="{{ route('modeleForm') }}">{{ __('Ajouter') }}</a>
                
                </h4>
                <p class="card-category"> Liste des Modèles</p>
 
            </div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%" id="terminal_data">
                    <thead class=" text-primary">
                           
                            <th>
                                Nom
                            </th>
                            <th>
                                Fabriquant
                            </th>
                            
                        </thead>
                            <tbody>
                                @foreach ($dataM as $dat)
                            <tr>
                                
                                <td>
                                {{ $dat->Name }}
                                </td>
                                <td>
                                {{ $dat->fabriquant->Name}}
                                </td>
                
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
@endsection