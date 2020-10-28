<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Formats\UserFormat;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }
}
