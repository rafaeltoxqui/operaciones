<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pdv as PDV;

class PuntoVentaController extends Controller
{
    public function index(){
    	return view('exp_operaciones/puntosVenta');
    }

    public function getAllPdvJ(){
        $puntosVenta = \DB::table('pdvs')
        ->select('pdvs.id as id', 'tiendas.name as PDV','regions.name as Region','subregions.name as Subregion','plazas.name as Plaza','pdv_status_adquisicions.status as Estatus','pdv_status_contratos.status as FirmaContrato')
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
            $arraytemp = array('id' => $row->id, 'pdv' => $row->PDV, 'estimadoApertura' => 2, 'No.Q' => 3, 'mesApertura' => 'Agosto', 'region' => $row->Region, 'subRegion' => $row->Subregion, 'plaza' => $row->Plaza, 'estatus' => $row->Estatus, 
                'firma' => $row->FirmaContrato, 'pdvSugerido' => 'Expert Cell');
            array_push($arrayPDV, $arraytemp);
        }
    	return json_encode($arrayPDV);
    }

    public function update(Request $request){
        $pdv = PDV::find($request->id);
        $pdv->id_pdv_status_adquisicion = $request->estatus;
        $pdv->save();
        return json_encode(['EXITO']);

    }

    public function getPdvJ(Request $request){
        $puntoVenta = \DB::table('pdvs')
        ->select('pdvs.id as id', 'tiendas.name as PDV','regions.name as Region','subregions.name as Subregion','plazas.name as Plaza','pdv_status_adquisicions.status as Estatus','pdv_status_contratos.status as FirmaContrato','.id_pdv_comment as Comment','pdvs.id_tienda as idTienda','pdvs.id_region as idRegion','pdvs.id_subregion as idSubregion', 'pdvs.id_plaza as idPlaza', 'pdvs.id_pdv_status_adquisicion as idEstatus', 'pdvs.id_pdv_status_contrato as idFirmaContrato')
        ->join('pdv_status_adquisicions', 'pdvs.id_pdv_status_adquisicion', '=', 'pdv_status_adquisicions.id')
        ->join('pdv_status_contratos', 'pdvs.id_pdv_status_contrato', '=', 'pdv_status_contratos.id')
        ->join('plazas', 'pdvs.id_plaza', '=', 'plazas.id')
        ->join('regions', 'pdvs.id_region', '=', 'regions.id')
        ->join('subregions', 'pdvs.id_subregion', '=', 'subregions.id')
        ->join('tiendas', 'pdvs.id_tienda', '=', 'tiendas.id')
        ->Where('pdvs.id','=',$request->id)
        ->get();
        return $puntoVenta;
    }

    public function show(Request $request){
        return view('exp_operaciones/PuntoVenta', array('id'=>$request->id));
    }

    public function updateAll(Request $request){
        $pdv = PDV::find($request->id);
        $pdv->id_region = $request->idRegion;
        $pdv->id_subregion = $request->idSubregion;
        $pdv->id_plaza = $request->idPlaza;
        $pdv->id_pdv_status_adquisicion = $request->idStatusAdquisicion;
        $pdv->id_pdv_status_contrato = $request->idStatusContrato;
        $pdv->save();
        return json_encode(['EXITO']);
    }

}
