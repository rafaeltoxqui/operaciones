<template>
<div>
	<div class="row">
		<div class="col-md-12 col-lg-12">
		<div class="returnToPdvs"><button class="btn btn-default btnToPdvs" type="button" data-toggle="tooltip" data-placement="bottom" title="back to pdvs list" v-on:click="returnToPdvs()"></button></div>
			<div class="jumbotron">
				<div class="alert alert-success" id="oculto" role="alert"><center>¡successful edition!</center></div>
				<div class="row">
					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><h1 class="display-4">{{pdv.PDV}}</h1></div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" ><i class="fa fa-edit" id="rightAlign" style="font-size:22px;" data-toggle="tooltip" data-placement="bottom" title="Edition Mode" v-on:click="pdvModalUpdate()"></i></div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><h5> Id: <span class="small" id="textstyle">{{pdv.id}} </span></h5></div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><h5> Region: <span class="small" id="textstyle">{{pdv.Region}} </span></h5></div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><h5> Subregion: <span class="small" id="textstyle">{{pdv.Subregion}} </span></h5></div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><h5> Plaza: <span class="small" id="textstyle">{{pdv.Plaza}} </span></h5></div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><h5> Estatus contrato: <span class="small" id="textstyle">{{pdv.FirmaContrato}} </span></h5></div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><h5> Estatus adquisicion: <span class="small" id="textstyle">{{pdv.Estatus}} </span></h5></div>
				</div>
				<hr class="my-4">
				<p>COMENTARIOS:</p>
				<comment-get :id="commentid"></comment-get>
			</div>
		</div>
	</div>
<!--Modal -->
	<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" 	aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle"> EDITION MODE </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      
	      <pdv-update v-on:updateYou="getPdv()"></pdv-update>

	    </div>
	  </div>
	</div>
<!-- End Modal -->
</div>
</template>
<script>
	export default{
		data(){
			return {
				pdv : [],
				commentid : '',
			};
		},
		methods : {
			getPdv(){
				var id = $('#id').val();
				axios.get('/pdv/getpdv/'+id).then((response) => {
					this.pdv = response.data[0];
					this.commentid = String(this.pdv['Comment']);
				});
				$('#oculto').fadeIn(1500,function(){
					$('#oculto').fadeOut(2000);
				});
			},
			pdvModalUpdate(){
				$('#exampleModalCenter').modal('show');
			},
			returnToPdvs(){
				var url = "/pdvs";
				window.location.href = url;
			}
		},
		created() {
			this.getPdv();
			$(function () {  $('[data-toggle="tooltip"]').tooltip()});//Inicializa tooltip
    	},

	}
</script>