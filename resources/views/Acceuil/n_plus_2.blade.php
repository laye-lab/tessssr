<section class="content">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3" style="position:relative; left:15%;">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clock"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total heure <br> mois en cour </span>
                  <span class="info-box-number">
                    {{$total_current_month_dr}}
                    <small>heures</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3"  style="position:relative; left:30%;">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clock"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">total heure année</span>
                  <span class="info-box-number">
                    {{$total_current_year_dr}}
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3>
                   <center> <button class=" btn btn-lg btn-outline-success">Choisissez une action  à  réaliser </button></center>

                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">
                        <a href="{{route('homeCommandeindex')}}" class="small-box-footer">
                        <div class="col-lg-5 col-9" style="position:relative;left:100px;" >
                        <!-- small box -->
                        <div>
                            <img class="small-box container border border-success"  style="height:150px;width:200px; background-color:white;"  src="{{asset('../../dist/img/commandes.png')}}" alt="">
                            </div>
                        </div>
                    </a>

                    <a href="{{route('Validation')}}" class="small-box-footer">
                        <div class="col-lg-5 col-6" style="position:relative;left:150px;">
                        <!-- small box -->
                            <div>
                            <img class="small-box container border border-success"
                            style="height:150px;width:200px; background-color:white;"  src="{{asset('../../dist/img/valid.png')}}" alt="">
                            </div>

                        </div>

                        <!-- ./col -->
                    </a>


                    <a href="{{route('homeSaisie')}}" class="small-box-footer">
                        <div class="col-lg-5 col-6" style="position:relative;left:230px;">
                            <!-- small box -->
                            <div>
                                <img class="small-box container border border-success"  style="height:150px;width:200px; background-color:white;"  src="{{asset('../../dist/img/saisir.png')}}" alt="">
                                </div>

                            </div>

                    </a>

                    </div>


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


    </div></section>
