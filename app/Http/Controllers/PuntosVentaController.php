<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuntosVentaController extends Controller
{
    public function showGridView(){
    	return view('exp_operaciones/puntosVenta');
    }

    public function pdvData(){
    	$responseList = array('id' => 1, 'dato1'=>'prueba','dato2'=>'prueba','dato3'=>'prueba','dato4'=>'prueba','dato5'=>'prueba');
    	$responseList2= array('id' => 2, 'dato1'=>'prueba2','dato2'=>'prueba2','dato3'=>'prueba2','dato4'=>'prueba2','dato5'=>'prueba2');
    	$responseList3= array('id' => 3, 'dato1'=>'prueba3','dato2'=>'prueba3','dato3'=>'prueba3','dato4'=>'prueba3','dato5'=>'prueba3');
    	$listados = array('1'=>$responseList, '2'=>$responseList2, '3'=>$responseList3);
    	return json_encode($listados);
    }
}
