<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class UserCreate extends Controller
{
    //
    private $login = 'dikal';
    private $password = '1234';

    public function Create()
    {
        # code...
        return view('create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/create');
        } else {
            $user = request('login');
            $pass = request('password');
            if ($user == $this->login && $pass == $this->password) {
                return redirect('/info');
            } else {
                return 'error';
            }

            //return view('info', ['login' => $login, 'password' => $password]);
        }
    }
}
