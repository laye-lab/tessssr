<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Senadmin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href= "{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

        </li>

        <li class="nav-item d-none d-sm-inline-block">
          <a  href="{{route('Acceuil')}}" class="nav-link">Acceuil</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
          <a href="https://www.seneau.sn/portail/fr-FR" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="rechercher" disabled aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>



  </ul>
<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else

    <li class="nav-item dropdown">
      <div class="user-block">
        <img class="img-circle img-bordered-sm" src="{{asset('../../dist/img/icone2.png')}}" alt="user image">
  </div>
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          <span class="username">
          @foreach($role_account as $role)
          @if(Auth::user()->id == $role->Matricule_agent)
          {{$role->Nom_Agent}}
          @break
          @else
          @endif
          @endforeach
        </span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Se deconnecter') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
    </li>
    @endguest

</ul>

    <!--
  </nav>
 <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">sen'Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        @foreach($role_account as $role)
        @if(Auth::user()->id == $role->Matricule_agent)
        @switch($role->Nom)
        @case('n+1')
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                        <!-- Add icons to the links using the .nav-icon class
                                            with font-awesome or any other icon font library -->
                                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                                            <div class="nav-link" style="color:white;">
                                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p > Navigateur</p>
                                            </div>
                                            </div>
                                            <li class="nav-item">
                                                <a  href="{{route('Acceuil')}}" href="#" class="nav-link">
                                                    <i class="fas fa-home"></i>
                                                    <p>
                                                   Acceuil
                                                    </p>
                                                </a>
                                            </li>

                                    <li class="nav-item">
                                    <a  href="{{route('homeSaisie')}}" class="nav-link">
                                        <i class="nav-icon fas fa-pen-alt"></i>
                                        <p>
                                        Saisie heure
                                        </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                <a href="{{route('Validation')}}" class="nav-link">
                                    <i class="nav-icon fas fa-check-double"></i>
                                    <p>
                                    Valider heure
                                  <span class="badge badge-info right">new</span>
                                    </p>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="{{route('Validation')}}" class="nav-link">
                                    <i class="nav-icon fas fa-eye"></i>
                                    <p>
                                    Consulter agent
                                    </p>
                                </a>
                                </li>
                                    </ul>

                @break
                @case('sec')
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                        <!-- Add icons to the links using the .nav-icon class
                                            with font-awesome or any other icon font library -->
                                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                                            <div class="nav-link" style="color:white;">
                                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p > Navigateur</p>
                                            </div>
                                            </div>
                                            <li class="nav-item">
                                                <a  href="{{route('Acceuil')}}" href="#" class="nav-link">
                                                    <i class="fas fa-home"></i>
                                                    <p>
                                                   Acceuil
                                                    </p>
                                                </a>
                                            </li>

                                    <li class="nav-item">
                                    <a  href="{{route('homeSaisie')}}" class="nav-link">
                                        <i class="nav-icon fas fa-pen-alt"></i>
                                        <p>
                                        Saisie heure
                                        </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                <a href="{{route('Validation')}}" class="nav-link">
                                    <i class="nav-icon fas fa-check-double"></i>
                                    <p>
                                    Valider heure
                                  <span class="badge badge-info right">new</span>
                                    </p>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="{{route('Validation')}}" class="nav-link">
                                    <i class="nav-icon fas fa-eye"></i>
                                    <p>
                                    Consulter agent
                                    </p>
                                </a>
                                </li>
                                    </ul>

                @break
            @case('n+2')
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                        <!-- Add icons to the links using the .nav-icon class
                                            with font-awesome or any other icon font library -->
                                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                                            <div class="nav-link" style="color:white;">
                                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p > Navigateur</p>
                                            </div>
                                            </div>
                                            <li class="nav-item">
                                                <a  href="{{route('Acceuil')}}" href="#" class="nav-link">
                                                    <i class="fas fa-home"></i>
                                                    <p>
                                                Acceuil
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                            <a href="{{route('homeCommandeindex')}}" class="nav-link" >
                                                <i class="nav-icon fas fa-user-plus"></i>
                                                <p>
                                                Commande heure

                                                </p>
                                            </a>
                                        </li>


                                    <li class="nav-item">
                                    <a href="{{route('homeSaisie')}}"   class="nav-link">
                                        <i class="nav-icon fas fa-pen-alt"></i>
                                        <p>
                                        Saisie heure
                                        </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                <a  href="{{route('Validation')}}" class="nav-link">
                                    <i class="nav-icon fas fa-check-double"></i>
                                    <p>
                                    Valider heure
                                    <span class="badge badge-info right">new</span>
                                    </p>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a  href="{{route('Validation')}}"class="nav-link">
                                    <i class="nav-icon fas fa-eye"></i>
                                    <p>
                                    Consulter agent
                                    </p>
                                </a>
                                </li>
                                    </ul>
                        @break
             @case('n+3')
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <!-- Add icons to the links using the .nav-icon class
                                        with font-awesome or any other icon font library -->
                                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                                        <div class="nav-link" style="color:white;">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p > Navigateur</p>
                                        </div>
                                        </div>
                                        <li class="nav-item">
                                            <a  href="{{route('Acceuil')}}" href="#" class="nav-link">
                                                <i class="fas fa-home"></i>
                                                <p>
                                               Acceuil
                                                </p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                        <a  href="{{route('Validation')}}" class="nav-link">
                                            <i class="nav-icon fas fa-check-double"></i>
                                            <p>
                                            Valider heure
                                          <span class="badge badge-info right">new</span>
                                            </p>
                                        </a>
                                        </li>
                                        <li class="nav-item">
                                        <a href="{{route('Validation')}}" class="nav-link">
                                            <i class="nav-icon fas fa-eye"></i>
                                            <p>
                                            Consulter agent
                                            </p>
                                        </a>
                                        </li>
                                </ul>

                @break

             @case('drh')
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="nav-link" style="color:white;">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p > Navigateur</p>
                    </div>
                    </div>
                    <li class="nav-item">
                        <a  href="{{route('Acceuil')}}" href="#" class="nav-link">
                            <i class="fas fa-home"></i>
                            <p>
                           Acceuil
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{route('Chartsrh')}}" href="#" class="nav-link">
                            <i class="fas fa-chart-bar"></i>
                            <p>
                                Statistiques
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                    <a  href="{{route('Calculheure')}}" href="#" class="nav-link">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                        Heure supplémentaire
                        </p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{route('Dashbord')}}" href="#" class="nav-link">
                            <i class="fas fa-route"></i>
                                                        <p>
                            Tableau de bord
                            </p>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{route('Affectationindex')}}" href="#" class="nav-link">
                                <i class="fas fa-luggage-cart"></i>
                                <p>
                                Affectation
                                </p>
                            </a>
                         </li>
            </ul>

                @break
                @case('dto')
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                                <div class="nav-link" style="color:white;">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p > Navigateur</p>
                                </div>
                                </div>
                                  <li class="nav-item">
                                            <a  href="{{route('Acceuil')}}" href="#" class="nav-link">
                                                <i class="fas fa-home"></i>
                                                <p>
                                               Acceuil
                                                </p>
                                            </a>
                                        </li>

                                <li class="nav-item">
                                <a  href="{{route('Validation')}}"  class="nav-link">
                                    <i class="nav-icon fas fa-check-double"></i>
                                    <p>
                                    Valider heure
                                  <span class="badge badge-info right">new</span>
                                    </p>
                                </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('Chartsrh')}}" href="#" class="nav-link">
                                        <i class="fas fa-chart-bar"></i>
                                        <p>
                                            Statistiques
                                        </p>
                                    </a>
                                <li class="nav-item">
                                <a  href="{{route('Validation')}}" href="#" class="nav-link">
                                    <i class="nav-icon fas fa-eye"></i>
                                    <p>
                                    Consulter agent
                                    </p>
                                </a>
                                </li>
                </ul>

                @break
                @case('dcm')
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                                <div class="nav-link" style="color:white;">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p > Navigateur</p>
                                </div>
                                </div>
                                  <li class="nav-item">
                                            <a  href="{{route('Acceuil')}}" href="#" class="nav-link">
                                                <i class="fas fa-home"></i>
                                                <p>
                                               Acceuil
                                                </p>
                                            </a>
                                        </li>

                                <li class="nav-item">
                                <a  href="{{route('Validation')}}"  class="nav-link">
                                    <i class="nav-icon fas fa-check-double"></i>
                                    <p>
                                    Valider heure
                                  <span class="badge badge-info right">new</span>
                                    </p>
                                </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('Chartsrh')}}" href="#" class="nav-link">
                                        <i class="fas fa-chart-bar"></i>
                                        <p>
                                            Statistiques
                                        </p>
                                    </a>
                                <li class="nav-item">
                                <a  href="{{route('Validation')}}" href="#" class="nav-link">
                                    <i class="nav-icon fas fa-eye"></i>
                                    <p>
                                    Consulter agent
                                    </p>
                                </a>
                                </li>
                </ul>
                @break


        @endswitch
              @endif
