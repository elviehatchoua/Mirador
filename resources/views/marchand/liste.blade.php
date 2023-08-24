@extends('layouts.app', ['activePage' => 'marchandListe', 'titlePage' => __('Ajout Marchands')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
                <h4 class="card-title ">Marchand
                    <a type="submit" href="{{ route('marchandform') }}"  class="pull-right btn btn-warning">{{ __('Ajouter') }}</a>                
                </h4>
                <p class="card-category"> Liste des Marchands</p>
              
            </div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%" id="terminal_data">
                    <thead class=" text-primary">
                   
                    <th>
                        Nom du marchand
                    </th>
                    <th>
                        location
                    </th>
                    <th>
                        Ville
                    </th>
                    </thead>
                    <tbody>
                        @foreach ($dataMarchand as $dat)
                    <tr>
                        
                        <td>
                        {{ $dat->Name }}
                        </td>
                        <td>
                        {{ $dat->Location }}
                        </td>
                        <td>
                        {{ $dat->ville->Name }}
                        
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

