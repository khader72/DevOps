<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;


class TypeVehiculeController extends Controller
{
    //

    public function ShowTypeVehicule()
    {
        if (session()->exists(['valueUser', 'privilege'])) {

            $type_vehicule = DB::table('type_vehicule')->get();
            # code...
            return view('Template/content_typeVehicule', ['type_vehicule' => $type_vehicule]);
        } else {
            return redirect('/login');
        }
    }

    public function insertTypeVehicule(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(), [
            'labelTypeVehicule' => 'required',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('error', 'Veuillez remplir les champs');
            return redirect('/content_typeVehicule');
        } else {
            $id_TypeVehicule = uniqid();
            $labelTypeVehicule = request('labelTypeVehicule');

            $values = array('idtype_vehicule' => $id_TypeVehicule, 'labelTypeVehicule' => $labelTypeVehicule);
            DB::beginTransaction();
            try {
                DB::table('type_vehicule')->insert($values);
                DB::commit();
                $request->session()->flash('succes', 'Les informations ont été bien enregistré');
                return redirect('/content_typeVehicule');
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                $request->session()->flash('error', 'Les informations pas enregistré');
                return redirect('/content_typeVehicule');
            }
        }
    }

    public function recupTypeVehicule(Request $request)
    {
        $idVehicule = request('idVehicule');
        # code...
        $type_vehicule = DB::table('view_traitement')->where([
            ['idtype_vehicule', $idVehicule],
        ])->get();
        return response()->json($type_vehicule);
    }
}
