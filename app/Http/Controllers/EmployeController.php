<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;


class EmployeController extends Controller
{
    //

    public function ShowEmploye()
    {
        if (session()->exists(['valueUser', 'privilege'])) {

            $Employes = DB::table('view_employe')->get();
            $Pieces = DB::table('piece')->get();
            $typeEmployes = DB::table('type_employe')->get();
            # code...
            return view('Template/content_employe', compact('Employes', 'Pieces', 'typeEmployes'));
        } else {
            return redirect('/login');
        }
    }

    public function insertEmploye(Request $request)
    {
        $typeEmployesfirst = DB::table('type_employe')->get()->first();
        $privilege = DB::table('privilege')->get()->last();

        # code...
        $validator = Validator::make($request->all(), [
            'NomEmploye' => 'required',
            'PrenomEmploye' => 'required',
            'piece' => 'required',
            'NumeroPieceEmploye' => 'required',
            'TelephoneEmploye' => 'required',
            'post' => 'required',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('error', 'Veuillez remplir les champs');
            return redirect('/content_employe');
        } else {
            $id_employe = uniqid();
            $NomEmploye = request('NomEmploye');
            $PrenomEmploye = request('PrenomEmploye');
            $NumeroPieceEmploye = request('NumeroPieceEmploye');
            $TelephoneEmploye = request('TelephoneEmploye');
            $post = request('post');
            $piece = request('piece');

            $values = array('idemploye' => $id_employe, 'NomEmploye' => $NomEmploye, 'PrenomEmploye' => $PrenomEmploye, 'PieceEmploye' => $NumeroPieceEmploye, 'TelephoneEmploye' => $TelephoneEmploye, 'idPiece' => $piece, 'idtype_employe' => $post);
            if ($post == $typeEmployesfirst->idtype_employe) {
                $id_users = uniqid();
                $password = substr($NomEmploye, 0, 2);
                $password = $password . '' . rand(3, 100);
                $user = array(
                    'idusers' => $id_users,
                    'username' => $NomEmploye,
                    'password' => $password,
                    'idprivilege' => $privilege->idprivilege,
                );
                DB::table('users')->insert($user);
            } else {
                $request->session()->flash('error', 'Ce poste ne peut pas effectuer des saisis');
                return redirect('/content_employe');
            }
            DB::beginTransaction();
            try {
                DB::table('employe')->insert($values);
                DB::commit();
                $request->session()->flash('succes', 'Les informations ont été bien enregistré');
                return redirect('/content_employe');
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                $request->session()->flash('error', 'Les informations pas enregistré');
                return redirect('/content_employe');
            }
        }
    }
}
