@extends('layouts.app', ['activePage' => 'fabriquantListe', 'titlePage' => __('Ajout des fabriquants')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
                <h4 class="card-title ">Fabriquants
                    <a type="submit" href="{{ route('fabriquantForm') }}"  class="pull-right btn btn-warning">{{ __('Ajouter') }}</a>              
                </h4>
                <p class="card-category"> Liste des Fabriquants</p>

            </div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%" id="terminal_data">
                    <thead class=" text-primary">
                   
                    <th>
                        Nom du fabriquant
                    </th>
                    </thead>
                    <tbody>
                        
                        @foreach ($dataF as $dat)
                    <tr>
                        <td>
                        {{ $dat->Name }}
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