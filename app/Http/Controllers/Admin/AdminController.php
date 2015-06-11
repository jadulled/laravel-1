<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller{

    function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        return view('backend.index');
    }


} 