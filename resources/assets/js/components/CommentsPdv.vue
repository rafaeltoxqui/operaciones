<template>
<div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<fieldset class="fieldComentarios">
				<legend class="legenFielComentarios">
					<h5><span class="small"><strong>&nbsp;&nbsp;COMENTARIOS&nbsp;&nbsp;</strong></span></h5>
				</legend>
				<div class="alert alert-info" v-for="comentario in comentarios">
					<h6><i class="fa fa-comment"></i>: {{comentario.comment}} <span class="small" id="FYHC"> created: {{comentario.created_at}}</span></h6>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="alert alert-warning" id="ocultoMenssage" role="alert"><center>WARNING: ¡The comment cannot be empty!</center></div>
	<br>
	<center>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<textarea class="form-control btnComment" rows="2" v-model="newComment"></textarea>
			<button type="button" class="btn btn-primary btn-sm" id="btnComment" v-on:click="addNewComment()">ADD COMMENT</button>
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
			this.$eventHub.$on('updateComments', this.getCommentList);
		},
		mounted(){
			this.getCommentList();
		},
		methods : {
			getCommentList() {
				axios.get('/comment/getComents/'+this.id).then((data) => {
					this.comentarios = data.data;
				});
			},
			addNewComment(){
				var tmpId = $('#id').val();
				var responseValue = '';
				if(this.newComment != ''){
					axios.post('/comment',{idPdv: tmpId, comment: this.newComment}).then((response)=>{
						responseValue = response.data['message'];
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