<template>
<div>
	<button type="button" id="btnBus" class="btn btn-primary" v-on:click="warn()"><i class="fa fa-search"style="font-size:15px;"></i></button>
</div>
</template>
<script>
	export default{
		data(){
			return{

			};
		},
		methods:{
			warn(){
				this.$eventHub.$emit('warn');
			}
			/*getFoundList() {
				var searchValue = $('#search').val();
				if(this.search != ''){
					axios.post('/pdvs/searchByStore',{search:searchValue}).then((response) => {
						console.log(response.data);
						axios.post('/pdvs/searchByStore?page=3',{search:searchValue}).then((response) => {
							console.log(response.data);
						});
					});
				}
			},*/
		}
	}
</script>