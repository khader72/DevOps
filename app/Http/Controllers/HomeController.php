<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
      {

      } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $value = session('valueUser');
        if ($value == NULL) {
            return view('login');
        } else {
            $si = $this->getNombreSi();
            $avi = $this->getNombreAviso();
            $en = $this->getNombreEnergie();
            $ri = $this->getNombreRi();
            $dataAll = DB::table('v_host')->get();
            return view('homeSupervision', compact('value', 'dataAll', 'si', 'avi', 'en', 'ri'));
        }
    }

    public function ShowSearch()
    {

        $value = session('valueUser');
        if ($value == NULL) {
            return view('login');
        } else {
            $si = $this->getNombreSi();
            $avi = $this->getNombreAviso();
            $en = $this->getNombreEnergie();
            $ri = $this->getNombreRi();
            $dataAll = DB::table('v_host')->get();
            return view('recherche', compact('value', 'dataAll', 'si', 'avi', 'en', 'ri'));
        }
    }

    public function ShowHome()
    {
        $value = session('valueUser');

        $si = $this->getNombreSi();
        $avi = $this->getNombreAviso();
        $en = $this->getNombreEnergie();
        $ri = $this->getNombreRi();
        $dataAll = DB::table('v_host')->get();
        return view('homeSupervision', compact('value', 'dataAll', 'si', 'avi', 'en', 'ri'));
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
}
