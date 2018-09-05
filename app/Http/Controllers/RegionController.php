<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region as Region;

class RegionController extends Controller
{
    public function getAllRegionsJ(){
    	$listRegiones = Region::get(['id','name']);
    	return $listRegiones;
    }
}
