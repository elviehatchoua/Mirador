@extends('layouts.app', ['activePage' => 'villeListe', 'titlePage' => __('Ajout Ville')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
                <h4 class="card-title ">Ville
                    <a type="submit" href="{{ route('villeForm') }}"  class="pull-right btn btn-warning">{{ __('Ajouter') }}</a>               
                </h4>
                <p class="card-category"> Ville du marchand</p>

            </div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%" id="terminal_data">
                    <thead class=" text-primary">
                   
                    <th>
                        Nom de la ville
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Créé le
                    </th>
                    </thead>
                    <tbody>
                  
                        @foreach($dataVille as $dat)
                        <tr>
                            
                            <td>
                            {{ $dat->Name }}
                            </td>
                            <td>
                            {{ $dat->Description }}
                            </td>
                            <td>
                            {{ $dat->created_at }}
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