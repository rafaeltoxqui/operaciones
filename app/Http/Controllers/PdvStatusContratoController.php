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

    public function getAllStatusContratoFilterJ(){
    	$listStatusContrato = StatusContrato::get(['id','status']);
    	$returnListStatusContrato = array();
    	foreach($listStatusContrato as $StatusContrato){
    		$arrayTmp = array('id' => $StatusContrato->id, 'name' => $StatusContrato->status);
    		array_push($returnListStatusContrato, $arrayTmp);
    	}
    	return json_encode($returnListStatusContrato);
    }
}
