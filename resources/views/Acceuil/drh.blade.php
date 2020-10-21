



    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
      </section>
<center>
            <section class="content">
                <div class="container-fluid">
                <!-- Info boxes -->

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3" style="position:relative; left:20%;">
                    <div class="info-box">
                        <span class="info-box-icon btn btn-lg btn-outline-info elevation-1"><i class="fas fa-clock"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Total heure <br> mois en cours </span>
                        <span class="info-box-number">
                            {{$total_current_month_n_plus_3}}
                            <small>heures</small>
                        </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3"  style="position:relative; left:35%;">
                    <div class="info-box mb-3">
                        <span class="info-box-icon  btn btn-lg btn-outline-danger elevation-1"><i class="fas fa-clock"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">total des  heures <br> de l'année</span>
                        <span class="info-box-number">
                            {{$total_current_year_n_plus_3}}
                            <small>heures</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->


                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <center>

                    </center>
                    </div>
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">

                     <center> <button class=" btn btn-lg btn-outline-success">Suivi des heures supplémentaire du mois</button></center>

                        </div>
                        <!-- /.card-header -->


                        <section class="content" >



                            <div class="row" style="background-color:white">
                                <div class="col-12">

                                        <div class="card-body py-3 px-3">
                                            {!! $usersChartKLK->container() !!}
                                        </div>

                                </div>


                             </div>

                            </div>

                        </div>

                    </section>
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

<h1>Heures supp en cours </h1>

                    <section class="content" style="position:relative;">
                        <div class="container-fluid">


                        <div class="row" >
                            <!-- left column -->

                            @foreach ($data_drh as  $datas)


                        @if ($datas->statut==3)
                        <div class="col-md-3" >
                        <form method="POST" action="{{route('CalculheureMois')}}">
                            @csrf
                        <!-- general form elements disabled -->
                        <div class="card card-dark">
                            <div class="card-header col-md-10">
                            <h3 class="card-title">{{$datas->Nom}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <section class="content">
                                        <div class="container-fluid">

                                        <!-- Timelime example  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                <span class="bg-red">{{$datas->agent}}</span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="fas fa-envelope bg-blue"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                        validation centre   <a href="#" class="btn btn-sm bg-danger">X</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-user bg-green"></i>
                                                    <i class="nav-icon fas fa-check-double bg-grey"></i>
                                                    <div class="timeline-item">
                                                        <div class="timeline-body">
                                                    validation direction<a href="#" class="btn btn-sm bg-success">√</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <i class="nav-icon fas fa-check-double bg-grey"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    validation secteur  <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>

                                                <i class="nav-icon far fa-calendar-check bg-green"" ></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Saisie   <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="nav-icon fas fa-user-plus bg-yellow"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Commande  <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline time label -->

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        </div>
                                        <!-- /.timeline -->

                                    </section>
                                </div>

                            </div>

                        </div>
                        </form>
                        </div>
                        @endif
                        @if ($datas->statut==2)



                        <div class="col-md-3" >
                        <form method="POST" action="{{route('CalculheureMois')}}">
                            @csrf
                        <!-- general form elements disabled -->
                        <div class="card card-dark">
                            <div class="card-header col-md-10">
                            <h3 class="card-title">{{$datas->Nom}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <section class="content">
                                        <div class="container-fluid">

                                        <!-- Timelime example  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                <span class="bg-red">{{$datas->agent}}</span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="fas fa-envelope bg-blue"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                        validation centre   <a href="#" class="btn btn-sm bg-danger">X</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-user bg-green"></i>
                                                    <i class="nav-icon fas fa-check-double bg-grey"></i>
                                                    <div class="timeline-item">
                                                        <div class="timeline-body">
                                                    validation direction <a href="#" class="btn btn-sm bg-danger">X</a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <i class="nav-icon fas fa-check-double bg-black"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    validation secteur <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>

                                                <i class="nav-icon far fa-calendar-check bg-green"" ></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Saisie  <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="nav-icon fas fa-user-plus bg-yellow"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Commande   <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline time label -->

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        </div>
                                        <!-- /.timeline -->

                                    </section>
                                </div>

                            </div>

                        </div>
                        </form>
                        </div>
                        @endif
                        @if ($datas->statut==1)



                        <div class="col-md-3" >
                        <form method="POST" action="{{route('CalculheureMois')}}">
                            @csrf
                        <!-- general form elements disabled -->
                        <div class="card card-dark">
                            <div class="card-header col-md-10">
                            <h3 class="card-title">{{$datas->Nom}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <section class="content">
                                        <div class="container-fluid">

                                        <!-- Timelime example  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                <span class="bg-red">{{$datas->agent}}</span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="fas fa-envelope bg-blue"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                        validation centre  <a href="#" class="btn btn-sm bg-danger">X</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <i class="nav-icon fas fa-check-double bg-grey"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    validation direction      <a href="#" class="btn btn-sm bg-danger">X</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-user bg-green"></i>
                                                    <i class="nav-icon fas fa-check-double bg-grey"></i>
                                                    <div class="timeline-item">
                                                        <div class="timeline-body">
                                                    validation secteur  <a href="#" class="btn btn-sm bg-danger">X</a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>

                                                <i class="nav-icon far fa-calendar-check bg-green"" ></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Saisie    <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="nav-icon fas fa-user-plus bg-yellow"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Commande   <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline time label -->

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        </div>
                                        <!-- /.timeline -->

                                    </section>
                                </div>

                            </div>

                        </div>
                        </form>
                        </div>
                        @endif
                            @endforeach
