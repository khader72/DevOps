<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{

    //

    public function ShowService()
    {
        $value = session('valueUser');
        if ($value == NULL) {
            return view('login');
        } else {
            $serviceAll = DB::table('service')->get();
            return view('service', compact('serviceAll'));
        }
    }

    public function insertService(Request $request)
    {
        $statusOK = 0;
        $statusKO = 1;
        $statusFormKO = 2;

        # code...
        $validator = Validator::make($request->all(), [
            'nomservice' => 'required',
            'emailservice' => 'required',
            'direction' => 'required',
        ]);

        if ($validator->fails()) {
            return $statusFormKO;
        } else {
            //  $date = date('d/m/Y');
            //$heure = date('H:i:s');
            //$statut = 's001';

            $id_service = uniqid();
            $nomservice = $request->input('nomservice');
            $emailservice = $request->input('emailservice');
            $direction = $request->input('direction');

            $service = array(
                'id_service' => $id_service,
                'libelle_service' => $nomservice,
                'email_service' => $emailservice,
                'dept_service' => $direction
            );

            DB::beginTransaction();
            try {
                DB::table('service')->insert($service);
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

    public function updateService(Request $request)
    {
        $statusOK = 0;
        $statusKO = 1;
        $statusFormKO = 2;

        # code...
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nomservice' => 'required',
            'emailservice' => 'required',
            'direction' => 'required',
        ]);

        if ($validator->fails()) {
            return $statusFormKO;
        } else {

            $id = $request->input('id');
            $nomservice = $request->input('nomservice');
            $emailservice = $request->input('emailservice');
            $direction = $request->input('direction');

            $service = array(
                'id_service' => $id,
                'libelle_service' => $nomservice,
                'email_service' => $emailservice,
                'dept_service' => $direction
            );


            DB::beginTransaction();
            try {
                DB::table('service')->where('id_service', $id)
                    ->update($service);
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

    public function deleteService(Request $request)
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
                DB::table('service')->where('id_service', $id)
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
