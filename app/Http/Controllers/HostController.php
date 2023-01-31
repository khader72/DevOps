<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HostController extends Controller
{

    //

    public function ShowHost()
    {

        //Get all data host
        $value = session('valueUser');
        if ($value == NULL) {
            return view('login');
        } else {
            $hostAll = DB::table('host')->get();
            $equipementAll = DB::table('equipement')->get();
            $serviceAll = DB::table('service')->get();
            $typeAll = DB::table('type')->get();
            $privileges = session('privileges');

            return view('host', compact('hostAll', 'equipementAll', 'serviceAll', 'typeAll', 'privileges'));
        }
    }

    public function insertHost(Request $request)
    {
        $statusOK = 0;
        $statusKO = 1;
        $statusFormKO = 2;

        # code...
        $validator = Validator::make($request->all(), [
            'hostname' => 'required',
            'adresse_ip' => 'required',
            'equipement' => 'required',
            'descriptions' => 'required',
            'service' => 'required',
            'types' => 'required',
        ]);

        if ($validator->fails()) {

            return $statusFormKO;
        } else {
            //  $date = date('d/m/Y');
            //$heure = date('H:i:s');
            //$statut = 's001';

            $id_host = uniqid();
            $hostname = $request->input('hostname');
            $adresse_ip = $request->input('adresse_ip');
            $equipement = $request->input('equipement');
            $description = $request->input('descriptions');
            $service = $request->input('service');
            $type = $request->input('types');

            $host = array(
                'id_host' => $id_host,
                'hostname' => $hostname,
                'adresse_ip' => $adresse_ip,
                'description' => $description,
                'id_equipement' => $equipement,
                'id_service' => $service,
                'id_type' => $type
            );

            DB::beginTransaction();
            try {
                DB::table('host')->insert($host);
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

    public function updateHost(Request $request)
    {
        $statusOK = 0;
        $statusKO = 1;
        $statusFormKO = 2;

        # code...
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'hostname' => 'required',
            'adresse_ip' => 'required',
            'equipement' => 'required',
            'description' => 'required',
            'service' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return $statusFormKO;
        } else {


            //  $date = date('d/m/Y');
            //$heure = date('H:i:s');
            //$statut = 's001';
            $id = $request->input('id');
            $hostname = $request->input('hostname');
            $adresse_ip = $request->input('adresse_ip');
            $equipement = $request->input('equipement');
            $description = $request->input('description');
            $service = $request->input('service');
            $type = $request->input('type');

            $host = array(
                'hostname' => $hostname,
                'adresse_ip' => $adresse_ip,
                'description' => $description,
                'id_equipement' => $equipement,
                'id_service' => $service,
                'id_type' => $type
            );


            DB::beginTransaction();
            try {
                DB::table('host')->where('id_host', $id)
                    ->update($host);
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

    public function deleteHost(Request $request)
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
                DB::table('host')->where('id_host', $id)
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
