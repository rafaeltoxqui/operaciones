<template>
<div>
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="jumbotron">
				<div class="row">
					<div class="col-xs-11 col-ms-11 col-md-11 col-lg-11"><h1 class="display-4">{{pdv.PDV}}</h1></div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" id="rightAlign"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Edit/Update" v-on:click="pdvModalUpdate()"><span class="glyphicon glyphicon-pencil"></span></button></div>
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
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" 	aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">EDITION MODE</h5>
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
					this.commentid = this.pdv['Comment'];
				});
			},
			pdvModalUpdate(){
				$('#exampleModalCenter').modal('show');
			}
		},
		created() {
			this.getPdv();
			$(function () {  $('[data-toggle="tooltip"]').tooltip()});//Inicializa tooltip
    	},

	}
</script>