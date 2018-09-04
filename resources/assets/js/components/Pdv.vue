<template>
<div>
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="jumbotron">
				<h1 class="display-4">{{pdv.PDV}}</h1>
				<p class="leave">ID: {{pdv.id}}</p>
				<p class="leave">Region: {{pdv.Region}}</p>
				<p class="leave">Subregion: {{pdv.Subregion}}</p>
				<p class="leave">Plaza: {{pdv.Plaza}}</p>
				<p class="leave">Firma Contrato: {{pdv.FirmaContrato}}</p>
				<p class="leave">Estatus: {{pdv.Estatus}}</p>
				<hr class="my-4">
				<p>Comentarios</p>
				<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
			</div>
		</div>
	</div>
</div>
</template>
<script>
	export default{
		data(){
			return {
				pdv : [],
			};
		},
		mounted() {
			this.getPdv();
		},
		methods : {
			getPdv(){
				var id = $('#id').val();
				axios.get('/pdv/getpdv/'+id).then((response) => {
					this.pdv = response.data[0];
					console.log(this.pdv);
				});
			},
		},
	}
</script>