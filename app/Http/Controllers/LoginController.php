<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
use Request as GlobalRequest;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    //
    public function ShowLogin()
    {
        //$users = DB::table('view_user')->get();
        //$privilege = DB::table('privilege')->get();
        # code...users
        return view('login');
        //, compact('users', 'privilege'));
    }

    public function CheckConnexion(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        // var_dump($validator);
        if ($validator->fails()) {
            // $request->session()->flash('error', 'Veuillez saisi des informations');
            return redirect('/login');
        } else {

            $ip = $request->ip();
            $username = $request->input('username');
            $password = $request->input('password');
            $password = md5($password);

            //Fonction History
            $this->InsertHistory($username, $ip);

            $usersData = DB::table('v_user')->where([
                ['user', $username],
                ['password', $password]
            ])->get();
            //var_dump(sizeof($usersData));
            //  die();
            if (sizeof($usersData) > 0) {
                $dataAll = DB::table('v_host')->get();
                $si = $this->getNombreSi();
                $avi = $this->getNombreAviso();
                $en = $this->getNombreEnergie();
                $ri = $this->getNombreRi();
                $user = DB::table('v_user')->get();
                $privilege = DB::table('privilege')->get();
                $admin = $privilege[0]->lib_privilege;
                $simple = $privilege[1]->lib_privilege;
                $privileges = $usersData[0]->lib_privilege;
                if ($usersData[0]->lib_privilege == $simple) {
                    session()->put('Simple', $usersData);
                    session()->put('valueUser', $usersData);
                    session()->put('privileges', $privileges);
                    $value = session('Simple');
                } else {
                    session()->put('Admin', $usersData);
                    session()->put('valueUser', $usersData);
                    session()->put('privileges', $privileges);
                    $value = session('Admin');
                }
                return view('homeSupervision', compact('dataAll', 'si', 'avi', 'en', 'ri', 'value', 'privileges'));
            } else {
                return redirect('/login');
            }

            // $privilege = DB::table('privilege')->get()->last();
            // session()->put('privilege', $privilege);
            //ssession()->put('valueUser', $usersData);
            //$p = session()->get('valueUser')[0]->idprivilege;
            //var_dump($p);

            // } else {
            //    return view('/login', compact('user', 'privilege'));
            // }


        }
    }

    private function InsertHistory($login, $ip)
    {
        $id_hist = uniqid();
        $ip = $ip;
        $login = $login;
        $date = date('Y-m-d H:i:s');
        $hist = array(
            'id_hist' => $id_hist,
            'login' => $login,
            'last_connect' => $date,
            'ip_connect' => $ip
        );
        DB::beginTransaction();
        try {
            DB::table('history_connect')->insert($hist);
            DB::commit();
            //$request->session()->flash('succes', 'Les informations ont été bien enregistré');

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            //$request->session()->flash('error', 'Les informations pas enregistrés');

        }
    }

    public function getNombreSi()
    {
        $s = 1;
        $Nbresi = DB::table('v_host')
            ->where('id_type', $s)
            ->count();
        return $Nbresi;
    }

    public function getNombreAviso()
    {
        $s = 2;
        $Nbresi = DB::table('v_host')
            ->where('id_type', $s)
            ->count();
        return $Nbresi;
    }

    public function getNombreEnergie()
    {
        $s = 3;
        $Nbresi = DB::table('v_host')
            ->where('id_type', $s)
            ->count();
        return $Nbresi;
    }

    public function getNombreRi()
    {
        $s = 4;
        $Nbresi = DB::table('v_host')
            ->where('id_type', $s)
            ->count();
        return $Nbresi;
    }
    public function destroy(Request $request)
    {
        /*$session = $request->input('session');
        session()->forget('session');*/
        $data = session()->all();
        foreach ($data as $d) {
            $o = $d['user'];
        }

        var_dump($o);
        die();

        session()->flush();
        return redirect('/login');
    }
}
