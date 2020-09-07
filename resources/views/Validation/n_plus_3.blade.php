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
                                              {{$heure->heure_debut}}:00
                                            </td>
                                            <td>
                                              {{$heure->heure_fin}}:00
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
