<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogArtificialController extends Controller
{
    public function index()
    {
        return view('catalog.catalog_artificial'); 
    }

}