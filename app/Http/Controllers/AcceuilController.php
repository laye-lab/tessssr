<?php

namespace App\Http\Controllers;
use App\Charts\UserChart;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
class AcceuilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $users=User::all();
         $user=auth()->user()->id;
        $current_month = date('m');
        $current_year = date("Y");
        if (null != request('mois')){

            $mois=request('mois');
            $etablissement_janvier=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 1)->sum('total_heures_saisie');
            $etablissement_fevrier=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 2)->sum('total_heures_saisie');
            $etablissement_mars=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 3)->sum('total_heures_saisie');
            $etablissement_avril=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 4)->sum('total_heures_saisie');
            $etablissement_mai=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 5)->sum('total_heures_saisie');
            $etablissement_juin=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 6)->sum('total_heures_saisie');
            $etablissement_juillet=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 7)->sum('total_heures_saisie');
            $etablissement_aout=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 8)->sum('total_heures_saisie');
            $etablissement_septembre=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 9)->sum('total_heures_saisie');
            $etablissement_octobre=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 10)->sum('total_heures_saisie');
            $etablissement_novembre=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 11)->sum('total_heures_saisie');
            $etablissement_decembre=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 12)->sum('total_heures_saisie');
        }else {
            $mois=0;
            $etablissement=0;
            $etablissement_janvier=0;
            $etablissement_fevrier=0;
            $etablissement_mars=0;
            $etablissement_avril=0;
            $etablissement_mai=0;
            $etablissement_juin=0;
            $etablissement_juillet=0;
            $etablissement_aout=0;
            $etablissement_septembre=0;
            $etablissement_octobre=0;
            $etablissement_novembre=0;
            $etablissement_decembre=0;
            $total_taux_15_month=0;
            $total_taux_40_month=0;
            $total_taux_60_month=0;
            $total_taux_100_month=0;
        }
        $Affectation =DB::table('agent')->select('affectation')->distinct('affectation')->get();


        $data = DB::table('heures_supp')
        ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
        ->whereMonth('Date_Heure', '=',  now()->month)
        ->whereYear('Date_Heure', '=',$current_year)
        ->where('heures_supp.statut', '>=',3)
        ->select
            (
            DB::raw('SUM(total_heures_saisie) as total'),
            DB::raw('AVG(total) as moy'),
            DB::raw('Etablissement as Etablissements'),
            )
            ->groupBy('Etablissements')
            ->get();

            $data_dcm = DB::table('heures_supp')
            ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
            ->where('Direction', '=','DCM')
            ->select
                (
                DB::raw('SUM(total_taux_15) as sum15'),
                DB::raw('SUM(total_taux_40) as sum40'),
                DB::raw('SUM(total_taux_60) as sum60'),
                DB::raw('SUM(total_taux_100) as sum100'),
                DB::raw('SUM(total_heures_saisie) as total'),
                DB::raw('Affectation as Affectations'),
                )
                ->groupBy('Affectations')
                ->get();

                $data_dto = DB::table('heures_supp')
                ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
                ->where('Direction', '=','DTO')
                ->select
                    (
                    DB::raw('SUM(total_taux_15) as sum15'),
                    DB::raw('SUM(total_taux_40) as sum40'),
                    DB::raw('SUM(total_taux_60) as sum60'),
                    DB::raw('SUM(total_taux_100) as sum100'),
                    DB::raw('SUM(total_heures_saisie) as total'),
                    DB::raw('Affectation as Affectations'),
                    )
                    ->groupBy('Affectations')
                    ->get();


            $data_drh= DB::table('heures_supp')
            ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
            ->select(
                DB::raw('YEAR(Date_Heure) as year'),
                DB::raw('MONTH(Date_Heure) as month'),
                DB::raw('SUM(total_taux_15) as sum15'),
                DB::raw('SUM(total_taux_40) as sum40'),
                DB::raw('SUM(total_taux_60) as sum60'),
                DB::raw('SUM(total_taux_100) as sum100'),
                DB::raw('Nom_Agent as Nom'),
                DB::raw('SUM(total_heures_saisie) as total'),
                DB::raw('(Agent_Matricule_Agent) as agent'),
                DB::raw('(heures_supp.Statut) as statut'))
               ->groupBy('year','month','agent','statut')
               ->get();


        $user=auth()->user()->id;
        $current_month = date('m');
        $current_year = date("Y");

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "#003f5c",
            "#2f4b7c",
            "#665191",
            "#a05195",
            "#d45087",
            "#f95d6a",
            "#ff7c43",
            "#ffa600",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        $etablissement_dr =DB::table('agent')->where('Matricule_Agent', '=', $user)->first();


        $total_current_month =DB::table('heures_supp')->select('total_heures_saisie')
        ->whereMonth('Date_Heure', '=',$current_month)->sum('total_heures_saisie');

        $total_current_month_dr=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
        ->where('Etablissement', '=',$etablissement_dr->Etablissement)->whereMonth('Date_Heure', '=',$current_month)->sum('total_heures_saisie');


        $total_current_year =DB::table('heures_supp')->select('total_heures_saisie')
        ->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $total_current_year_dr =DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
        ->where('Etablissement', '=',$etablissement_dr->Etablissement)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');




        $Ziguinchor=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Ziguinchor"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Diourbel=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Diourbel"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Ngnith=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Ngnith"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Kaolack=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Kaolack"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Tambacounda=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Tambacounda"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Dakar1=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Dakar 1"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Dakar2=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Dakar 2"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Louga=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Louga"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Rufisque=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Rufisque"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Thies=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Thiés"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Hann=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Centre de Hann"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $Saint_Louis=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,
        '=','heures_supp.Agent_Matricule_Agent')->whereMonth('Date_Heure', '=',  now()->month)
        ->where([['Etablissement', '=',"Saint-Louis"],
        ['heures_supp.statut', '>=',3]])->whereYear('Date_Heure', '=',$current_year)
        ->sum('total_heures_saisie');

        $usersChartKaolack = new UserChart;
        $usersChartKaolack->labels(['Kaolack', 'Ziguinchor', 'Ngnith','Diourbel','Tambacounda','Dakar1','Dakar2','Louga','Rufisque','Thies','Hann','Saint_Louis']);
        $usersChartKaolack->dataset('', 'bar', [ $Kaolack, $Ziguinchor, $Ngnith,$Diourbel,$Tambacounda,$Dakar1,$Dakar2,$Louga,$Rufisque,$Thies,$Hann,$Saint_Louis])
        ->color($borderColors)
        ->backgroundcolor($fillColors);

        $role_account=DB::table('Role_Account')
        ->join('users','users.id' ,'=', 'Role_Account.AccountID')
        ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
        ->join('agent','agent.Matricule_Agent' ,'=','users.id')
        ->select('Matricule_agent','Role.Nom','Nom_Agent','fonction')
        ->get();


        return view('Acceuil')->with([
                'users'=>$users,
                'usersChartKaolack' =>$usersChartKaolack,
                'data' => $data,
                'data_dto' => $data_dto,
                'data_drh' => $data_drh,
                'total_current_month' =>  $total_current_month,
                'total_current_month_dr' =>  $total_current_month_dr,
                'total_current_year' =>  $total_current_year,
                'total_current_year_dr' =>  $total_current_year_dr,
                'role_account'=>$role_account]);
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
