<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EquipementController extends Controller
{

    //

    public function ShowEquipement()
    {
        $value = session('valueUser');
        if ($value == NULL) {
            return view('login');
        } else {
            $equipementAll = DB::table('equipement')->get();
            return view('equipement', compact('equipementAll'));
        }
    }

    public function insertEquipement(Request $request)
    {
        $statusOK = 0;
        $statusKO = 1;
        $statusFormKO = 2;

        # code...
        $validator = Validator::make($request->all(), [
            'equipement' => 'required'
        ]);

        if ($validator->fails()) {
            return $statusFormKO;
        } else {
            //  $date = date('d/m/Y');
            //$heure = date('H:i:s');
            //$statut = 's001';

            $id_equipement = uniqid();
            $equipement = $request->input('equipement');

            $equipement = array(
                'id_equipement' => $id_equipement,
                'libelle_equipement' => $equipement
            );

            DB::beginTransaction();
            try {
                DB::table('equipement')->insert($equipement);
                DB::commit();
                //$request->session()->flash('succes', 'Les informations ont été bien enregistré');
                return $statusOK;
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                //$request->session()->flash('error', 'Les informations pas enregistrés');
                return $statusKO;
            }
        }
    }

    public function getEquipementAll(Resquest $request)
    {
        # code...
        $idEmploye = request('idEmploye');
        # code...
        $traitement = DB::table('ticket')->where([
            ['idemploye', $idEmploye]
        ])->get();
        //return response()->json($traitement);


        echo $traitement;
    }

    public function updateEquipement(Request $request)
    {
        $statusOK = 0;
        $statusKO = 1;
        $statusFormKO = 2;
        # code...
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'equipement' => 'required',
        ]);

        if ($validator->fails()) {
            return $statusFormKO;
        } else {
            //  $date = date('d/m/Y');
            //$heure = date('H:i:s');
            //$statut = 's001';
            $id = $request->input('id');
            $equipement = $request->input('equipement');
            $equipements = array(
                'libelle_equipement' => $equipement,
            );
            DB::beginTransaction();
            try {
                DB::table('equipement')->where('id_equipement', $id)
                    ->update($equipements);
                DB::commit();
                //$request->session()->flash('succes', 'Les informations ont été bien enregistré');
                return $statusOK;
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                //$request->session()->flash('error', 'Les informations pas enregistrés');
                return $statusKO;
            }
        }
    }

    public function deleteEquipement(Request $request)
    {
        $statusOK = 0;
        $statusKO = 1;
        $statusFormKO = 2;

        # code...
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $statusFormKO;
        } else {
            $id = $request->input('id');
            DB::beginTransaction();
            try {
                DB::table('equipement')->where('id_equipement', $id)
                    ->delete();
                DB::commit();
                //$request->session()->flash('succes', 'Les informations ont été bien enregistré');
                return $statusOK;
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                //$request->session()->flash('error', 'Les informations pas enregistrés');
                return $statusKO;
            }
        }
    }
}
