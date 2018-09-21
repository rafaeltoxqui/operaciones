<template>
<div class="row">
	<select class="form-control" v-model="valorCriterio" @change="operationOfSelected">
		<option v-for="criterio in criterios" v-bind:value="criterio.text">
		{{ criterio.text }}
		</option>
	</select>
	<select class="form-control" v-model="valueSearch">
		<option v-for="option in optionsSearch" v-bind:value="option.name">
			{{ option.name }}
		</option>
	</select>
	<button class="btn btn-primary" id="btn-filter" v-on:click="getFilteredList()"><i class="fa fa-filter"></i></button>
</div>
</template>
<script>
	export default{
		data(){
			return{
				valorCriterio: '',
				valueSearch: '',
				optionsSearch:[],
				criterios: [
					{text: 'Region'},
					{text: 'Subregion'},
					{text: 'Estatus Adquisicion'},
					{text: 'Estatus Contrato'}
				],
			};
		},
		methods:{
			operationOfSelected(){
				var url = '';
				if(this.valorCriterio != ''){
					if(this.valorCriterio == 'Region'){
						url = '/region/getregions';
					}
					if(this.valorCriterio == 'Subregion'){
						url = '/subregion/getsubregions';
					}
					if(this.valorCriterio == 'Estatus Adquisicion'){
						url = '/status/getStatusFilter';
					}
					if(this.valorCriterio == 'Estatus Contrato'){
						url = '/statucontrato/getstatuscontratofilter';
					}
					axios.get(url).then((response) => {
						this.optionsSearch = response.data;
					});	

					$('#btn-filter').fadeIn("slow");				
				}
			},
			getFilteredList(){
				var filtros = [this.valorCriterio,this.valueSearch];
				this.$eventHub.$emit('filtersToSearch',filtros);
				/*if(this.valueSearch != ''){
					axios.post('/pdvs/searchByFilter',{table:this.valorCriterio, value:this.valueSearch}).then((response) => {
						console.log(response.data.data);
					});
				}*/
			}
		}
	}
</script>