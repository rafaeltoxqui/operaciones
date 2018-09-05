<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plaza as Plaza;

class PlazaController extends Controller
{
    public function getAllPlazasJ(){
    	$listPlazas = Plaza::get(['id','name']);
    	return $listPlazas;
    }
}
