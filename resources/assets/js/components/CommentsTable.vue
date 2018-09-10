<template>
<div>
	Comentario:
	<textarea class="form-control" v-model="comment" rows="10"></textarea>
	<h6><span class="small"> "state modification" is the default comment if you do not post a comment</span></h6>
</div>
</template>
<script>
	export default{
		data(){
			return {
				comment: '',
			};
		},
		props: {
			id: {
				type: String,
			},
		},
		methods : {
			commentCreate(){
				if(comment === ''){
					axios.post('/comment',{idPdv:this.id,comment : this.comment}).then((response) =>{
						console.log('Comentario' + response);
					});					
				}else{
					this.comment = '¡Modificacioon del status!';
				}
			},
		},
	}
</script>