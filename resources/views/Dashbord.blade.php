@extends('layouts.template_dashbord_acceuil')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Dashbord</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="#">Tableau de bord </a></li>
                    <li class="breadcrumb-item active">senadmin</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>

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
                        <span class="info-box-text">Total heure <br> mois en cour </span>
                        <span class="info-box-number">
                            {{$total_current_month}}
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
                        <span class="info-box-text">total heure année</span>
                        <span class="info-box-number">
                            {{$total_current_year}}
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
                            <h3 class="card-title">
                            <button class=" btn btn-lg btn-outline-success">Heures supplémentaires par établissements et par taux</button>

                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>Affectation</th>
                                    <th>Taux à 15%</th>
                                    <th>Taux à 40%</th>
                                    <th>Taux à 60%</th>
                                    <th>Taux à 100%</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($data as  $datass)


                                        <tr>
                                                <td>{{$datass->Affectations}}</td>
                                                <td>{{$datass->sum15}}</td>
                                                <td>{{$datass->sum40}}</td>
                                                <td>{{$datass->sum60}}</td>
                                                <td>{{$datass->sum100}}</td>
                                                <td><button  class=" btn btn-lg btn-outline-success">{{$datass->total}}</button></td>
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

                    </div>
                    </div>


                  @endsection
