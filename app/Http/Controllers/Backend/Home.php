<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendController;
use App\Models\User;

class Home extends BackendController
{
    public function __construct()
    {
        Parent::__construct();
    }


    public function index()
    {
        return view('back-end.home'); 
    }
}
