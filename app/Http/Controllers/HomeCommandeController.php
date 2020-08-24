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
            ->select('Matricule_agent','Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement')
            ->get();

            $agent_attribut=DB::table('agent')
            ->join('equipe','equipe.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('agent_Heures_supp_a_faire','agent_Heures_supp_a_faire.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->distinct('Matricule_agent')
            ->select('agent.Matricule_agent','Nom_Agent','n_plus_un','Statut','Direction','etablissement')
            ->get();

            $service=DB::table('agent')
            ->select('Matricule_agent','Affectation','Direction','Etablissement')
            ->distinct('Affectation')
            ->get();


             /**
         *print_r($service)
         *
         */
        return view('homeCommandeindex')->with([

            'role_account'=> $role_account,
            'service'=> $service,

        ]
        );
        }
        public function showForm()
        {  $users=User::all();
            $servicedr=request('service');
            $role_account=DB::table('Role_Account')
            ->join('users','users.id' ,'=', 'Role_Account.AccountID')
            ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
            ->join('agent','agent.Matricule_Agent' ,'=','users.id')
            ->select('Matricule_agent','Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement')
            ->get();

            $agent_attribut=DB::table('agent')
            ->join('equipe','equipe.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('agent_Heures_supp_a_faire','agent_Heures_supp_a_faire.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->distinct('Matricule_agent')
            ->select('agent.Matricule_agent','Nom_Agent','n_plus_un','Statut','Direction','etablissement')
            ->get();

            $service=DB::table('Affectation')
            ->join('agent','agent.Matricule_Agent','=','affectation.agentMatricule_Agent')
            ->join('equipe','equipe.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->select('Matricule_agent','Nom_Agent','Fonction','Statut','Affectation','Direction','Etablissemt_nom','n_plus_un')
            ->distinct('Matricule_agent')
            ->get();

            $agent_etablissement=DB::table('agent')
            ->select('agent.Matricule_agent','Nom_Agent','Fonction','agent.Statut'
            ,'Direction','Etablissement','Affectation')
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



