@extends('layouts.template_dashbord')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Acceuil</h1>
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @foreach($role_account as $role)
                @if(Auth::user()->id == $role->Matricule_agent)
                        @if($role->Nom == 'n+3') 
                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <!-- Small boxes (Stat box) -->
                                
                                <div class="col-lg-5 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                    <div class="inner">
                                        <h5>Valider heure supplementaire</h5>
                        
                                        <p></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                   
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-5 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5>Saisir heure supplementaire</h5>
                        
                                        <p></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                   
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h5>Consulter Agent</h5>
                        
                                        <p>Unique Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                @break
                                <!-- ./col -->
                            @endif

                            @if($role->Nom === 'n+2') 
                                <!-- Main content -->
                                <section class="content" style="position:relative;left:100px;">
                                    <div class="container-fluid">
                                        <!-- Small boxes (Stat box) -->
                                        <div class="row">
                                            <a href="{{route('homeCommandeindex')}}" class="small-box-footer">
                                            <div class="col-lg-5 col-9">
                                            <!-- small box -->

                                            <div class="small-box bg-dark container border border-success" style="height:200px;width:350px;">
                                                <div class="inner">
                                                    
                                               

                                                <h5>Commander heure supplementaire</h5>
                                                <p class="font-italic" style="color:lightblue;">choix collaborateur  <br> choix service  <br> Saisie Commande </p>
                                                <p></p>
                                                </div>
                                                <div class="icon">
                                                <i  class="ion ion-bag" style="zoom:2.0;"></i>
                                                </div>
                                          
                                            </div>
                                            </div>

                                        </a>
                                  
                                        <a href="{{route('Validation')}}" class="small-box-footer">
                                            <div class="col-lg-5 col-6" style="position:relative;left:40px;">
                                            <!-- small box -->
                                            <div class="small-box bg-danger container border border-success" style="height:200px;width:350px;">
                                                <div class="inner" >
                                                <h5 class="nav-link">Valider heure supplementaire</h5></u>
                                                 <p class="font-italic" style="color:lightred;">Choix collaborateur <br> validation heure </p>                                                 </div>
                                                <div class="icon">
                                                <i class="ion ion-stats-bars" style="zoom:2.0;"></i>
                                                </div>
                                               
                                            </div>
                                            </div>
                                            <!-- ./col -->
                                        </a>
                                      
                                        <a href="{{route('homeSaisie')}}" class="small-box-footer">
                                            <div class="col-lg-5 col-9" style="position:relative;top:40px;">
                                            <!-- small box -->
                                            <div class="small-box bg-secondary container border border-success" style="height:200px;width:350px;">
                                                <div class="inner">
                                                <h5>Saisir heure supplementaire</h5>
                                                <p class="font-italic" style="color:lightblue;">choix collaborateur  <br> Saisie heure</p>
                                                <p></p>
                                                </div>
                                                <div class="icon">
                                                <i class="ion ion-person-add" style="zoom:2.0;"></i>
                                                </div>
                                               
                                            </div>
                                            </div>
                                        </a>
                                     
                                        <a href="">
                                            <div class="col-lg-5 col-9" style="position:relative;top:40px;left:40px;">
                                                <div class="small-box bg-white container border border-success" style="height:200px;width:350px;">
                                                    <div class="inner">
                                                    <h5>Consulter Agent</h5>
                                    
                                                    <p class="font-italic" style="color:lightdark;">Consultez les agents qui peuvent faire<br> des heures supplémentaires </p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-pie-graph" style="zoom:2.0;" ></i>
                                                </div>
                                             
                                                </div>
                                            </div>
                                        </a>
                                            @break
                                            <!-- ./col -->
                                        @endif
                            @if($role->Nom === 'n+1') 
                            <!-- Main content -->
                            <section class="content" style="position:relative;left:100px;">
                                <div class="container-fluid">
                                    <!-- Small boxes (Stat box) -->
                                    <div class="row">
                                       
                              
                                        <a href="{{route('Validation')}}" class="small-box-footer">
                                        <div class="col-lg-5 col-6" style="position:relative;left:40px;">
                                        <!-- small box -->
                                        <div class="small-box bg-danger container border border-success" style="height:200px;width:350px;">
                                            <div class="inner" >
                                            <h5 class="nav-link">Valider heure supplementaire</h5></u>
                                            <p class="font-italic" style="color:lightred;">Choix collaborateur <br> validation heure </p>                                                </div>
                                            <div class="icon">
                                            <i class="ion ion-stats-bars" style="zoom:2.0;"></i>
                                            </div>
                                           
                                        </div>
                                        </div>
                                        <!-- ./col -->
                                    </a>
                                    <a href="{{route('homeSaisie')}}" class="small-box-footer">
                                        <div class="col-lg-5 col-9 " style="position:relative;left:60px;">
                                        <!-- small box -->
                                        <div class="small-box bg-secondary container border border-success" style="height:200px;width:350px;">
                                            <div class="inner">
                                            <h5>Saisir heure supplementaire</h5>
                                            <p class="font-italic" style="color:lightblue;">Saisissez les heures effectuées <br> par vos agents </p>
                                            <p></p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-person-add" style="zoom:2.0;"></i>
                                            </div>
                                           
                                        </div>
                                        </div>
                                    </a>
                                  
                                    <a href="">
                                       
                                            <div class="small-box bg-white container border border-success" style="height:200px;width:350px; left:60px;">
                                                <div class="inner">
                                                <h5>Consulter Agent</h5>
                                
                                                <p class="font-italic" style="color:lightdark;">Consultez les agents qui peuvent faire<br> des heures supplémentaires </p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph" style="zoom:2.0;" ></i>
                                            </div>
                                         
                                            </div>
                                        </div>
                                    </a>
                                     
                                        @break
                                        @endif
                                        @if($role->Nom === 'dto') 
                                        <!-- Main content -->
                                        <section class="content" style="position:relative;left:100px;">
                                            <div class="container-fluid">
                                                <!-- Small boxes (Stat box) -->
                                                <div class="row">
                                                   
                                          
                                                    <a href="{{route('Validation')}}" class="small-box-footer">

                                                    <div class="col-lg-5 col-6" style="position:relative;left:40px;">
                                                    <!-- small box -->
                                                    <div class="small-box bg-danger container border border-success" style="height:200px;width:350px;">
                                                        <div class="inner" >
                                                        <h5 class="nav-link">Valider heure supplementaire</h5></u>
                                                         <p class="font-italic" style="color:lightred;">Choix collaborateur <br> validation heure </p>                                                 </div>
                                                        <div class="icon">
                                                        <i class="ion ion-stats-bars" style="zoom:2.0;"></i>
                                                        </div>
                                                       
                                                    </div>
                                                    </div>
                                                    <!-- ./col -->
                                                </a>
                                                <a href="{{route('homeSaisie')}}" class="small-box-footer">
                                                    <div class="col-lg-5 col-9" style="position:relative;left:50px;">
                                                        <div class="small-box bg-white container border border-success" style="height:200px;width:350px;">
                                                            <div class="inner">
                                                            <h5>Consulter Agent</h5>
                                            
                                                            <p class="font-italic" style="color:lightdark;">Consultez les agents qui peuvent faire<br> des heures supplémentaires </p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-pie-graph" style="zoom:2.0;" ></i>
                                                        </div>
                                                     
                                                        </div>
                                                    </div>
                                                </a>
                                               
                                                 
                                                    @break
                                                    @endif
                                                    @if($role->Nom === 'dcm') 
                                                    <!-- Main content -->
                                                    <section class="content" style="position:relative;left:100px;">
                                                        <div class="container-fluid">
                                                            <!-- Small boxes (Stat box) -->
                                                            <div class="row">
                                                               
                                                      
                                                             <a href="{{route('Validation')}}" class="small-box-footer">
                                                                <div class="col-lg-5 col-6" style="position:relative;left:40px;">
                                                                <!-- small box -->
                                                                <div class="small-box bg-danger container border border-success" style="height:200px;width:350px;">
                                                                    <div class="inner" >
                                                                    <h5 class="nav-link">Valider heure supplementaire</h5></u>
                                                                     <p class="font-italic" style="color:lightred;">Choix collaborateur <br> validation heure </p>                                                 </div>
                                                                    <div class="icon">
                                                                    <i class="ion ion-stats-bars" style="zoom:2.0;"></i>
                                                                    </div>
                                                                   
                                                                </div>
                                                                </div>
                                                                <!-- ./col -->
                                                            </a>
                                                            <a href="">
                                                                <div class="col-lg-5 col-9 " style="position:relative;left:60px;">
                                                                <!-- small box -->
                                                                <div class="small-box bg-secondary container border border-success" style="height:200px;width:350px;">
                                                                    <div class="inner">
                                                                    <h5>Saisir heure supplementaire</h5>
                      <p class="font-italic" style="color:lightblue;">choix collaborateur  <br> Saisie heure </p>
                                                                    <p></p>
                                                                    </div>
                                                                    <div class="icon">
                                                                    <i class="ion ion-person-add" style="zoom:2.0;"></i>
                                                                    </div>
                                                                   
                                                                </div>
                                                                </div>
                                                            </a>
                                                            <div class=" container" style="height:000px;width:300px;"></div>
                                                            <a href="">
                                                                <div class="col-lg-5 col-9" style="position:relative;top:40px;left:250px;">
                                                                    <div class="small-box bg-white container border border-success" style="height:200px;width:350px;">
                                                                        <div class="inner">
                                                                        <h5>Consulter Agent</h5>
                                                        
                                                                        <p class="font-italic" style="color:lightdark;">Consultez les agents qui peuvent faire<br> des heures supplémentaires </p>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="ion ion-pie-graph" style="zoom:2.0;" ></i>
                                                                    </div>
                                                                 
                                                                    </div>
                                                                </div>
                                                            </a>
                                                             
                                                                @break
                                                                @endif
                                                                @if($role->Nom === 'drh') 
                                                             <center>   <h2>Heure supplémentaires en cour de traitement</center>

<section class="content" style="position:relative;">
    <div class="container-fluid">
     
      <div class="row" >
        <!-- left column -->
       
        @foreach ($data as  $datas)         
  
   
    @if ($datas->statut==4)
        
   
  
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
                                            validation centre   <a href="#" class="btn btn-sm bg-success">√</a>
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
                                      validation centre   <a href="#" class="btn btn-sm bg-success">X</a>
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
                                                                @break
                                                                @endif
                            @endif
         @endforeach
@endsection
