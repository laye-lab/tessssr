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
                                <section class="content" style="position:relative;left:250px;">
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
                                        <div class=" container" style="height:000px;width:300px;"></div>
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
                            <section class="content" style="position:relative;left:250px;">
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
                                        @if($role->Nom === 'dto') 
                                        <!-- Main content -->
                                        <section class="content" style="position:relative;left:250px;">
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
                                                    <section class="content" style="position:relative;left:250px;">
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
                                                    <!-- Main content -->
                                                    <section class="content" style="position:relative;left:250px;">
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
                            @endif
         @endforeach
@endsection
