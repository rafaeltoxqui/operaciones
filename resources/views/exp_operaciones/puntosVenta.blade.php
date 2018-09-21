@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<pdvs-filter></pdvs-filter>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 TitleGrid"><p><h4>PUNTOS DE VENTA</h4></p></div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<input type="search" name="search" id="search" class="form-control" placeholder="Search..."><pdv-search></pdv-search>
			</div>
		</div>
		<pdv-pagination></pdv-pagination>
	</div>
@endsection