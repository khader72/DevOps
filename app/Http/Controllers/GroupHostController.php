<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;



class GroupHostController extends Controller
{
    //

    public function ShowGroupHost()
    {
        $value = session('valueUser');
        if ($value == NULL) {
            return view('login');
        } else {

            return view('grouphost');
        }
    }
}
