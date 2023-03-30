<?php

namespace App\Http\Controllers;

use App\Models\usuaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdmUsuarios extends Controller
{
    
    public function index()
    {

        return view('admUsuarios.admUsuarios');
    }

    


}
