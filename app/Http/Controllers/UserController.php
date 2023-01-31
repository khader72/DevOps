<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    //

    public function ShowUser()
    {
        $value = session('valueUser');
        if ($value == NULL) {
            return view('login');
        } else {
            $userAll = DB::table('user')->get();
            $privilegeAll = DB::table('privilege')->get();

            return view('user', compact('userAll', 'privilegeAll'));
        }
    }

    public function insertUser(Request $request)
    {
        $statusOK = 0;
        $statusKO = 1;
        $statusFormKO = 2;

        # code...
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'user' => 'required',
            'passuser' => 'required',
            'privilege' => 'required',
        ]);

        if ($validator->fails()) {
            return $statusFormKO;
        } else {
            $date = date('Y-m-d');
            $status = 'Y';

            //$heure = date('H:i:s');
            //$statut = 's001';

            $id_user = uniqid();
            $nom = $request->input('nom');
            $prenom = $request->input('prenom');
            $user = $request->input('user');
            $pass = $request->input('passuser');
            $privilege = $request->input('privilege');
            //$pass_hash = password_hash($pass, PASSWORD_DEFAULT);
            $pass_hash = md5($pass);
            //   $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
            /*if (password_verify($pass, $pass_hash))
{
  echo "Mot de passe correct";
}
*/
            $user = array(
                'id_user' => $id_user,
                'nom' => $nom,
                'prenom' => $prenom,
                'user' => $user,
                'password' => $pass_hash,
                'last_connect' => $date,
                'status' => $status,
                'creation_date' => $date,
                'id_privilege' => $privilege
            );

            DB::beginTransaction();
            try {
                DB::table('user')->insert($user);
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

    public function updateUser(Request $request)
    {
        $statusOK = 0;
        $statusKO = 1;
        $statusFormKO = 2;

        # code...
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nom' => 'required',
            'prenom' => 'required'
        ]);

        if ($validator->fails()) {
            return $statusFormKO;
        } else {

            $id = $request->input('id');
            $nom = $request->input('nom');
            $prenom = $request->input('prenom');
            $user = $request->input('user');

            $service = array(
                'id_user' => $id,
                'nom' => $nom,
                'prenom' => $prenom
            );


            DB::beginTransaction();
            try {
                DB::table('user')->where('id_user', $id)
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

    public function deleteUser(Request $request)
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
                DB::table('user')->where('id_user', $id)
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
