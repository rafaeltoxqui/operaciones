<template>
<div>
	Comentario:
	<textarea class="form-control" v-model="comment" rows="10"></textarea>
</div>
</template>
<script>
	export default{
		data(){
			return {
				comment: '',
			};
		},
		props: ['idComment'],
		methods : {
			commentCreate(){
				axios.post('/comment',{comment : this.comment}).then((response) =>{
					console.log('Comentario' + response);
				});
			},
		},
	}
</script>