@extends('../../layouts.template_dashbord_collapsed')

@section('content')
 <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    @foreach($role_account as $role)
    @if(Auth::user()->id == $role->Matricule_agent)
    @switch($role->Nom)
    @case('n+2')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Validation</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                <li class="breadcrumb-item active">Validation</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <section class="content"  style="position:relative;left:400px;">


                <div class="card-body" >
                  <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                      <div class="row">

                      <form method="POST" action="{{'Validationstore'}}" >
                        @csrf

                        <input type="hidden" name="id"  value="{{$role->Matricule_agent}}">
                        <input type="hidden" name="role"  value="{{$role->Nom}}">
                      <button style=" background-color:#F2F2F2;border: none;color: white; position:fixed;">
                        <div class="info-box bg-success" style="width:100%;">
                          <div class="info-box-content">
                            <span class="info-box-text text-center ">Valider</span>
                            <span class="info-box-number text-center mb-0">Heure supplémentaire</span>
                          </div>
                        </div>
                      </button>
                      </form>
                    </div>
                    </div></div></div></section>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    @foreach($agent_attribut as $agent_unite)

                              @foreach($heurre_a_faire as $heure)

                                      @if($agent_unite->Matricule_agent ==$heure->Matricule_agent and $heure->Statut==2 and $heure->Etablissement==$role->etablissement )
