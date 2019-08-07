<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendController;

class Home extends BackendController
{
    public function index()
    {
        return view('back-end.home'); 
    }
}
