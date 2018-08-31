<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuntosVentaController extends Controller
{
    public function showGridView(){
    	return view('exp_operaciones/puntosVenta');
    }

    public function pdvData(){
    	$responseList = array(
            'id' => 1, 'dato1' => 'Junio', 'dato26' => 2, 'dato3' => 6, 'dato4' => 'Centro', 'dato5' => 'Mexico', 'dato6' => 'cd. Mexico', 'dato7' => 'Expert Cell', 'dato8' => 'Exp Multi Plaza Coacalco', 'dato9' => 'Autizada', 'dato10' => 'Formado', 'dato11' => 'Operando');

    	$responseList2= array('id' => 2, 'dato1' => 'Julio','dato2'=>2,'dato3'=>6,'dato4'=>'Centro','dato5'=>'Mexico', 'dato6'=>'cd. Mexico', 'dato7'=>'Expert Cell', 'dato8'=> 'Exp Plaza Shopping', 'dato9'=>'Autizada', 'dato10'=>'Formado', 'dato11'=>'Operando');
    	$responseList3= array('id' => 3, 'dato1'=>'Agosto','dato2'=>3,'dato3'=>11,'dato4'=>'Centro','dato5'=>'Mexico', 'dato6'=>'cd. Mexico', 'dato7'=>'Expert Cell', 'dato8'=> 'Ex Cuautepec', 'dato9'=>'Autizada', 'dato10'=>'Formado', 'dato11'=>'Operando');
    	$listados = array('1'=>$responseList, '2'=>$responseList2, '3'=>$responseList3);
    	return json_encode($listados);
    }
}