<center>
                                      <section class="content">
                                        <div class="card col-8"  style="position:relative;bottom:80px;">

                                          <div class="card-body">
                                            <div class="row">


                                                <form method="POST" action="{{'ValidationInvalideur'}}" class="col-12 col-sm-4" style="position:relative;left:70%; " >
                                                  @csrf
                                                <input type="hidden" name="id"  value="{{$heure->id_heure_a_faire}}">
                                                <input type="hidden" name="role"  value="{{$role->Nom}}">
                                                <button class="btn  btn-outline-danger">
                                              Invalider
                                                </button>
                                              </form>
                                              </div>
                                              <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-info">{{$agent_unite->Nom_Agent}}</button>
                                                  <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                      <thead>
                                                        <tr>
                                                          <th>Date</th>
                                                          <th>De</th>
                                                          <th>A</th>
                                                          <th>Travaux réalisés</th>
                                                          <th>Observations</td>
                                                          <th>Nombre d'heures</td>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        @foreach($heurre_a_faire as $heure)

                                                        @if($agent_unite->Matricule_agent ==$heure->Matricule_agent)
                                                        <tr>
                                                          <td>
                                                            {{$heure->Date_Heure}}
                                                          </td>
                                                          <td>
                                                            {{$heure->heure_debut}} :00
                                                          </td>
                                                          <td>
                                                            {{$heure->heure_fin}} :00
                                                          </td>
                                                          <td>
                                                            {{$heure->travaux_effectuer}}
                                                          </td>
                                                          <td>
                                                            {{$heure->observations}}
                                                          </td>
                                                          <td>
                                                            <button type="submit" class="btn btn-info">{{$heure->total_heures_saisie}}</button>
                                                          </td>
                                                      </tr>

                                                        @endif
                                              @endforeach

                                            </tbody>
                                          </table>
                                        </div>

                                    </div>
                                  </div>


                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                          </section>



                          @break
                          @endif
                  @endforeach

                          @endforeach
                      @break
                      @case('sec')
                      <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                          <div class="container-fluid">
                            <div class="row mb-2">
                              <div class="col-sm-6">
                                <h1>Validation</h1>
                              </div>
                              <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                  <li class="breadcrumb-item active">Validation</li>
                                </ol>
                              </div>
                            </div>
                          </div><!-- /.container-fluid -->
                        </section>
                        <section class="content-header">
                          <div class="container-fluid">
                            <div class="row mb-2">
                              <div class="col-sm-6">

                              </div>
                              <section class="content"  style="position:relative;left:400px;">


                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                        <div class="row">

                                        <form method="POST" action="{{'Validationstore'}}" >
                                          @csrf

                                          <input type="hidden" name="id"  value="{{$role->Matricule_agent}}">
                                          <input type="hidden" name="role"  value="{{$role->Nom}}">
                                        <button style=" background-color:white; /* Green */
                                        border: none;
                                        color: white;">
                                          <div class="info-box bg-success" style="width:100%;">
                                            <div class="info-box-content">
                                              <span class="info-box-text text-center ">Valider</span>
                                              <span class="info-box-number text-center mb-0">Heure supplémentaire</span>
                                            </div>
                                          </div>
                                        </button>
                                        </form>
                                      </div>
                                      </div></div></div></section>
                            </div>
                          </div><!-- /.container-fluid -->
                        </section>
                      @foreach($agent_attribut as $agent_unite)

                                                @foreach($heurre_a_faire as $heure)

                                                        @if($agent_unite->Matricule_agent ==$heure->Matricule_agent and $heure->Statut==1 and $heure->Etablissement==$role->etablissement )
                  <center>
                                                        <section class="content">
                                                          <div class="card col-8">
                                                            <div class="card-header">
                                                              <h3 class="card-title"> Details</h3>
                                                            </div>
                                                            <div class="card-body">
                                                              <div class="row">
                                                                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                                                  <div class="row">
                                                                    <div class="col-12 col-sm-4">
                                                                      <div class="info-box bg-info">
                                                                        <div class="info-box-content">
                                                                          @foreach($nbr_heure as $nbr_heures)

                                                                          @if($agent_unite->Matricule_agent ==$nbr_heures->Agent_Matricule_Agent )
                                                                          <span class="info-box-text text-center ">Nombre d'heures</span>
                                                                          <span class="info-box-number text-center mb-0">  {{$nbr_heures->nbr_heure}}</span>
                                                                          @break
                                                                        @endif
                                                                        @endforeach

                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <form method="POST" action="{{'ValidationInvalideur'}}" class="col-12 col-sm-4" style="position:relative;left:80%; top:100px;" >
                                                                    @csrf
                                                                  <input type="hidden" name="id"  value="{{$heure->id_heure_a_faire}}">
                                                                  <input type="hidden" name="role"  value="{{$role->Nom}}">
                                                                  <button style=" background-color:white; /* Green */
                                                                  border: none;
                                                                  color: white;">
                                                                    <div class="info-box btn-outline-danger" style="width:100%;">
                                                                      <div class="info-box-content">
                                                                        <span class="info-box-text text-center ">Invalider</span>
                                                                        <span class="info-box-number text-center mb-0">Heure supplémentaire</span>
                                                                      </div>
                                                                    </div>
                                                                  </button>
                                                                </form>
                                                                </div>
                                                                <div class="row">
                                                                  <div class="col-12">
                                                                    <button type="submit" class="btn btn-info"> <h4>{{$agent_unite->Nom_Agent}}</h4></button>
                                                                    <div class="card-body table-responsive p-0">
                                                                      <table class="table table-hover text-nowrap">
                                                                        <thead>
                                                                          <tr>
                                                                            <th>Date</th>
                                                                            <th>De</th>
                                                                            <th>A</th>
                                                                            <th>Travaux réalisés</th>
                                                                            <th>Observations</td>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach($heurre_a_faire as $heure)

                                                                          @if($agent_unite->Matricule_agent ==$heure->Matricule_agent)
                                                                          <tr>
                                                                            <td>
                                                                              {{$heure->Date_Heure}}
                                                                            </td>
                                                                            <td>
                                                                              {{$heure->heure_debut}} :00
                                                                            </td>
                                                                            <td>
                                                                              {{$heure->heure_fin}} :00
                                                                            </td>
                                                                            <td>
                                                                              {{$heure->travaux_effectuer}}
                                                                            </td>
                                                                            <td>
                                                                              {{$heure->observations}}
                                                                            </td>
                                                                            <td>
                                                                              <button type="submit" class="btn btn-info">{{$heure->total_heures_saisie}}</button>
                                                                            </td>
                                                                        </tr>

                                                                          @endif
                                                                @endforeach

                                                              </tbody>
                                                            </table>
                                                          </div>

                                                      </div>
                                                    </div>


                                                </div>
                                                <!-- /.card-body -->
                                              </div>
                                              <!-- /.card -->

                                            </section>



                                            @break
                                            @endif
                                    @endforeach

                                            @endforeach
                                        @break


        @case('n+1')
        <div class="content-wrapper">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Validation</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Validation</a></li>
                    <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                    <li class="breadcrumb-item active">Senadmin</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <section class="content"  style="position:relative;left:420px;">


                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                          <div class="row">

                          <form method="POST" action="{{'Validationstore'}}" >
                            @csrf
      @foreach($equipe as $equipes)

        @if($equipes->agentMatricule_Agent  ==  Auth::user()->id)
        <input class="form-control"  name="id" type="hidden" value="{{old('id',$equipes->n_plus_un)}}"" id="example-text-input">
        @break
    @endif
@endforeach
<input type="hidden" name="role"  value="{{$role->Nom}}">
                          <button  style=" background-color:#F2F2F2;border: none;color: white; position:fixed;"">
                            <div class="info-box  bg-success" style="width:100%;">
                              <div class="info-box-content">
                                <span class="info-box-text text-center ">Valider</span>
                                <span class="info-box-number text-center mb-0">Heure supplémentaire</span>
                              </div>
                            </div>
                          </button>
                        </form>
                        </div>
                        </div></div></div></section>
              </div>
            </div><!-- /.container-fluid -->
          </section>
        @foreach($agent_attribut as $agent_unite)

        @if($agent_unite->n_plus_un ==Auth::user()->id )

                                      @foreach($heurre_a_faire as $heure)

                                              @if($agent_unite->Matricule_agent ==$heure->Matricule_agent and $heure->Statut==1 )
