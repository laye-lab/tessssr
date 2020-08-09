@extends('layouts.template_dashbord')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <h1>Choix service</h1>
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <!-- Main content -->
      <center>
      <section class="content" style="position:relative;left:10%">
        <div class="container-fluid">
          <div class="row">
            <div class="col-10">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Users</h3>
                </div>
                <div style="position:relative;left:10%">
                  <form method="POST" action="{{ route('homeCommandepost') }}">
                    @csrf
      <div class="form-group row">

            <div class="col-6">
                <label for="example-text-input" class="col-2 col-form-label">Choisissez le service</label>
              <select name="service" id="pet-select">
               
                @foreach($affectation as $affectations)
                @if(Auth::user()->id == $affectations->agentMatricule_Agent)
                  @foreach($service as $services)
                    @if($affectations->Etablissemt_nom == $services->Etablissemt_nom) 
                    <option value=" {{$services->Libelle_Affectation}}">
                      {{$services->Libelle_Affectation}}
                    </option>

                     @endif
                  @endforeach
                @endif
                @endforeach
            
            </select>
            </div>
    
          </div>
      <input class="form-control"  name="commandeur" type="hidden" value="{{Auth::user()->id }}"" id="example-text-input">

    <center> <button class=" btn btn-lg btn-info"  style="position:relative;right:10%">Passer commande</button></center> 
    </div>
  </form>
  </center> 
@endsection
