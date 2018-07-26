<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    public function __construct()
    {


        $this->middleware('auth:admin')->except("login",'reg');
//
        $this->middleware('auth', [
            'except' => ['login','reg'],
        ]);

        $this->middleware("guest:admin")->only('login');

    }
}