<center>


                                              <section class="content" >
                                                <div class="card col-9" style="position:relative;bottom:80px;" >

                                                  <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-12">
                                        <button type="submit" class="btn btn-info"> {{$agent_unite->Nom_Agent}}</button>
                                        <div class="card-body table-responsive p-0">
                                          <table class="table table-hover text-nowrap">
                                            <thead>
                                              <tr>
                                                <th>Date</th>
                                                <th>De</th>
                                                <th>A</th>
                                                <th>Travaux réalisés</th>
                                                <th>Observations</td>
                                                 <th>Nombre d'heures</td>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($heurre_a_faire as $heure)

                                              @if($agent_unite->Matricule_agent ==$heure->Matricule_agent)
                                              <tr>
                                                <td>
                                                  {{$heure->Date_Heure}}
                                                </td>
                                                <td>
                                                  {{$heure->heure_debut}} :00
                                                </td>
                                                <td>
                                                  {{$heure->heure_fin}} :00
                                                </td>
                                                <td>
                                                  {{$heure->travaux_effectuer}}
                                                </td>
                                                <td>
                                                  {{$heure->observations}}
                                                </td>
                                                <td>
                                                  <button type="submit" class="btn  btn-info ">{{$heure->total_heures_saisie}}</button>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{'ModifSaisie'}}">
                                                      @csrf

                                                    <input type="hidden" name="id"  value="{{$heure->id}}">
                                                      <button type="submit" class="btn  btn-outline-danger ">Supprimer</button>
                                                    </form>

                                                  </td>

                                            </tr>
                                              @endif
                                    @endforeach

                                  </tbody>
                                </table>
                              </div>

                          </div>
                        </div>


                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                </section>
                @break
                @endif
        @endforeach
                @endif
                @endforeach
            @break


            @case('n+3' or 'dto' or 'dcm')
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1>Validation</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Layout</a></li>
                            <li class="breadcrumb-item active">Validation</li>
                          </ol>
                        </div>
                      </div>
                    </div><!-- /.container-fluid -->
                  </section>
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                    <section class="content">


                        <div class="card-body" style="position:relative;left:400px;bott">
                          <div class="row">
                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                              <div class="row">

                              <form method="POST" action="{{'Validationstore'}}" >
                                @csrf
                                <input type="hidden" name="id"  value="">
                                <input type="hidden" name="role"  value="{{$role->Nom}}">
                              <button style=" background-color:#F2F2F2;border: none;color: white; position:fixed;">
                                <div class="info-box bg-success" style="width:100%;">
                                  <div class="info-box-content">
                                    <span class="info-box-text text-center ">Valider</span>
                                    <span class="info-box-number text-center mb-0">Heure supplémentaire</span>
                                  </div>
                                </div>
                              </button>
                            </form>
                            </div>
                            </div></div></div></section>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
            @foreach($agent_attribut as $agent_unite)


                                          @foreach($heure_supp as $heure)

                                                  @if($agent_unite->Matricule_agent ==$heure->Agent_Matricule_Agent and $heure->Statut ==3 )
                                                  <center>

                                                    <section class="content" >
                                                        <div class="card col-8" style="position:relative;bottom:80px;" >

                                                          <div class="card-body">
                                                            <div class="row">
                                                              <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                                                                <div class="row">

                                                <button type="submit" class="btn btn-info"> {{$agent_unite->Nom_Agent}}</button>
                                                <div class="card-body table-responsive p-0">
                                                  <table class="table table-hover text-nowrap">
                                                    <thead>
                                                      <tr>
                                                        <th>Date</th>
                                                        <th>De</th>
                                                        <th>A</th>
                                                        <th>Travaux réalisés</th>
                                                        <th>Observations</td>
                                                         <th>Nombre d'heures</td>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach($heurre_a_faire as $heure)

                                                      @if($agent_unite->Matricule_agent ==$heure->Matricule_agent)
                                                      <tr>
                                                        <td>
                                                          {{$heure->Date_Heure}}
                                                        </td>
                                                        <td>
                                                          {{$heure->heure_debut}} :00
                                                        </td>
                                                        <td>
                                                          {{$heure->heure_fin}} :00
                                                        </td>
                                                        <td>
                                                          {{$heure->travaux_effectuer}}
                                                        </td>
                                                        <td>
                                                          {{$heure->observations}}
                                                        </td>
                                                        <td>
                                                          <button type="submit" class="btn btn-info">{{$heure->total_heures_saisie}}</button>
                                                        </td>

                                                    </tr>
                                                      @endif
                                            @endforeach
                                           </tbody>
                                    </table>
                                  </div>

                              </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->

                    </section>


                    @break

                    @endif
            @endforeach
                    @endforeach
                @break





            @endswitch
            @break
            @endif
            @endforeach

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
