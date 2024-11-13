<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return view('catalog'); // Pastikan nama file adalah catalog.blade.php
    }
}