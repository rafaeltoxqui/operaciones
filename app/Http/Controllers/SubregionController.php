<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subregion as Subregion;

class SubregionController extends Controller
{
    public function getAllSubregionsJ(){
    	$listSubregiones = Subregion::get(['id','name']);
    	return $listSubregiones;
    }
}
