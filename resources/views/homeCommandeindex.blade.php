@extends('layouts.template_dashbord')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Secteur</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item"><a href="#">Choix secteur</a></li>
                <li class="breadcrumb-item active">senadmin</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">


        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content" >
  <div class="container-fluid" >
    @if ($message = Session::get('notif'))
    <div class="alert alert-success alert-block col-md-8"style="position:relative; left:15%;">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row" style="position:relative; left:15%;">
      <!-- left column -->
      <div class="col-md-8" >
        <form method="POST" action="{{ route('homeCommandepost') }}">
          @csrf
        <!-- general form elements disabled -->
        <div class="card card-info">
          <div class="card-header col-md-5">
            <h3 class="card-title">Choisissez le secteur</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form">
              <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <select class="form-control" name="service" id="">
                      @foreach($Affectation as $Affectations)

                          <option value=" {{$Affectations->Affectation}}">
                            {{$Affectations->Affectation}}
                          </option>

                      @endforeach
                        </select>
                        <input class="form-control"  name="commandeur" type="hidden" value="{{Auth::user()->id }}"" id="example-text-input">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">



                    <button class=" btn btn-lg  btn-outline-info">Passer commande </button>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </form>
      </div>

    </div>
  </div>
</section>
</center>
@endsection
