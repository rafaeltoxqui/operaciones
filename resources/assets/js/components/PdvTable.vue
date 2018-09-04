<template>
<div id="op-dashboard">
		<table class="table table-hover tabletextalign">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">PDV</th>
				<th scope="col">Estimado de Apertura</th>
				<th scope="col">No. Q</th>
				<th scope="col">Mas Apertura</th>
				<th scope="col">Region</th>
				<th scope="col">Sub Region</th>
				<th scope="col">Plaza</th>
				<th scope="col">Estatus</th>
				<th scope="col">Firma de Contrato</th>
				<th scope="col">PDV Sugerido Por</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(row, index) in pdvData" 
				:key="row.id"
				:row="row">
				<td v-for="(item,key)  in row">
					
					<span v-if="key==='pdv'">
						<a class="anchor-pdv" href="#" v-on:click="ir(row)">{{item}}</a>
					</span>
					<span v-else v-on:click="pdvModal(row)">{{item}}</span>
					
					
				</td>
			</tr>
		</tbody>
	</table>

<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel" v-model="modalTitle">{{modalTitle}}</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="getPdvList()">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p v-model="pdvModel">{{pdvModel}} - Estatus del Punto de Venta</p>
	    
	        	<select class="form-control" v-model="selected">
	        		<option value="1">Autorizada</option>
	        		<option value="2">Traspazo</option>
	        	</select>
	        	<comment :id="pdvModel"></comment>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="getPdvList()">Close</button>
	        <button type="button" class="btn btn-primary" v-on:click="updateStatusPDV()">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
<!-- End Modal View -->

</div><!-- #op-dash-board -->
</template>
<script>

	export default {
		data() {
			return {
				pdvData : [],
				pdvModel: '',
				modalTitle: '',
				selected: '',
			};
		},

		mounted() {
			this.getPdvList();
			var element = document.querySelector('.anchor-pdv');
		},
		methods : {
			getPdvList() {
				axios.get('/pdv/allpdv').then((data) => {
					this.pdvData = data.data;
				});
			},
			ir(row){
				var url = "/pdv/"+row.id;
				window.location.href = url;

			},
			testMethod: function () {
				console.log('asdfasd');
			},
			pdvmessage(row){
				console.log(row);
			},
			pdvModal(row){
				var pdv = this.pdvData[row.id - 1];
				this.pdvModel = pdv.id;
				this.modalTitle = pdv.pdv;
				$('#exampleModal').modal('show');
			},
			updateStatusPDV(){
				axios.post('/pdv',{id:this.pdvModel,estatus:this.selected}).then(function(response){
				});
				this.getPdvList();
				$('#exampleModal').modal('hide');
			},

		},


	}
</script>