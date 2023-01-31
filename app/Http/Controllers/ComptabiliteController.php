<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;



class ComptabiliteController extends Controller
{
    //

    public function ShowComptabilite()
    {
        $traitement = DB::table('view_traitement')->get();
        $type_vehicule = DB::table('type_vehicule')->get();
        $prestations = DB::table('view_prestation')->get();
        $employe = DB::table('employe')
            ->where('idtype_employe', 'emp002')
            ->get();
        return view('Template/content_comptabilite', compact('traitement', 'type_vehicule', 'employe', 'prestations'));
    }
    public function insertPrestation(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(), [
            'nomClient' => 'required',
            'prenomClient' => 'required',
            'telClient' => 'required',
            'immaClient' => 'required',
            'typeVehiculeClient' => 'required',
            'traitementClient' => 'required',
            'montantPresClient' => 'required',
            'laveurClient' => 'required',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('error', 'Veuillez remplir les champs');
            return redirect('/content');
        } else {
            $date = date('d/M/Y H:i:s');
            $id_client = uniqid();
            $id_ticket = uniqid();
            $id_vehicule = uniqid();
            $nomClient = request('nomClient');
            $prenomClient = request('prenomClient');
            $telClient = request('telClient');
            $immaClient = request('immaClient');
            $typeVehiculeClient = request('typeVehiculeClient');
            $traitementClient = request('traitementClient');
            $montantPresClient = request('montantPresClient');
            $laveurClient = request('laveurClient');


            $client = array(
                'idclient' => $id_client,
                'NomClient' => $nomClient,
                'PrenomClient' => $prenomClient,
                'TelephoneClient' => $telClient
            );

            $vehivule = array(
                'idvehicule' => $id_vehicule,
                'ImmatriculeVehicule' => $immaClient
            );
            $tickets = array(
                'idticket' => $id_ticket,
                'MontantTicket' => $montantPresClient,
                'NombreTraitement' => NULL,
                'idvehicule' => $id_vehicule,
                'idemploye' => $laveurClient,
                'idtraitement' => $traitementClient,
                'idtype_vehicule' => $typeVehiculeClient,
                'idclient' => $id_client,
                'dateticket' => $date
            );

            DB::table('client')->insert($client);
            DB::commit();

            DB::table('vehicule')->insert($vehivule);
            DB::commit();

            DB::beginTransaction();
            try {
                DB::table('ticket')->insert($tickets);
                DB::commit();
                $request->session()->flash('succes', 'Les informations ont été bien enregistré');
                return redirect('/content');
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                $request->session()->flash('error', 'Les informations pas enregistré');
                return redirect('/content');
            }
        }
    }
    public function recupMontant(Request $resquest)
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
}
