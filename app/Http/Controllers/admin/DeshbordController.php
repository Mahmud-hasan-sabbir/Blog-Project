<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeshbordController extends Controller
{
    public function dashboard()
    {
        return view('admin.deshbord.deshbord');
    }
}
