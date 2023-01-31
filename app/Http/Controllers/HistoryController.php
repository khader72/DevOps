<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;


class HistoryController extends Controller
{
    //

    public function ShowHistory()
    {
        if (session()->exists(['valueUser', 'privilege'])) {

            $traitement = DB::table('view_traitement')->get();
            $statutfirst = DB::table('statut')->get()->first();
            $statutlast = DB::table('statut')->get()->last();
            $type_vehicule = DB::table('type_vehicule')->get();
            $prestations = DB::table('view_prestation')->get();
            $employe = DB::table('employe')
                ->where('idtype_employe', 'emp002')
                ->get();
            //var_dump($statutlast->idstatut);
            //die();
            return view('Template/content_history', compact('traitement', 'type_vehicule', 'employe', 'prestations', 'statutfirst', 'statutlast'));
        } else {
            return redirect('/login');
        }
    }
}
