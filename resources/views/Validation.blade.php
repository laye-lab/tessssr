@extends('../../layouts.template_dashbord_collapsed')

@section('content')
 <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    @foreach($role_account as $role)
    @if(Auth::user()->id == $role->Matricule_agent)
    @switch($role->Nom)
                      @case('n+2')
                        @include('Validation.n_plus_2')
                      @break

                      @case('sec')
                       @include('Validation.sec')
                      @break

                        @case('n+1')
                        @include('Validation.n_plus_1')
                        @break

                        @case('n+3' or 'dto' or 'dcm')
                            @include('Validation.n_plus_3')
                        @break





      @endswitch
            @break
              @endif
                @endforeach

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
