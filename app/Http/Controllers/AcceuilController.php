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
    public function index()
    {



        $users=User::all();

        $Janvier=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 1)->sum('total_heures_saisie');
        $Fevrier=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 2)->sum('total_heures_saisie');
        $Mars=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 3)->sum('total_heures_saisie');
        $Avril=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 4)->sum('total_heures_saisie');
        $Mai=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 5)->sum('total_heures_saisie');
        $Juin=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 6)->sum('total_heures_saisie');
        $Juillet=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 7)->sum('total_heures_saisie');
        $Aout=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 8)->sum('total_heures_saisie');
        $Septembre=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 9)->sum('total_heures_saisie');
        $Octobre=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 10)->sum('total_heures_saisie');
        $Novembre=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 11)->sum('total_heures_saisie');
        $Decembre=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 12)->sum('total_heures_saisie');





        $usersChart = new UserChart;
        $usersChart->labels(['Janvier', 'Fevrier', 'Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre']);
        $usersChart->dataset('Total heure Supplémentaire par mois', 'line', [ $Janvier, $Fevrier, $Mars,$Avril,$Mai,$Juin,$Juillet,$Aout,$Septembre,$Octobre,$Novembre,$Decembre])
        ->color("rgb(255, 99, 132)")
        ->backgroundcolor("rgb(255, 99, 132)");;




        $role_account=DB::table('Role_Account')
        ->join('users','users.id' ,'=', 'Role_Account.AccountID')
        ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
        ->join('agent','agent.Matricule_Agent' ,'=','users.id')
        ->select('Matricule_agent','Role.Nom','Nom_Agent')
        ->get();
        return view('Acceuil')->with([
            'users'=>$users,
            'usersChart' => $usersChart ,
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
