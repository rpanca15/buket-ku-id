<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile'); // Pastikan Anda memiliki file profile.blade.php di folder views
    }
}