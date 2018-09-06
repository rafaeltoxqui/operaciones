<template>
<div>
  <ul>
    <li v-for="p in paginatedData">
      {{p.first}} 
      {{p.last}}  
      {{p.suffix}}
    </li>
  </ul>
  <button @click="prevPage">
    Previous
  </button>
  <button @click="nextPage">
    Next
  </button>
</div>
</template
<script>
	export default{
		data(){
			return{
				pageNumber : 0,
			}
		},
		props:{
			listData:{
				type:Array,
				required:true,
			},
			size:{
				type:Number,
				required:false,
				default:5,
			}
		},
		methods:{
			nextPage(){
				this.pageNumber++;
			},
			prevPage(){
				this.pageNumber--;
			}
		},
		computed:{
			pageCount(){
				let l = this.listData.lenght,
				    s = this.size;
				return Math.floor(l/s);
			},
			paginateDate(){
				const start = this.pageNumber * this.size,
				      end = start + this.size;
				return this.listData.slice(start,end);
			}
		}
	}
</script>