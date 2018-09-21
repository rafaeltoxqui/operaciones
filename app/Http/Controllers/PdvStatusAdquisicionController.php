<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PdvStatusAdquisicion as PdvStatus;

class PdvStatusAdquisicionController extends Controller
{
    public function getAllStatusJ(){
    	$listStatusAdquisition = PdvStatus::get(['id','status']);
    	return $listStatusAdquisition;
    }

    public function getAllStatusFilterJ(){
    	$listStatusAdquisition = PdvStatus::get(['id','status']);
    	$returnListStatusAdquisition = array();
    	foreach($listStatusAdquisition as $statusAdquisition){
    		$arrayTmp = array('id' => $statusAdquisition->id, 'name' => $statusAdquisition->status);
    		array_push($returnListStatusAdquisition, $arrayTmp);
    	}
    	return json_encode($returnListStatusAdquisition);
    }
}
