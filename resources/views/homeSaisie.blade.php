@extends('../../layouts.template_dashbord')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Liste des utilisateurs</h1>
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header
             select('agent.Matricule_agent','users.name','Fonction.Libelle_Fonction','agent.Statut','Direction.Direction')-->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead  class="table-success">
                  <tr>
                    <th>Matricule</th>
                    <th>Prenom et Nom</th>
                    <th>Fonction</th>
                    <th>Statut</th>
                    <th>Secteur/Service</th>
                    <th>Direction</th>
                    <th>Etablissemt</th>
                    <th></th>
                  </tr>
                  </thead>

                  <tbody>
                            @foreach($agent_attribut as $agent_attributs)

                                   @if($agent_attributs->n_plus_un ==Auth::user()->id )                   

                                      <td>
                                        {{$agent_attributs->Matricule_agent}}
                                      </td>
                                      
                                      <td>
                                        {{$agent_attributs->Nom_Agent}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->Libelle_Fonction}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->Statut}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->Libelle_Affectation}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->Direction}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->nom}}
                                      </td>
                                
                                    
                                
                                    <td>
                                      <form method="POST" action="{{'Saisie'}}">
                                        @csrf
                                      <input type="hidden" name="id"  value="{{$agent_attributs->Matricule_agent}}">
                                      <input type="hidden" name="nom"  value=" {{$agent_attributs->Nom_Agent}}">
                                      <input type="hidden" name="servicedr"  value="{{$agent_attributs->Libelle_Affectation}}">
                                        <button type="submit" class="btn btn-primary">Saisir</button>
                                      </form>
                                   
                                    </td>

                                  </tr>
                          
                                    @endif
                              
                              @endforeach
                      
                </table>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
