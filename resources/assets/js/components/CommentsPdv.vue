<template>
<div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div class="alert alert-info" v-for="comentario in comentarios">
				<h6>{{comentario.comment}} <span class="small"> created: {{comentario.created_at}}</span></h6>
			</div>
		</div>
	</div>
	<div class="alert alert-warning" id="ocultoMenssage" role="alert"><center>WARNING:¡ The comment cannot be empty !</center></div>
	<br>
	<center>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<textarea class="form-control btnComment" rows="2" v-model="newComment"></textarea>
			<button class="btn btn-default btnComment" v-on:click="addNewComment()">ADD COMMENT</button>
		</div>
	</center>
</div>
</template>
<script>
	export default{
		data(){
			return {
				comentarios : [],
				newComment: '',
			};
		},
		props:{
			id: {
				type: String,
			},
		},
		created(){
			//console.log(this.id);
			this.getCommentList();
		},
		methods : {
			getCommentList() {
				var tmpId = $('#id').val(); //Cambiar esto al parecer no es el metodo correcto. Ver porque no me da nada en el props
				//console.log(tmpId);
				axios.get('/comment/getComents/'+tmpId).then((data) => {
					this.comentarios = data.data;
					//console.log(data.data[0].comment);
				});
			},
			addNewComment(){
				var tmpId = $('#id').val();
				var responseValue = '';
				if(this.newComment != ''){
					axios.post('/comment',{idPdv: tmpId, comment: this.newComment}).then((response)=>{
						responseValue = response.data['message'];
						//console.log(responseValue);
					}).catch(error => {
						$('#ocultoMenssage').fadeIn(1500,function() {
							$('#ocultoMenssage').fadeOut(2500);
						});
					});
				}else{
					$('#ocultoMenssage').fadeIn(1500,function() {
						$('#ocultoMenssage').fadeOut(2500);
					});					
				}
				this.newComment = '';
				this.getCommentList();
			},	
		},
	}
</script>