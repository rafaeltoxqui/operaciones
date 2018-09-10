<template>
<div id="op-dashboard">
	<table class="table table-hover tabletextalign">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">PDV</th>
				<th scope="col">Region</th>
				<th scope="col">Sub Region</th>
				<th scope="col">Plaza</th>
				<th scope="col">Estatus Adquisicion</th>
				<th scope="col">Estatus Contrato</th>
				<th scope="col">PDV Sugerido Por</th>
				<th scope="col">Estimado de Apertura</th>
				<th scope="col">No. Q</th>
				<th scope="col">Mas Apertura</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(row, index) in list" 
				:key="row.id"
				:row="row">
				<td v-for="(item,key) in row">
					
					<span v-if="key==='PDV'">
						<a class="anchor-pdv" href="#" v-on:click="ir(row)">{{item}}</a>
					</span>
					<span v-else >{{item}}</span>
					
				</td>
				<td>Expert Cell</td>
				<td>2</td>
				<td>3</td>
				<td>Agosto</td>
				<td v-on:click="pdvModal(row)"><i class="fa fa-pencil" id="pencil"></i></td>
			</tr>
		</tbody>
	</table>

	<ul class="pagination pagination-sm">
		<li class="page-item" v-for="(page, index) in pages">
			<a class="page-link" tabindex="-1" v-bind:class="page.class" v-on:click="clickpage(index, page)">
				{{page.ubication}}
			</a>
		</li>
	</ul>


<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel" v-model="modalTitle">{{modalTitle}}</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="onlyRefeshList()">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Estatus del Punto de Venta</p>
	    
	        	<select class="form-control" v-model="selected">
	        		<option value="1">Autorizada</option>
	        		<option value="2">Traspazo</option>
	        	</select>
	        	<comment :id="pdvModel"></comment>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="onlyRefeshList()">Close</button>
	        <button type="button" class="btn btn-primary" v-on:click="updateStatusPDV()">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
<!-- End Modal View -->

</div><!-- #po-dashboard -->
</template>
<script>
	export default{
		data(){
			return{
				pages : [],//paginado
				lastPage : 1,//paginado
				list: [],//paginado, listado
				pdvModel: '',//listado
				modalTitle: '',//listado
				selected: '',//listado
				llave:'',//para recargar el sitio
				onlyOnePage:[], //para regarcar el sitio
			};
		},
		methods:{//Metodos para paginado
			fillList(){
				axios.get('/pdvs/pages').then((response) => {
					this.list = response.data.data;
					this.lastPage = response.data.last_page;
					this.createPages();
				});
			},
			createPages(){
				this.pages = [];
				for(var i = 1;i <= this.lastPage;i++){
					this.pages.push({ubication: i, class:""});
				}
			},
			clickpage(index,page){
				this.pages.filter(function(elem){
					elem.class = "";
				});
				if(index === ''){
					index = 0;
				}
				axios.get('pdvs/pages?page='+page.ubication).then((response) => {
					this.pages[index].class = "pageFocus";
					this.llave = index;
					this.onlyOnePage = page;
					this.list = response.data.data;
				});
			},
			// Aqui comienzan metodos para listado 
			ir(row){
				var url = "/pdv/"+row.id;
				window.location.href = url;

			},
			pdvModal(row){
				var pdv = [];
				for(var i = 1;i <= this.list.length; i++){
					if(this.list[i-1].id == row.id){
						pdv = this.list[i-1];
					}
				}
				this.pdvModel = pdv.id;
				this.modalTitle = pdv.PDV;
				//console.log(this.pdvModel);
				$('#exampleModal').modal('show');
			},
			updateStatusPDV(){
				axios.post('/pdv',{id:this.pdvModel,estatus:this.selected}).then(function(response){
				});
				//this.getPdvList();
				this.onlyRefeshList();
				$('#exampleModal').modal('hide');
			},
			onlyRefeshList(){
				this.fillList();
				this.clickpage(this.llave,this.onlyOnePage);
			}
		},
		beforeMount: function(){//metodo uncial para llenar la lista y los paginados
			this.fillList();
		},
	}
</script>