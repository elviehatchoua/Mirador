@extends('layouts.app', ['activePage' => 'typeRequeteListe', 'titlePage' => __('Ajout Type de Requete')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Type de Requete
                <a type="submit" href="{{ route('typeRequeteForm') }}"  class="pull-right btn btn-warning">{{ __('Add') }}</a>
            </h4>
            <p class="card-category"> Les types de maintenances qui sont géneralement effectuées sur le terrain</p>
            
          </div>
          <div class="card-body">
          
            <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%" id="terminal_data">

                <thead class=" text-primary">
                 
                  <th>
                    Appellation de la requete
                  </th>
                  <th>
                    Description
                  </th>
                </thead>
                <tbody>
                  @foreach ($data as $dat)
                    <tr>
                        <td>
                        {{ $dat->Name }}
                        </td>
                        <td>
                            {{$dat->Description}}
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
    
@endsection