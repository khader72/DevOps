<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;


class TraitementController extends Controller
{
    //

    public function ShowTraitement()
    {
        if (session()->exists(['valueUser', 'privilege'])) {
            $traitement = DB::table('traitement')->get();
            $type_vehicule = DB::table('type_vehicule')->get();
            # code...
            return view('Template/content_traitement', compact('traitement', 'type_vehicule'));
        } else {
            return redirect('/login');
        }
    }

    public function insertTraitement(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(), [
            'labelTraitement' => 'required',
            'prixTraitement' => 'required',
            'typevehicule' => 'required',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('error', 'Les informations pas enregistré');
            return redirect('/content_traitement');
        } else {
            $id_taritement = uniqid();
            $labelTraitement = request('labelTraitement');
            $prixTraitement = request('prixTraitement');
            $typevehicule = request('typevehicule');

            $values = array('idtraitement' => $id_taritement, 'LabelTraitement' => $labelTraitement, 'PrixTraitement' => $prixTraitement, 'idtype_vehicule' => $typevehicule);
            DB::beginTransaction();
            try {
                DB::table('traitement')->insert($values);
                DB::commit();
                $request->session()->flash('succes', 'Les informations ont été bien enregistré');
                return redirect('/content_traitement');
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
            }
        }
    }

    public function recupTraitement(Request $request)
    {
        $idVehicule = request('idVehicule');
        $idTraitement = request('idTraitement');
        # code...
        $traitement = DB::table('view_traitement')->where([
            ['idtype_vehicule', $idVehicule],
            ['idtraitement', $idTraitement]
        ])->get();

        echo $traitement;
        //return response()->json($traitement);
    }
}
