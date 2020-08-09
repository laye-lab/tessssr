<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
class HomeCommandeController extends Controller
{
  /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }
    
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
    
        public function index()
        {
            $role_account=DB::table('Role_Account')
            ->join('users','users.id' ,'=', 'Role_Account.AccountID')
            ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
            ->join('agent','agent.Matricule_Agent' ,'=','users.id')
            ->join('Etablissement','Etablissement.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Direction','Direction.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Service','Service.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Fonction','Fonction.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->select('Matricule_agent','Libelle_Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement.nom')
            ->get();

            $service=DB::table('Affectation')
            ->select('Libelle_Affectation','Etablissemt_nom','agentMatricule_Agent')
            ->distinct('Libelle_Affectation')
            ->select('Libelle_Affectation','Etablissemt_nom')
            ->get();
            $affectation=DB::table('Affectation')
            ->select('Libelle_Affectation','Etablissemt_nom','agentMatricule_Agent')
            ->get();
             /**
         *print_r($service)
         *
         */
        return view('homeCommandeindex')->with([
          
            'role_account'=> $role_account,
            'service'=> $service,
            'affectation'=> $affectation

        ]
        );
        }
        public function showForm()
        {
            $servicedr=request('service');
            $role_account=DB::table('Role_Account')
            ->join('users','users.id' ,'=', 'Role_Account.AccountID')
            ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
            ->join('agent','agent.Matricule_Agent' ,'=','users.id')
            ->join('Etablissement','Etablissement.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Direction','Direction.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Service','Service.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Fonction','Fonction.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->select('Matricule_agent','Sexe','Libelle_Fonction','Statut','Direction','Role.Nom','Nom_Agent')
            ->get();
        

       
            $users=User::all();
            $agent_attribut=DB::table('agent')
            ->join('Etablissement','Etablissement.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Direction','Direction.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('equipe','equipe.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('affectation','affectation.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Service','Service.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Fonction','Fonction.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->select('agent.Matricule_agent','Nom_Agent','Fonction.Libelle_Fonction','agent.Statut'
            ,'Direction.Direction','Etablissement.id','Etablissement.nom','n_plus_un','Libelle_Affectation')
            ->get();
            
            $agent_etablissement=DB::table('agent')
            ->join('Etablissement','Etablissement.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Direction','Direction.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('affectation','affectation.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Service','Service.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Fonction','Fonction.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->select('agent.Matricule_agent','Nom_Agent','Fonction.Libelle_Fonction','agent.Statut'
            ,'Direction.Direction','Etablissement.nom','Etablissemt_nom','Libelle_Affectation')
            ->get();

            $service=DB::table('Affectation')
            ->join('agent','agent.Matricule_Agent','=','affectation.agentMatricule_Agent')
            ->join('Direction','Direction.agentMatricule_Agent','=','affectation.agentMatricule_Agent')
            ->join('Fonction','Fonction.agentMatricule_Agent','=','affectation.agentMatricule_Agent')
            ->select('Matricule_agent','Nom_Agent','Libelle_Fonction','Statut','Libelle_Affectation','Direction','Etablissemt_nom')
            ->distinct('Matricule_agent')
            ->get();
            
            return view('homeCommande')->with([
                'service'=> $service,
                'users'=>$users,
                'agent_etablissement'=>$agent_etablissement,
                'role_account'=> $role_account,
                'servicedr'=> $servicedr

            ]
            );
        }
}    
    
    

