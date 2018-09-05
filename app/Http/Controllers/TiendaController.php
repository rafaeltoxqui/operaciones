<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tienda as Tienda;

class TiendaController extends Controller
{
    public function getAllStoresJ(){
    	$listTiendas = Tienda::get(['id','name']);
    	return $listTiendas;
    }

    public function update(Request $request){
    	$tienda = Tienda::find($request->id);
    	$tienda->name = $request->Name;
    	$tienda->save();
    	return json_encode(['EXITO']);

    }
}
