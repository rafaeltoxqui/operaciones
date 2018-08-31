<template>
	<div>
		<table>
			<tr>
				<td>asdf</td>
				<td>asdf</td>
			</tr>
		</table>
		<button v-on:click="getPdvList()">Traer Cosas</button>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				pdvdata : '',
			};
		},
		methods : {
			getPdvList() {
				axios.get('/test').then((data) => {
					console.log(data);
					this.pdvdata = data;
				});
			},

		}
	}
</script>
