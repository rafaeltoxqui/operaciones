<template>
<div>
	<div class="heigtModal">
	<div class="modal-body">
	<div class="alert alert-warning" id="ocultoModal"><center> Warning: the PDV name can't be empty! </center></div>
	  <form>
	  <div class="row">
	  	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

	  		<div class="form-group">
	  			<label>*PDV: </label>
	  			<input class="form-control" name="tienda" v-model="Pdv">
	  		</div>

	  		<div class="form-group">
	  			<label>*Region: </label>
	  			<select class="form-control" v-model="Region">
	  				<option disabled value="">{{firstOpt.Region}}</option>
	  				<option v-for="region in regions" v-bind:value="region.id">
	  					{{region.name}}
	  				</option>
	  			</select>
	  		</div>

	  		<div class="form-group">
	  			<label>*Subregion: </label>
	  			<select class="form-control" v-model="Subregion">
	  				<option disabled value="">{{firstOpt.Subregion}}</option>
	  				<option v-for="subregion in subregions" v-bind:value="subregion.id">
	  					{{subregion.name}}
	  				</option>
	  			</select>
	  		</div>

	  		<div class="form-group">
	  			<label>*Plaza: </label>
	  			<select class="form-control" v-model="Plaza">
	  				<option disabled value="">{{firstOpt.Plaza}}</option>
	  				<option v-for="plaza in plazas" v-bind:value="plaza.id">
	  					{{plaza.name}}
	  				</option>
	  			</select>
	  		</div>

	  		<div class="form-group">
	  			<label>*No. Q: </label>
	  			<input type="text" class="form-control" name="noq" v-model.trim="Noq">
	  		</div>

	  	</div>
	  	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

	  		<div class="form-group">
	  			<label>*Estatus Contrato: </label>
	  			<select class="form-control" v-model="estatuscontrato">
	  				<option disabled value="">{{firstOpt.FirmaContrato}}</option>
	  				<option v-for="contrato in estauscontratofirmado" v-bind:value="contrato.id">
	  					{{contrato.status}}
	  				</option>
	  			</select>
	  		</div>

	  		<div class="form-group">
	  			<label>*Estatus Adquisicion: </label>
	  			<select class="form-control" v-model="estatusadquisicion">
	  				<option disabled value="">{{firstOpt.Estatus}}</option>
	  				<option v-for="adquisicion in estadquisicion" v-bind:value="adquisicion.id">
	  					{{adquisicion.status}}
	  				</option>
	  			</select>
	  		</div>

	  		<br>
	  		<hr>
	  		<div class="form-group">
	  			<label>*Comentario: </label>
	  			<textarea class="form-control" id="Textarea1" rows="6" v-model.trim="comentario"></textarea>
	  			<h6><span class="small">"PDV Modification" is the default comment if you do not post a comment.</span></h6>
	  		</div>

	  	</div>
	  </div>
	  </form>
	</div>
	</div>
	<div class="modal-footer">
	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	  <button type="button" class="btn btn-primary" v-on:click="sendPdvUpdate()">Save changes</button>
	</div>
</div>
</template>
<script>
	export default{
		data(){
			return {
				firstOpt : [],
				Pdv : '',
				Region: '',
				Subregion: '',
				Plaza: '',
				Noq: 2,
				estatuscontrato: '',
				estatusadquisicion: '',
				comentario: '',
				regions : [],
				subregions: [],
				plazas: [],
				estauscontratofirmado : [],
				estadquisicion: [],
			};
		},
		mounted(){
			this.fillFields();
			this.getPdv();
		},
		methods :{
			getPdv(){
				var idPdv = $('#id').val();
				axios.get('/pdv/getpdv/'+idPdv).then((response) => {
					this.firstOpt = response.data[0];
					this.Pdv = this.firstOpt.PDV;
				});
				this.Noq = 2;
				this.comentario = 'PDV Modification';
			},
			fillFields(){
				axios.get('/region/getregions').then((response) => {
					this.regions = response.data;
				});
				axios.get('/subregion/getsubregions').then((response) => {
					this.subregions = response.data;
				});
				axios.get('/plaza/getplazas').then((response) => {
					this.plazas = response.data;
				});
				axios.get('/statuscontrato/getstatuscontrato').then((response) => {
					this.estauscontratofirmado = response.data;
				});
				axios.get('/status/getStatus').then((response) => {
					this.estadquisicion = response.data;
				});
			},
			sendPdvUpdate(){
				if(this.Region === ''){
					this.Region = this.firstOpt.idRegion;
				}
				if(this.Subregion === ''){
					this.Subregion = this.firstOpt.idSubregion;
				}
				if(this.Plaza === ''){
					this.Plaza = this.firstOpt.idPlaza;
				}
				if(this.estatuscontrato === ''){
					this.estatuscontrato = this.firstOpt.idFirmaContrato;
				}
				if(this.estatusadquisicion === ''){
					this.estatusadquisicion = this.firstOpt.idEstatus;
				}
				var idPdv = this.firstOpt.id;
				var idTiendaPdv = this.firstOpt.idTienda;
				if(this.Pdv === ''){
					$('#ocultoModal').fadeIn(1500,function(){
						$('#ocultoModal').fadeOut(2500);
					});
				}else{
					axios.put('/pdv/update',{
						id:idPdv,idTienda:idTiendaPdv,idRegion:this.Region,idSubregion:this.Subregion,idPlaza:this.Plaza,
						idStatusAdquisicion:this.estatusadquisicion,idStatusContrato:this.estatuscontrato
						}).then((response) => {
					}).catch(function(error){
						//console.log(error.response;
					});
					axios.put('/tienda/update',{id:idTiendaPdv,Name:this.Pdv}).then((response) => {
						//console.log(response.data);
					});
					if(this.comentario === ''){
						this.comentario = "PDV Modification";
					}
					axios.post('/comment',{idPdv:idPdv, comment:this.comentario}).then((response) => {
						//console.log(response.data);
					});
					this.getPdv();
					$('#exampleModalCenter').modal('hide');
					this.$emit('updateYou');
				}
			},
		},
	}
</script>