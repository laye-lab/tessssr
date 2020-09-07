<section class="content">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3" style="position:relative; left:20%;">
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
        <div class="container">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 box-shadow">

                    <div class="card-body"  style="background-color:white;height:220px;
                     background-size: 310px 200px;
                    background-repeat: no-repeat;
                    background-image: url({{asset('../../dist/img/commandes.png')}});" >

                    <a href="{{route('homeCommandeindex')}}" class="small-box-footer">
                      <button type="button" style="position:relative;top:150px;" class="btn btn-lg btn-success">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                    </a>
                    </div>
                </div>
                <div class="card mb-4 box-shadow">

                    <div class="card-body"  style="background-color:white;height:220px;
                    background-size: 310px 200px;
                    background-repeat: no-repeat;
                    background-image: url({{asset('../../dist/img/saisir.png')}});" >

                        <a href="{{route('homeSaisie')}}" class="small-box-footer">
                      <button type="button" style="position:relative;top:150px;" class="btn btn-lg btn-success">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                        </a>
                    </div>
                </div>
              <div class="card mb-4 box-shadow">

                <div class="card-body"  style="background-color:white;height:100px;
                  background-size: 310px 200px;
                    background-repeat: no-repeat;
                background-image: url({{asset('../../dist/img/valid.png')}});" >

                <a href="{{route('Validation')}}" class="small-box-footer">
                  <button type="button" style="position:relative;top:150px;" class="btn btn-lg btn-success">

                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
                    </a>
                </div>
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
