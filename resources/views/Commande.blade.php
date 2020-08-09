@extends('layouts.template_dashbord')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <h1>Liste des utilisateurs</h1>
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
                  {{$collab}}
                  <form method="POST" action="{{ route('Commandestore') }}">
                    @csrf
      <div class="form-group row">

        <label for="example-datetime-local-input" class="col-2 col-form-label">Date de debut</label>
        <div class="col-6">
            <input class="form-control"  type="date" name="Date_debut"  value="{{ old('Date_debut') }}" id="example-date-input">
        </div>
      </div>
      <div class="form-group row">

        <label for="example-datetime-local-input" class="col-2 col-form-label">Date de fin</label>
        <div class="col-6">
            <input class="form-control"  type="date" name="Date_fin"  value="{{ old('Date_fin') }}" id="example-date-input">
        </div>
      </div>
      <div class="form-group row">

        <label for="example-datetime-local-input" class="col-2 col-form-label">Nombre d'heure</label>
        <div class="col-6">
            <input class="form-control " type="number" name="nbr_heure"  value="{{ old('nbr_heure') }}" id="example-date-input">
        </div>
      </div>
      <div class="form-group row">

        <label for="example-datetime-local-input" class="col-2 col-form-label">Travaux a effectuer </label>
        <div class="col-6">
            <input class="form-control"  type="text" name="travaux_effectuer"  value="{{ old('travaux_effectuer') }}" id="example-date-input">
        </div>
      </div>
      <div class="form-group row">

        <label for="example-datetime-local-input" class="col-2 col-form-label">Observation</label>
        <div class="col-6">
            <input class="form-control"  type="text" name="Observations"  value="{{ old('Observations') }}" id="example-date-input">
        </div>
      </div>
      <input class="form-control"  name="commandeur" type="hidden" value="{{Auth::user()->id }}"" id="example-text-input">
      <input class="form-control"  name="collaborateur"  type="hidden" value="{{$collab}}"  id="example-text-input">
      <input class="form-control"  name="servicedr" type="hidden" value="{{$servicedr}}" id="example-text-input">
    <center> <button class=" btn btn-lg btn-info"  style="position:relative;right:10%">Valider commande</button></center> 
    </div>
  </form>
  </center> 

@endsection
