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
        //funciona solo con el pdvTable - no el paginador
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

    public function show(Request $request){
        return view('exp_operaciones/PuntoVenta', array('id'=>$request->id));
    }

    public function getPdvJ(Request $request){
        //Funciona para traer los datos de solo un pdv(para la segunda vista)
        $puntoVenta = \DB::table('pdvs')
        ->select('pdvs.id as id', 'tiendas.name as PDV','regions.name as Region','subregions.name as Subregion','plazas.name as Plaza','pdv_status_adquisicions.status as Estatus','pdv_status_contratos.status as FirmaContrato','pdvs.id_tienda as idTienda','pdvs.id_region as idRegion','pdvs.id_subregion as idSubregion', 'pdvs.id_plaza as idPlaza', 'pdvs.id_pdv_status_adquisicion as idEstatus', 'pdvs.id_pdv_status_contrato as idFirmaContrato')
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

    public function getAllPdvPagesJ(){
        //funciona con el componente de PdvtablePaginator
        $puntosVenta = \DB::table('pdvs')
        ->select('pdvs.id as id','tiendas.name as PDV','regions.name as Region','subregions.name as Subregion','plazas.name as Plaza','pdv_status_adquisicions.status as Estatus','pdv_status_contratos.status as FirmaContrato')
        ->join('pdv_status_adquisicions', 'pdvs.id_pdv_status_adquisicion', '=', 'pdv_status_adquisicions.id')
        ->join('pdv_status_contratos', 'pdvs.id_pdv_status_contrato', '=', 'pdv_status_contratos.id')
        ->join('plazas', 'pdvs.id_plaza', '=', 'plazas.id')
        ->join('regions', 'pdvs.id_region', '=', 'regions.id')
        ->join('subregions', 'pdvs.id_subregion', '=', 'subregions.id')
        ->join('tiendas', 'pdvs.id_tienda', '=', 'tiendas.id')
        ->OrderBy('pdvs.id')
        ->paginate(7);
        return response()->json($puntosVenta);
    }


/*METODOS PARA LAS BUSQUEDAS */
    public function searchByStoreNameJ(Request $request){
        $returnValue = NULL;
        if($request->search != ''){
            $foundList = \DB::table('pdvs')
            ->select('pdvs.id as id','tiendas.name as PDV','regions.name as Region','subregions.name as Subregion','plazas.name as Plaza','pdv_status_adquisicions.status as Estatus','pdv_status_contratos.status as FirmaContrato')
            ->join('tiendas', 'pdvs.id_tienda', '=', 'tiendas.id')
            ->join('regions', 'pdvs.id_region', '=', 'regions.id')
            ->join('subregions','pdvs.id_subregion', '=', 'subregions.id')
            ->join('plazas','pdvs.id_plaza', '=', 'plazas.id')
            ->join('pdv_status_adquisicions','pdvs.id_pdv_status_adquisicion', '=', 'pdv_status_adquisicions.id')
            ->join('pdv_status_contratos', 'pdvs.id_pdv_status_contrato', '=', 'pdv_status_contratos.id')
            ->where('tiendas.name', 'LIKE', "%{$request->search}%")
            ->OrderBy('pdvs.id')
            ->paginate(7);
            if(!empty($foundList)){
                $returnValue = $foundList;
            }else{
                $returnValue = json_encode(['mensaje' => "Ningun registro Encontrado"]);
            }
        }else{
            $returnValue = json_encode(["mensaje"=>"Criterio De Busqueda Vacio"]);
        }
        return $returnValue;
    }




}
