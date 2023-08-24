@extends('layouts.app', ['activePage' => 'terminalListe', 'titlePage' => __('Liste des Terminaux')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Terminaux
           <!-- <button class="yourTableID">exporter</button> -->
            <a type="submit" href="{{ route('formTerm') }}"  class="pull-right btn btn-warning">{{ __('Ajouter') }}</a>
            </h4>
            <p class="card-category"> Les equipements maintenus par ADS.net</p>
          </div>
          <div class="card-body">
          
            <div class="">
            <table class="table table-striped table-bordered" style="width:100%" id="terminal_data">
                <thead class=" text-primary">
                  <th>
                    Terminal
                  </th>
                  <th>
                    Operateur carte
                  </th>
                  <th>
                    Numéro serie
                  </th>
                  <th>
                    Marchand
                  </th>
                  <th>
                    Part Number
                  </th>
                  <th>
                    Modèle
                  </th>
                  <th>
                    Créé le
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>

                  @foreach ($data as $dat)
                  <tr>
                      
                      <td>
                      {{ $dat->Name }}
                      </td>
                      <td>
                        {{$dat->OperateurCarte}}
                      </td>
                      <td>
                      {{$dat->NumeroSerie}}

                      </td>
                      <td>
                      {{$dat->marchant->Name}}
                      </td>
                      <td>
                      {{$dat->PartName}}
                      </td>
                      <td>
                      {{$dat->modele->Name}}
                      </td>
                      <td>
                      {{$dat->created_at}}
                      </td>
                      <td>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#loginModal" href="{{ route('terminalDetails',$dat->id) }}" > {{__('Details ')}} </button><button class="btn btn-primary btn-sm" href="">{{__('Modifier')}}</button>
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

<!-- <div class="modal fade" id="loginModal" tabindex="-1" role="">
    <div class="modal-dialog modal-lg modal-login" role="document">
        <div class="modal-content">
        <div class="card card-signup card-plain">
                <div class="modal-header">
                  <div class="card-header card-header-primary text-center">
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons ">clear</i>
                    </button> -->

                    <!-- <h4 class="card-title">Log in</h4>
                    <div class="social-line">
                      <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                        <i class="fa fa-facebook-square"></i>
                      </a>
                      <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                        <i class="fa fa-twitter"></i>
                      <div class="ripple-container"></div></a>
                      <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                        <i class="fa fa-google-plus"></i>
                      </a> -->
                  <!--   </div>
                  </div>
                </div>
                <div class="modal-body">
                <form>
                    <div class="form-group">
                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="Nom">{{ __('Nom') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                  <input type="text" class="form-control" name="Name" value="" required />
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-2 col-form-label" for="Nom">{{ __('Opérateur carte') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <input type="text" class="form-control" name="Name" placeholder="{{ __('nom de l\'opérateur') }}" value="" required />
                            </div>
                        </div>
                      </div>
                    </div>
                     
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="Nom">{{ __('Numéro de série') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                  <input type="text" class="form-control" name="Name" placeholder="{{ __('numéro de serie') }}" value="" required />
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-2 col-form-label" for="Nom">{{ __('SIMId') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <input type="text" class="form-control" name="Name" placeholder="{{ __('nom du SIMID') }}" value="" required />
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="Nom">{{ __('part Number') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                  <input type="text" class="form-control" name="Name" placeholder="{{ __('numéro de port') }}" value="" required />
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">                    
                        <label class="col-sm-2 col-form-label" for="Nom">{{ __('Marchand') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <input type="text" class="form-control" name="Name" placeholder="{{ __('nom du marchand') }}" value="" required />
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-2 col-form-label" for="message-text">Modèle:</label>
                        <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                  <input type="text" class="form-control" name="Name" placeholder="{{ __('nom du marchand') }}" value="" required />
                              </div>
                        </div>
                      </div>       
                    </div>
                </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div> -->

  <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form>
                    <div class="form-group">
                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="Nom">{{ __('Nom') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                  <input type="text" class="form-control" name="Name" value="" required />
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-2 col-form-label" for="Nom">{{ __('Opérateur carte') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <input type="text" class="form-control" name="Name" placeholder="{{ __('nom de l\'opérateur') }}" value="" required />
                            </div>
                        </div>
                      </div>
                    </div>
                     
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="Nom">{{ __('Numéro de série') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                  <input type="text" class="form-control" name="Name" placeholder="{{ __('numéro de serie') }}" value="" required />
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-2 col-form-label" for="Nom">{{ __('SIMId') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <input type="text" class="form-control" name="Name" placeholder="{{ __('nom du SIMID') }}" value="" required />
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <label class="col-sm-2 col-form-label" for="Nom">{{ __('part Number') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                  <input type="text" class="form-control" name="Name" placeholder="{{ __('numéro de port') }}" value="" required />
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">                    
                        <label class="col-sm-2 col-form-label" for="Nom">{{ __('Marchand') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <input type="text" class="form-control" name="Name" placeholder="{{ __('nom du marchand') }}" value="" required />
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-2 col-form-label" for="message-text">Modèle:</label>
                        <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                  <input type="text" class="form-control" name="Name" placeholder="{{ __('nom du marchand') }}" value="" required />
                              </div>
                        </div>
                      </div>       
                    </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
<script>
 $(document).ready(function() {
   var terminalId = 
    fetch('http://127.0.0.1:8000/api/terminalsid/'+{id}, {
               method: 'POST', // or 'PUT'
               headers: {
                 'Content-Type': 'application/json; charset = UTF-8'
                },
                body: JSON.stringify(operations) /*questionToAnswerMap*/
             })
             .then(response => response.text())
             .then(operations => {
             console.log('Success:', operations);
             })
             .catch((error) => {
             console.error('Error:', error);
             });
 
})
</script>
@endpush


