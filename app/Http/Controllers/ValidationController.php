<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Charts\UserChart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
class ValidationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {

        $user=auth()->user()->id;
        $current_month = date('m');
        $current_year = date("Y");
        $etablissement_dr =DB::table('agent')->where('Matricule_Agent', '=', $user)->first();


        $total_current_month =DB::table('heures_supp')->select('total_heures_saisie')
        ->whereMonth('Date_Heure', '=',$current_month)->sum('total_heures_saisie');

        $total_current_month_dr=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
        ->where('Etablissement', '=',$etablissement_dr->Etablissement)->whereMonth('Date_Heure', '=',$current_month)->sum('total_heures_saisie');


        $total_current_year =DB::table('heures_supp')->select('total_heures_saisie')
        ->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $total_current_year_dr =DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
        ->where('Etablissement', '=',$etablissement_dr->Etablissement)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');
        $service=DB::table('affectation')
            ->join('agent','agent.Matricule_Agent','=','affectation.agentMatricule_Agent')
            ->select('Matricule_agent','Nom_Agent','Fonction','Statut','Libelle_Affectation','Direction','Etablissemt_nom')
            ->distinct('Matricule_agent')
            ->get();
            $etablissement_dr = DB::table('agent')
            ->where('Matricule_agent', '=', $user)
            ->select('etablissement')
            ->first();



            $role_account=DB::table('Role_Account')
            ->join('users','users.id' ,'=', 'Role_Account.AccountID')
            ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
            ->join('agent','agent.Matricule_Agent' ,'=','users.id')
            ->select('Matricule_agent','Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement')
            ->get();

