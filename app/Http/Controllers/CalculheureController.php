<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use App\Heures_supp;
use App\Step;
use DateTime;
use StdClass;
use Carbon\Carbon;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Validator;

class CalculheureController extends Controller
{
    public function index(){
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

        $data = DB::table('heures_supp')
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
            DB::raw('(Agent_Matricule_Agent) as agent'))
            ->where('heures_supp.Statut', '=', 4)
           ->groupBy('year','month','agent')
           ->get();

         $anne=DB::table('heures_supp')
         ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
         ->select(
             DB::raw('YEAR(Date_Heure) as year')
            )->groupBy('year')
         ->get();
         $etablissement=DB::table('etablissement')
         ->select('nom')
         ->distinct('nom')
         ->get();

        $array=DB::table('heures_supp')
        ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
        ->get();
        $array_agent=DB::table('heures_supp')
        ->select('Agent_Matricule_Agent','semaine')
        ->distinct('Agent_Matricule_Agent')
        ->get();
        $agent = json_decode(json_encode($array_agent), true);//transformer le stdclass en array
        $heure_supp = json_decode(json_encode($array), true);//transformer le stdclass en array
            return view('Calculheure')->with([
                'heure_supp'=>$heure_supp,
                'role_account'=>$role_account,
                'agent'=>$agent,  
                'data'=>$data,
                'anne'=>$anne,
                'etablissement'=>$etablissement
            ]);
    
            
       //foreach ($agent as $agents) {         
       // foreach ($semaine as  $semaines) {
         //   foreach ($heures_supp as $heures_supps) {
           //  if ($semaines->semaine == $heures_supps->semaine  and date('Y',$heures_supps->Date_Heure== $anne)){
             //   print_r($heures_supps->Date_Heure); 
               // print_r($heures_supps->heure_debut);
               // print_r($heures_supps->heure_fin);
               // print_r($heures_supps->Agent_Matricule_Agent);
             //}
           // }
       // }
   // }
    }     
    public function Showpermonth(Request $request){
    if (null !=request('month')){
    

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

      $data = DB::table('heures_supp')
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
            DB::raw('(Agent_Matricule_Agent) as agent'))
           ->groupBy('year','month','agent')
           ->get();

      $anne=DB::table('heures_supp')
      ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
      ->select(
          DB::raw('YEAR(Date_Heure) as year')
         )->groupBy('year')
      ->get();
      $etablissement=DB::table('etablissement')
      ->select('nom')
      ->distinct('nom')
      ->get();

      $array=DB::table('heures_supp')
      ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
      ->get();
      $array_agent=DB::table('heures_supp')
      ->select('Agent_Matricule_Agent','semaine')
      ->distinct('Agent_Matricule_Agent')
      ->get();
      $agent = json_decode(json_encode($array_agent), true);//transformer le stdclass en array
      $heure_supp = json_decode(json_encode($array), true);//transformer le stdclass en array
          return view('CalculheureMois')->with([
              'heure_supp'=>$heure_supp,
              'role_account'=>$role_account,
              'agent'=>$agent,  
              'data'=>$data,
              'anne'=>$anne,
              'etablissement'=>$etablissement



          ]);
  
        }
        else {
          return back()->withInput();
        }
     //foreach ($agent as $agents) {         
     // foreach ($semaine as  $semaines) {
       //   foreach ($heures_supp as $heures_supps) {
         //  if ($semaines->semaine == $heures_supps->semaine  and date('Y',$heures_supps->Date_Heure== $anne)){
           //   print_r($heures_supps->Date_Heure); 
             // print_r($heures_supps->heure_debut);
             // print_r($heures_supps->heure_fin);
             // print_r($heures_supps->Agent_Matricule_Agent);
           //}
         // }
     // }
 // }
  }
  public function Showpersecteur(Request $request){
    if (isset($request)) {
    

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

      $data = DB::table('heures_supp')
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
            DB::raw('(Agent_Matricule_Agent) as agent')) 
            ->where([
              ['heures_supp.Statut', '=', 4],
              ['MONTH(Date_Heure)', '=',request('month')],
          ])
           ->groupBy('year','month','agent')
           ->get();
      $array=DB::table('heures_supp')
      ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
      ->get();
      $anne=DB::table('heures_supp')
      ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
      ->select(
          DB::raw('YEAR(Date_Heure) as year')
         )->groupBy('year')
      ->get();
      $etablissement=DB::table('etablissement')
      ->select('nom')
      ->distinct('nom')
      ->get();
      $array_agent=DB::table('heures_supp')
      ->select('Agent_Matricule_Agent','semaine')
      ->distinct('Agent_Matricule_Agent')
      ->get();
      $agent = json_decode(json_encode($array_agent), true);//transformer le stdclass en array
      $heure_supp = json_decode(json_encode($array), true);//transformer le stdclass en array
          return view('CalculheureMois')->with([
              'heure_supp'=>$heure_supp,
              'role_account'=>$role_account,
              'agent'=>$agent,  
              'data'=>$data,
              'anne'=>$anne,
              'etablissement'=>$etablissement


          ]);
  
        }
        else {
          return back();
        }
     //foreach ($agent as $agents) {         
     // foreach ($semaine as  $semaines) {
       //   foreach ($heures_supp as $heures_supps) {
         //  if ($semaines->semaine == $heures_supps->semaine  and date('Y',$heures_supps->Date_Heure== $anne)){
           //   print_r($heures_supps->Date_Heure); 
             // print_r($heures_supps->heure_debut);
             // print_r($heures_supps->heure_fin);
             // print_r($heures_supps->Agent_Matricule_Agent);
           //}
         // }
     // }
 // }
  }
    }
    
