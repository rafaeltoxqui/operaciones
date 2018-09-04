<template>
<div>
	<div class="alert alert-info">
		<h6>{{comentario.comment}} <span class="small"> created: {{comentario.created_at}}</span></h6>
	</div>
</div>
</template>
<script>
	export default{
		data(){
			return {
				comentario : [],
			};
		},
		props:['id'],
		mounted(){
			console.log(this.id);
			this.getCommentList();
		},
		methods : {
			getCommentList() {
				var tmpId = $('#id').val(); //Cambiar esto al parecer no es el metodo correcto. Ver porque no me da nada en el props
				axios.get('/comment/getComents/'+tmpId).then((data) => {
					this.comentario = data.data[0];
				});
			},			
		},
	}
</script>