@endforeach
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

</div>
@yield('content')
<!-- ./wrapper -->
<!-- jQuery -->
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="https://www.seneau.sn/portail/fr-FR">SEN'EAU</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b>1
    </div>
  </footer>
</div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
   {{-- ChartScript --}}
   @if(isset($usersChartDiourbel))
   {!! $usersChartDiourbel->script() !!}
   @else <script></script>
   @endif

   @if(isset($usersChartKaolack))
   {!! $usersChartKaolack->script() !!}
   @else <script></script>
   @endif

   @if(isset($usersChartLouga))
   {!! $usersChartLouga->script() !!}
   @else <script></script>
   @endif

   @if(isset($usersChartDakar1))
   {!! $usersChartDakar1->script() !!}
   @else <script></script>
   @endif


   @if(isset($usersChartRufisque))
   {!! $usersChartRufisque->script() !!}
   @else <script></script>
   @endif

   @if(isset($usersChartDakar2))
   {!! $usersChartDakar2->script() !!}
   @else <script></script>
   @endif

   @if(isset($usersChartHann))
   {!! $usersChartHann->script() !!}
   @else <script></script>
   @endif


   @if(isset($usersChartThies))
   {!! $usersChartThies->script() !!}
   @else <script></script>
   @endif
   @if(isset($usersChartSaint_Louis))
   {!! $usersChartSaint_Louis->script() !!}
   @else <script></script>
   @endif

   @if(isset($usersChartZiguinchor))
   {!! $usersChartZiguinchor->script() !!}
   @else <script></script>
   @endif

   @if(isset($usersChartTambacounda))
   {!! $usersChartTambacounda->script() !!}
   @else <script></script>
   @endif
   @if(isset($usersChartNgnith))
   {!! $usersChartNgnith->script() !!}
   @else <script></script>
   @endif
