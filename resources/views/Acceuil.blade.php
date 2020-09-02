



@extends('layouts.template_dashbord_acceuil')

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
                                    @include('Acceuil.n_plus_3')
                                    @break
                                            <!-- ./col -->
                                @endif

                            @if($role->Nom === 'n+2')
                                    <!-- Main content -->
                                    @include('Acceuil.n_plus_2')
                                    @break
                                                        <!-- ./col -->
                                @endif

                            @if($role->Nom === 'n+1')
                                        <!-- Main content -->
                                    @include('Acceuil.n_plus_1')
                                    @break
                                                    <!-- ./col -->
                                @endif


                            @if($role->Nom === 'dto')
                                                    <!-- Main content -->

                                    @include('Acceuil.dto_dcm')
                                    @break
                                @endif


                            @if($role->Nom === 'drh')
                                    @include('Acceuil.drh')
                                    @break
                                @endif
                     @endif
     @endforeach

 @endsection
