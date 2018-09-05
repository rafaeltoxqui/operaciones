<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PdvStatusContrato as StatusContrato;

class PdvStatusContratoController extends Controller
{
    public function getAllStatusContratoJ(){
    	$listStatusContrato = StatusContrato::get(['id','status']);
    	return $listStatusContrato;
    }
}
