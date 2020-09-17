
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

<center>
            <section class="content">
                <div class="container-fluid">
                <!-- Info boxes -->
                @if ($data_dto_count >0)
                    <div class="row">
                    <div class="col-12"  style="position:relative; top:10px; ">
                        <div class="card card-success">
                            <div class="card-header col-md-5 " >
                              <h3 class="card-title">Heure supplémentaire du mois </h3>

                            </div>
                            <div class="card-header" style="background-color:white;">

                                <ul class="nav nav-pills card-header-pills breadcrumb float-sm-right" style="background-color:white; height:10px;">
                                  <li class="nav-item" style="background-color:white;">
                                    <button style=" background-color:white;border: none;color: white;">
                                        <div class="info-box bg-success" style="width:100%;position:relative; bottom:30px; ">
                                          <div class="info-box-content">
                                            <span class="info-box-text text-center ">Valider</span>
                                            <span class="info-box-number text-center mb-0">Heure supplémentaire</span>
                                          </div>
                                        </div>
                                      </button>
                                  </li>

                                </ul>
                              </div>

                        <!-- /.card-header -->

                        <div class="card-body">

                            <table class="table" style="position:relative; ">
                                <thead>
                                <tr>
                                    <th>Etablissement</th>
                                    <th>Total heure </th>
                                    <th>Moyenne </th>
                                    <th>Evolution sur les trois dernier mois </th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data_dto as  $datass)


                                        <tr>
                                                <td>{{$datass->Etablissements}}</td>
                                               <td> <button class="btn   btn-outline-success"  > {{$datass->total}}</button></td>

                                                <td> <button class="btn   btn-outline-info"  > {{$datass->moy}} </button></td>
                                                <td>
                                                    @if ($datass->Etablissements == 'Diourbel')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartDiourbel->container() !!}
                                                        </div>
                                                    @endif
                                                    @if ($datass->Etablissements == 'Kaolack')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartKaolack->container() !!}
                                                        </div>
                                                    @endif
                                                    @if ($datass->Etablissements == 'Louga')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartLouga->container() !!}
                                                        </div>
                                                    @endif
                                                    @if ($datass->Etablissements == 'Dakar1')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartDakar1->container() !!}
                                                        </div>

                                                    @endif
                                                    @if ($datass->Etablissements == 'Dakar2')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartDakar2->container() !!}
                                                        </div>

                                                    @endif

                                                    @if ($datass->Etablissements == 'Rufisque')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartRufisque->container() !!}
                                                        </div>

                                                    @endif

                                                    @if ($datass->Etablissements == 'Centre de Hann')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartHann->container() !!}
                                                        </div>

                                                    @endif
                                                    @if ($datass->Etablissements == 'Thiés')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartThies->container() !!}
                                                        </div>

                                                    @endif

                                                    @if ($datass->Etablissements == 'Saint-Louis')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartSaint_Louis->container() !!}
                                                        </div>

                                                    @endif
                                                    @if ($datass->Etablissements == 'Tambacounda')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartTambacounda->container() !!}
                                                        </div>

                                                    @endif
                                                    @if ($datass->Etablissements == 'Ziguinchor')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartZiguinchor->container() !!}
                                                        </div>

                                                    @endif
                                                    @if ($datass->Etablissements == 'Ngnith')
                                                    <div style="width: 70%; height:100px; ">
                                                        {!! $usersChartNgnith->container() !!}
                                                        </div>

                                                    @endif

                                                </td>

                                                <td>
                                                    <form method="POST" action="{{'ValidationInvalideurPerEtablissement'}}" class="col-12 col-sm-4">
                                                      @csrf
                                                    <input type="hidden" name="Etablissement"  value="{{$datass->Etablissements}}">
                                                    <button class="btn  btn-outline-danger">
                                                  Invalider
                                                    </button>
                                                  </form>
                                                </td>
                                        </tr>

                                @endforeach
                                </tbody>

                            </table>


                        </div>
                        <!-- /.card-body
                        <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                            </tfoot> -->
                        </div>
                        @else
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
                        @endif
                    </div>
                    </div>




                    </section>





