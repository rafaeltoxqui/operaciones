<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pdv as PDV;

class PuntoVentaController extends Controller
{
    public function showGridView(){
    	return view('exp_operaciones/puntosVenta');
    }

    public function pdvData(){
        $puntosVenta = \DB::table('pdvs')
        ->select('pdvs.id as id','regions.name as Region','subregions.name as Subregion','plazas.name as Plaza','tiendas.name as PDV','pdv_status_adquisicions.status as Estatus','pdv_status_contratos.status as FirmaContrato','pdv_comments.comment as Comentario')
        ->join('pdv_comments', 'pdvs.id_pdv_comment', '=', 'pdv_comments.id')
        ->join('pdv_status_adquisicions', 'pdvs.id_pdv_status_adquisicion', '=', 'pdv_status_adquisicions.id')
        ->join('pdv_status_contratos', 'pdvs.id_pdv_status_contrato', '=', 'pdv_status_contratos.id')
        ->join('plazas', 'pdvs.id_plaza', '=', 'plazas.id')
        ->join('regions', 'pdvs.id_region', '=', 'regions.id')
        ->join('subregions', 'pdvs.id_subregion', '=', 'subregions.id')
        ->join('tiendas', 'pdvs.id_tienda', '=', 'tiendas.id')
        ->OrderBy('pdvs.id')
        ->get();
        $arrayPDV = array();
        foreach($puntosVenta as $row){
            $arraytemp = array('id' => $row->id, 'estimadoApertura' => 2, 'No.Q' => 3, 'mesApertura' => 'Agosto', 'region' => $row->Region, 'subRegion' => $row->Subregion, 'plaza' => $row->Plaza, 'pdvSugerido' => 'Expert Cell', 'pdv' => $row->PDV, 'estatus' => $row->Estatus, 'firma' => $row->FirmaContrato, 'comentario' => $row->Comentario);
            array_push($arrayPDV, $arraytemp);
        }
    	return json_encode($arrayPDV);
    }

    public function updateStatusPDV(Request $request){
        $pdv = PDV::find($request->id);
        $pdv->id_pdv_status_adquisicion = $request->estatus;
        $pdv->save();
        return json_encode(['EXITO']);

    }



}
