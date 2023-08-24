@extends('layouts.app', ['activePage' => 'operationListe', 'titlePage' => __('Ajout Operations')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
                <h4 class="card-title ">Opération</h4>
                <p class="card-category"> Liste des Opérations</p>
                <!-- <div class="pull-right">
                    <a type="submit" href="{{ route('operationForm') }}"  class="btn btn-warning">{{ __('Add') }}</a>
                </div>
 -->
            </div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%" id="terminal_data">
                    <thead class=" text-primary">
                            <th>
                                Créé le
                            </th>
                            <th>
                                Terminal
                            </th>
                            <th>
                                 Marchand 
                            </th>
                            <th>
                                Modèle
                            </th>
                            <th>
                                Fabriquant
                            </th>
                            <th>
                                Technicien
                            </th>
                            <th>
                                Date
                            </th>
                          
                        </thead>
                            <tbody>
                                @foreach ($dataoperation as $dat)
                            <tr>
                                <td>
                                {{ $dat->created_at }}
                                </td>
                                <td>
                                {{ $dat->terminal }}
                                </td>
                                <td>
                                {{ $dat->marchand}}
                                </td>
                                <td>
                                {{ $dat->modele}}
                                </td>
                                <td>
                                {{ $dat->fabriquant}}
                                </td>
                                <td>
                                {{ $dat->Technicien}}
                                </td>
                                <td>
                                {{ $dat->date}}
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

