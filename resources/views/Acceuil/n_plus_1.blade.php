<section class="content" >
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3>
               <center> <button class=" btn btn-lg  btn-outline-success">Choisissez une action  à  réaliser </button></center>

                </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="row">

                <a href="{{route('Validation')}}" class="small-box-footer">
                    <div class="col-lg-5 col-6" style="position:relative;left:190px;">
                    <!-- small box -->
                        <div>
                        <img class="small-box container border border-success"
                        style="height:150px;width:200px; background-color:white;"  src="{{asset('../../dist/img/valid.png')}}" alt="">
                        </div>

                    </div>

                    <!-- ./col -->
                </a>


                <a href="{{route('homeSaisie')}}" class="small-box-footer">
                    <div class="col-lg-5 col-6" style="position:relative;left:350px;">
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


</section>