            $agent_attribut=DB::table('agent_Heures_supp_a_faire')
            ->join('agent','agent.Matricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
            ->join('heures_supp','heures_supp.id_heure_a_faire','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
            ->join('Heures_supp_a_faire','Heures_supp_a_faire.ID','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
            ->where('heures_supp.id_heure_a_faire', '=',116)
            ->get();


            $equipe=DB::table('equipe')
            ->get();

            $heure_supp=DB::table('heures_supp')
            ->get();
            $nbr_heure=DB::table('Heures_supp_a_faire')
            ->join('agent_Heures_supp_a_faire','agent_Heures_supp_a_faire.Heures_supp_a_faireID','=','Heures_supp_a_faire.ID')
            ->join('heures_supp','heures_supp.id_heure_a_faire','=','Heures_supp_a_faire.ID')
            ->get();

            $Affectation =DB::table('agent')->select('affectation')->distinct('affectation')->get();


            $data_dto = DB::table('heures_supp')
            ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
            ->whereMonth('Date_Heure', '=',  now()->month)
            ->whereYear('Date_Heure', '=',$current_year)
            ->where('heures_supp.statut', '=',3)
            ->select
                (
                DB::raw('SUM(total_heures_saisie) as total'),
                DB::raw('AVG(total) as moy'),
                DB::raw('Etablissement as Etablissements'),
                )
                ->groupBy('Etablissements')
                ->get();
                $data_dto_count= $data_dto->count();


                $data_dcm = DB::table('heures_supp')
                ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
                ->whereMonth('Date_Heure', '=',  now()->month)
                ->whereYear('Date_Heure', '=',$current_year)
                ->where('heures_supp.statut', '=',3)
                ->select
                    (
                    DB::raw('SUM(total_heures_saisie) as total'),
                    DB::raw('AVG(total) as moy'),
                    DB::raw('Etablissement as Etablissements'),
                    )
                    ->groupBy('Etablissements')
                    ->get();

                    $data_dcm_count= $data_dcm->count();

                    $data_dq = DB::table('heures_supp')
                    ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
                    ->whereMonth('Date_Heure', '=',  now()->month)
                    ->whereYear('Date_Heure', '=',$current_year)
                    ->where('heures_supp.statut', '=',3)
                    ->select
                        (
                        DB::raw('SUM(total_heures_saisie) as total'),
                        DB::raw('AVG(total) as moy'),
                        DB::raw('Etablissement as Etablissements'),
                        )
                        ->groupBy('Etablissements')
                        ->get();

                        $data_dq_count= $data_dq->count();

                $data_n_plus_2 = DB::table('agent_Heures_supp_a_faire')
                ->join('agent','agent.Matricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
                ->join('heures_supp','heures_supp.id_heure_a_faire','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
                ->whereMonth('Date_Heure', '=',  now()->month)
                ->whereYear('Date_Heure', '=',$current_year)
                ->where([
                    ['agent.etablissement', '=',$etablissement_dr->etablissement],
                    ['heures_supp.statut', '=',2]
                    ])
                 ->get();

                $data_n_plus_2_count =  $data_n_plus_2->count();

            $heurre_a_faire=DB::table('agent_Heures_supp_a_faire')
            ->join('agent','agent.Matricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
            ->join('heures_supp','heures_supp.id_heure_a_faire','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
            ->select('agent.Matricule_agent','Nom_Agent','Etablissement','Date_Heure','heure_debut'
            ,'heure_fin','travaux_effectuer','observations','heures_supp.id','heures_supp.Statut','id_heure_a_faire','total_heures_saisie')
            ->get();

            $heurre_somme=DB::table('heures_supp')
            ->join('agent','agent.Matricule_Agent','=','heures_supp.Agent_Matricule_Agent')
            ->whereMonth('Date_Heure', '=',  now()->month)
            ->whereYear('Date_Heure', '=',$current_year)
            ->where([
                ['agent.etablissement', '=',$etablissement_dr->etablissement],
                ['heures_supp.statut', '=',2]
                ])
                ->select
                (
                DB::raw('SUM(total_heures_saisie) as total'),
                DB::raw('id_heure_a_faire as id_heure'),
                DB::raw('Matricule_Agent as Matricule_Agent'),
                DB::raw('Nom_Agent as Nom_Agent'),
                )->groupBy('id_heure','Matricule_Agent')
                ->get();

                $heurre_somme_n_plus_un=DB::  table('agent_Heures_supp_a_faire')
                ->join('agent','agent.Matricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
                ->join('heures_supp','heures_supp.id_heure_a_faire','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
                ->join('Heures_supp_a_faire','Heures_supp_a_faire.ID','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
                ->whereMonth('Date_Heure', '=',  now()->month)
                ->whereYear('Date_Heure', '=',$current_year)
                ->where([
                    ['Heures_supp_a_faire.responsable', '=', $user ],
                    ['heures_supp.statut', '=',1]
                    ])
                    ->select
                    (
                    DB::raw('SUM(total_heures_saisie) as total'),
                    DB::raw('id_heure_a_faire as id_heure'),
                    DB::raw('Matricule_Agent as Matricule_Agent'),
                    DB::raw('Nom_Agent as Nom_Agent'),
                    )->groupBy('id_heure','Matricule_Agent')
                    ->get();

                    $data_n_plus_1_count = $heurre_somme_n_plus_un->count();

            $Ngnith=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Ngnith"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Ngnith_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Ngnith"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Ngnith_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Ngnith"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Ngnith_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Ngnith"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Diourbel=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Diourbel"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Diourbel_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Diourbel"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Diourbel_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Diourbel"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Diourbel_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Diourbel"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Tambacounda=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Tambacounda"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Tambacounda_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Tambacounda"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Tambacounda_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Tambacounda"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Tambacounda_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Tambacounda"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Kaolack=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Kaolack"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Kaolack_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Kaolack"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Kaolack_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Kaolack"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Kaolack_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Kaolack"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Dakar1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Dakar 1"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Dakar1_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Dakar 1"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Dakar1_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Dakar 1"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Dakar1_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Dakar 1"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Dakar2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Dakar 2"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Dakar2_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Dakar 2"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Dakar2_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Dakar 2"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Dakar2_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Dakar 2"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');


            $Louga=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Louga"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Louga_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Louga"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Louga_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Louga"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Louga_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Louga"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Ziguinchor=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Ziguinchor"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Ziguinchor_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Ziguinchor"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Ziguinchor_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Ziguinchor"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Ziguinchor_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Ziguinchor"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Rufisque=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Rufisque"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Rufisque_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Rufisque"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Rufisque_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Rufisque"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Rufisque_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Rufisque"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Thies=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Thiés"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Thies_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Thiés"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Thies_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Thiés"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Thies_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Thiés"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Hann=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Centre de Hann"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Hann_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Centre de Hann"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Hann_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Centre de Hann"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Hann_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Centre de Hann"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');


            $Saint_Louis=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
            ->where([['Etablissement', '=',"Saint-Louis"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Saint_Louis_moins_1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonth()->month)
            ->where([['Etablissement', '=',"Saint-Louis"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Saint_Louis_moins_2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(2)->month)
            ->where([['Etablissement', '=',"Saint-Louis"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');

            $Saint_Louis_moins_3=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
            '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->subMonths(3)->month)
            ->where([['Etablissement', '=',"Saint-Louis"],
            ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
            ->sum('total_heures_saisie');


            $usersChartDiourbel = new UserChart;
            $usersChartDiourbel->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartDiourbel->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Diourbel_moins_3,$Diourbel_moins_2, $Diourbel_moins_1,$Diourbel])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

            $usersChartTambacounda = new UserChart;
            $usersChartTambacounda->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartTambacounda->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Tambacounda_moins_3,$Tambacounda_moins_2, $Tambacounda_moins_1,$Tambacounda])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

            $usersChartNgnith = new UserChart;
            $usersChartNgnith->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartNgnith->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Ngnith_moins_3,$Ngnith_moins_2, $Ngnith_moins_1,$Ngnith])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

            $usersChartRufisque = new UserChart;
            $usersChartRufisque->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartRufisque->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Rufisque_moins_3,$Rufisque_moins_2, $Rufisque_moins_1,$Rufisque])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

            $usersChartSaint_Louis = new UserChart;
            $usersChartSaint_Louis->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartSaint_Louis->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Saint_Louis_moins_3,$Saint_Louis_moins_2, $Saint_Louis_moins_1,$Saint_Louis])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

            $usersChartThies = new UserChart;
            $usersChartThies->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartThies->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Thies_moins_3,$Thies_moins_2, $Thies_moins_1,$Thies])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

            $usersChartHann = new UserChart;
            $usersChartHann->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartHann->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Hann_moins_3,$Hann_moins_2, $Hann_moins_1,$Hann])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

            $usersChartKaolack = new UserChart;
            $usersChartKaolack->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartKaolack->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Kaolack_moins_3,$Kaolack_moins_2, $Kaolack_moins_1,$Kaolack])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;


            $usersChartDakar1 = new UserChart;
            $usersChartDakar1->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartDakar1->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Dakar1_moins_3,$Dakar1_moins_2, $Dakar1_moins_1,$Dakar1])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

            $usersChartDakar2 = new UserChart;
            $usersChartDakar2->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartDakar2->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Dakar2_moins_3,$Dakar2_moins_2, $Dakar2_moins_2,$Dakar2])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

            $usersChartLouga = new UserChart;
            $usersChartLouga->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartLouga->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Louga_moins_3,$Louga_moins_2, $Louga_moins_1,$Louga])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

            $usersChartZiguinchor = new UserChart;
            $usersChartZiguinchor->labels([now()->subMonths(3)->month, now()->subMonths(2)->month,now()->subMonth()->month, $current_month]);
            $usersChartZiguinchor->dataset('Evolution  sur les trois derniers mois  ', 'line', [$Ziguinchor_moins_3,$Ziguinchor_moins_2, $Ziguinchor_moins_1,$Ziguinchor])
            ->color( "rgb(15, 50,192)" )
            ->backgroundcolor("rgb(94, 219, 23)");;

                    return view('Validation')->with([
                        'role_account'=> $role_account,
                        'agent_attribut'=> $agent_attribut,
                        'nbr_heure'=> $nbr_heure,
                        'usersChartDiourbel' => $usersChartDiourbel,
                        'usersChartKaolack' => $usersChartKaolack,
                        'usersChartDakar1' => $usersChartDakar1,
                        'heurre_somme' => $heurre_somme,
                        'heurre_somme_n_plus_un' => $heurre_somme_n_plus_un,
                        'data_n_plus_2' => $data_n_plus_2,
                        'data_n_plus_1_count' => $data_n_plus_1_count,
                        'data_n_plus_2_count' => $data_n_plus_2_count,
                        'usersChartDakar2' => $usersChartDakar2,
                        'total_current_month_dr' => $total_current_month_dr,
                        'total_current_year_dr' => $total_current_year_dr,
                        'usersChartThies' => $usersChartThies,
                        'usersChartNgnith' => $usersChartNgnith,
                        'usersChartTambacounda' => $usersChartTambacounda,
                        'usersChartRufisque' => $usersChartRufisque,
                        'usersChartHann' => $usersChartHann,
                        'usersChartSaint_Louis' => $usersChartSaint_Louis,
                        'usersChartLouga' => $usersChartLouga,
                        'usersChartZiguinchor' => $usersChartZiguinchor,
                        'heure_supp'=> $heure_supp,
                        'heurre_a_faire'=>$heurre_a_faire,
                        'equipe'=>$equipe,
                        'data_dto'=>$data_dto,
                        'data_dto_count'=>$data_dto_count,
                        'data_dcm'=>$data_dcm,
                        'data_dcm_count,'=>$data_dcm_count,
                        'data_dq'=>$data_dq,
                        'data_dq_count'=>$data_dq_count,
                        'Affectation'=>$Affectation,
                        'service'=>$service
                    ]);


    }
    public function store(Request $request)
    {
        $role=request('role');
        $id=request('id');
        switch ($role){
            case 'n+1':

           $Step=DB::table('agent_Heures_supp_a_faire')
            ->join('agent','agent.Matricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
            ->join('heures_supp','heures_supp.id_heure_a_faire','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
            ->join('Heures_supp_a_faire','Heures_supp_a_faire.ID','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
            ->join('Step','Step.Heures_supp_a_faireID','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
            ->where([
                ['Heures_supp_a_faire.responsable', '=', $id ],
                ['heures_supp.Statut', '=', 1  ],
                ])
            ->update(['etape' => 2]);

            $Heures_supp=DB::table('agent_Heures_supp_a_faire')
            ->join('agent','agent.Matricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
            ->join('heures_supp','heures_supp.id_heure_a_faire','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
            ->join('Heures_supp_a_faire','Heures_supp_a_faire.ID','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
            ->where([
                ['Heures_supp_a_faire.responsable', '=', $id ],
                ['heures_supp.Statut', '=', 1  ],
                ])
            ->update(['heures_supp.Statut' => 2]);

        return back();
          break;
        case 'n+2':
            $etablissement=request('etablissement');
            if ($etablissement == 'Hann') {
                $Heures_supp=DB::table('heures_supp')
                ->where([
                    ['commandeur', '=', $id ],
                    ['Statut', '=', 2],
                    ])
                ->update(['Statut' => 4]);

                $Step=DB::table('Step')
                ->where('Demandeur', '=',$id)
                ->update(['etape' => 2]);
            }
            else {
                $Heures_supp=DB::table('heures_supp')
                ->where([
                    ['commandeur', '=', $id ],
                    ['Statut', '=', 2  ],
                    ])
                ->update(['Statut' => 3]);

                $Step=DB::table('Step')
                ->where('Heures_supp_a_faireID', '=',$id)
                ->update(['etape' => 2]);

            }

        return back()->with('success','Toutes les heure Supplémentaire sont maintenant validées ');
              break;
        case 'n+3' or 'dcm' or 'dto' :
            $Heures_supp=DB::table('heures_supp')
            ->where([
                ['commandeur', '=', $id ],
                ['Statut', '=', 3  ],
                ])
            ->update(['Statut' => 4]);

            $Step=DB::table('Step')
            ->where('Demandeur', '=',$id)
            ->update(['etape' => 2]);

            return back();
              break;

        }

    }
    public function Invalideur(Request $request)
    {
        $role=request('role');
        $id=request('id');
        switch ($role){

        case 'n+2':
                $Heures_supp=DB::table('heures_supp')
                ->where('id_heure_a_faire', '=', $id )
                ->update(['Statut' => 1]);

                $Step=DB::table('Step')
                    ->where('Heures_supp_a_faireID', '=',$id)
                    ->update(['etape' => 1]);
                    return back()->with('success','heures supplémentaire invalidées ');
              break;
        }

    }

    public function InvalideurPerRegion(Request $request)
    {

        $Etablissement=request('Etablissement');

                $Heures_supp=DB::table('heures_supp')
                ->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
                ->where('etablissement', '=',$Etablissement)
                ->update(['heures_supp.statut' => 2]);
                    return back()->with('success','heures supplémentaire invalidées ');



    }
}
