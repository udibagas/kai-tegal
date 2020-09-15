<template>
	<div class="d-flex">
		<el-card class="mr-3" :header="`Order No. ${order.nomor}`" :bodyStyle="{padding: 0}">
			<table class="table table-sm stripe" style="width:500px">
				<tbody>
					<tr>
						<td class="td-label">Nomor Sarana</td>
						<td>{{order.sarana.nomor}}</td>
					</tr>
					<tr>
						<td class="td-label">Jenis Sarana</td>
						<td>{{order.jenis_sarana.kode}}</td>
					</tr>
					<tr>
						<td class="td-label">Tanggal Masuk</td>
						<td>{{order.tanggal_masuk}}</td>
					</tr>
					<tr>
						<td class="td-label">Tanggal Keluar</td>
						<td>{{order.tanggal_keluar}}</td>
					</tr>
				</tbody>
			</table>
		</el-card>
		<el-tabs type="card" class="flex-grow-1">
			<el-tab-pane label="Order Progress"></el-tab-pane>
			<el-tab-pane label="Update Order">
				<!-- <el-table :data="order"></el-table> -->
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
};
</script>

<style>
.el-card__header {
	color: #0e5ca9;
	font-weight: bold;
}

.td-label {
	color: #777;
}
</style>
