<template>
<div>
	<div class="heigtModal">
	<div class="modal-body">
	  <form>
	  	<div class="form-group">
	  		<label>PDV: </label>
	  		<input class="form-control" name="tienda" v-model="Pdv">
	  	</div>

	  	<div class="form-group">
	  		<label>Region: </label>
	  		<select class="form-control" v-model="Region">
	  			<option disabled value="">{{firstOpt.Region}}</option>
	  			<option v-for="region in regions" v-bind:value="region.id">
	  				{{region.name}}
	  			</option>
	  		</select>
	  	</div>

	  	<div class="form-group">
	  		<label>Subregion: </label>
	  		<select class="form-control" v-model="Subregion">
	  			<option disabled value="">{{firstOpt.Subregion}}</option>
	  			<option v-for="subregion in subregions" v-bind:value="subregion.id">
	  				{{subregion.name}}
	  			</option>
	  		</select>
	  	</div>

	  	<div class="form-group">
	  		<label>Plaza: </label>
	  		<select class="form-control" v-model="Plaza">
	  			<option disabled value="">{{firstOpt.Plaza}}</option>
	  			<option v-for="plaza in plazas" v-bind:value="plaza.id">
	  				{{plaza.name}}
	  			</option>
	  		</select>
	  	</div>

	  	<div class="form-group">
	  		<label>No. Q: </label>
	  		<input type="text" class="form-control" name="noq" v-model.trim="Noq">
	  	</div>

	  	<div class="form-group">
	  		<label>Estatus Contrato: </label>
	  		<select class="form-control" v-model="estatuscontrato">
	  			<option disabled value="">{{firstOpt.FirmaContrato}}</option>
	  			<option v-for="contrato in estauscontratofirmado" v-bind:value="contrato.id">
	  				{{contrato.status}}
	  			</option>
	  		</select>
	  	</div>

	  	<div class="form-group">
	  		<label>Estatus Adquisicion: </label>
	  		<select class="form-control" v-model="estatusadquisicion">
	  			<option disabled value="">{{firstOpt.Estatus}}</option>
	  			<option v-for="adquisicion in estadquisicion" v-bind:value="adquisicion.id">
	  				{{adquisicion.status}}
	  			</option>
	  		</select>
	  	</div>
	  	<hr>
	  	<div class="form-group">
	  		<label>Comentario: </label>
	  		<textarea class="form-control" id="Textarea1" rows="3" v-model.trim="comentario"></textarea>
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
					this.Noq = 2;
					if(this.firstOpt.Comment == ""){
						this.comentario = 'Actualizacion de los datos del PDV.';
					}else{
						this.comentario = this.firstOpt.Comment;
					}
				});
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
				if(this.Pdv === ''){
					this.Pdv = this.firstOpt.PDV;
				}
				if(this.Region === ''){
					this.Region = this.firstOpt.Region;
				}
				if(this.Subregion === ''){
					this.Subregion = this.firstOpt.Subregion;
				}
				if(this.Plaza === ''){
					this.Plaza = this.firstOpt.Plaza;
				}
				if(this.estatuscontrato === ''){
					this.estatuscontrato = this.firstOpt.FirmaContrato;
				}
				if(this.estatusadquisicion === ''){
					this.estatusadquisicion = this.firstOpt.Estatus;
				}	
				var idPdv = this.firstOpt.id;
				var idTienda = this.firstOpt.idTienda;
				axios.put('/pdv/update',{
					id:idPdv,idTienda:this.Pdv,idRegion:this.Region,idSubregion:this.Subregion,idPlaza:this.Plaza,
					idStatusAdquisicion:this.estatusadquisicion,idStatusContrato:this.estatuscontrato
					}).then((response) => {
					//console.log(response.data);
				}).catch(function(error){
					//console.log(error.response);
				});
				axios.put('/tienda/update',{id:idTienda,Name:this.Pdv}).then((response) => {
					console.log(response.data);
				});

				$('#exampleModalCenter').modal('hide');
				this.$emit('updateYou');
			},
		},
	}
</script>