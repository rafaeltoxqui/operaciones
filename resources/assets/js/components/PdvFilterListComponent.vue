<template>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<center><h6><span class="small">Criterio</span></h6></center>
			<select class="form-control" id="filterPosition" v-model="valorCriterio" @change="operationOfSelected">
				<option v-for="criterio in criterios" v-bind:value="criterio.text">
				{{ criterio.text }}
				</option>
			</select>
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<center><h6><span class="small">Filtrar</span></h6></center>
			<select class="form-control" id="filterPosition" v-model="valueSearch">
				<option v-for="option in optionsSearch" v-bind:value="option.name">
					{{ option.name }}
				</option>
			</select>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<span>&nbsp;</span>
			<button class="btn btn-primary" id="btn-filter" v-on:click="getFilteredList()"><center><i class="fa fa-filter"></i></center></button>
		</div>
	</div>
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
				/*if(this.valueSearch != ''){
					axios.post('/pdvs/searchByFilter?page=2',{table:this.valorCriterio, value:this.valueSearch}).then((response) => {
						console.log(response.data);
					});
				}*/
				var filtros = [this.valorCriterio,this.valueSearch];
				this.$eventHub.$emit('filtersToSearch',filtros);
			}
		}
	}
</script>