
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
        @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block col-md-8"style="position:relative; bottom:15px; left:15%;">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
      </div><!-- /.container-fluid -->
    </section>



    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
        <!-- Info boxes -->

        @if ($data_n_plus_1_count >0)
            <div class="row">
            <div class="col-12"  style="position:relative; top:10px; ">
                <div class="card">

                    <div class="card-header" style=" border: none;background-color:rgb(244,246,249);">

                        <ul class="nav nav-pills card-header-pills breadcrumb float-sm-right" style="background-color:rgb(244,246,249); height:20px;">
                            <li class="nav-item">
                                <form method="POST" action="{{'Validationstore'}}" >
                                    @csrf
                    @foreach($equipe as $equipes)

                    @if($equipes->agentMatricule_Agent  ==  Auth::user()->id)
                    <input class="form-control"  name="id" type="hidden" value="{{old('id',$equipes->n_plus_un)}}"" id="example-text-input">
                    @break
                    @endif
                    @endforeach
                    <input type="hidden" name="role"  value="{{$role->Nom}}">
                  <button style=" background-color:#F2F2F2;border: none;color: white;">
                    <div class="info-box bg-success" style="width:100%;position:relative;bottom:25px;">
                      <div class="info-box-content">
                        <span class="info-box-text text-center ">Valider</span>
                        <span class="info-box-number text-center mb-0">Heure supplémentaire</span>
                      </div>
                    </div>
                  </button>
                  </form>
                            </li>


                          </ul>

                      </div>

                <!-- /.card-header -->

                <div class="card-body"  style="background-color:rgb(244,246,249);">

  @foreach($agent_attribut as $agent_unite)

  @if($agent_unite->n_plus_un ==Auth::user()->id )

                                @foreach($heurre_a_faire as $heure)

                                        @if($agent_unite->Matricule_agent ==$heure->Matricule_agent and $heure->Statut==1 )


<center>
                                        <section class="content" >
                                          <div class="card col-11"   >

                                            <div class="card-body">
                                              <div class="row">

                                                  <div class="col-12">
                                                    <button type="submit" class="btn btn-info">{{$agent_unite->Nom_Agent}}</button>
                                                    <button type="submit" class="btn btn-outline-info">Heure nº{{$heure->id_heure_a_faire}}</button>
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
        </center>
          @break
          @endif
  @endforeach
          @endif
          @endforeach
          @else
                    <center>
                        <div class="card card-danger card-outline col-md-7">
                            <div class="card-header">
                              <h5 class="m-0">Validation</h5>
                            </div>
                            <div class="card-body">
                              <h6 class="card-title">Pas d'heures supplémentaires  à valider pour le moment</h6>

                              <p class="card-text"></p>
                              <a  href="{{route('Acceuil')}}" class="btn btn-danger">Acceuil<i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                            </div>
                          </div>
                        </div>
                    </center>
                        @endif
