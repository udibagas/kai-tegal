<template>
	<div class="d-flex">
		<el-card class="mr-3" :header="`Order No. ${order.nomor}`" :bodyStyle="{padding: 0}">
			<table class="table table-sm stripe" style="width:500px">
				<tbody>
					<tr>
						<td style="width:200px">Nomor</td>
						<td>{{order.nomor}}</td>
					</tr>
					<tr>
						<td>Tanggal Masuk</td>
						<td>{{order.tanggal_masuk}}</td>
					</tr>
					<tr>
						<td>Nomor Sarana</td>
						<td>{{order.sarana.nomor}}</td>
					</tr>
				</tbody>
			</table>
		</el-card>
		<el-tabs type="card" class="flex-grow-1">
			<el-tab-pane label="Order Progress"></el-tab-pane>
			<el-tab-pane label="Update Order">
				<el-table :data="order.order_progress"></el-table>
			</el-tab-pane>
		</el-tabs>
	</div>
</template>

<script>
export default {
	async asyncData({ params, $axios }) {
		const { data } = await $axios.get(`/api/order/${params.id}`);
		return { order: data };
	},
	// data() {
	// 	return {
	// 		order: {},
	// 	};
	// },
	// methods: {
	// 	getData() {
	// 		this.$axios
	// 			.get(`/api/order/${this.$route.params.id}`)
	// 			.then((r) => (this.order = r.data));
	// 	},
	// },
	// created() {
	// 	this.getData();
	// },
};
</script>

<style>
</style>
