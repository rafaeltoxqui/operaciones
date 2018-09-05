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
}
