<template>
	<div class="d-flex" style="height: calc(100vh - 100px)">
		<el-card
			class="flex-shrink-0 mr-3"
			:header="`Order No. ${order.nomor}`"
			:bodyStyle="{padding: 0}"
		>
			<table class="table table-sm table-striped" style="width:500px">
				<tbody>
					<tr>
						<td class="td-label pl-3">Nomor Sarana</td>
						<td class="pr-4">{{order.sarana.nomor}}</td>
					</tr>
					<tr>
						<td class="td-label pl-3">Jenis Sarana</td>
						<td>{{order.jenis_sarana.kode}}</td>
					</tr>
					<tr>
						<td class="td-label pl-3">Dipo</td>
						<td class="pr-4">{{order.dipo.nama}}</td>
					</tr>
					<tr>
						<td class="td-label pl-3">Jalur</td>
						<td class="pr-4">{{order.jalur.nama}}</td>
					</tr>
					<tr>
						<td class="td-label pl-3">Jenis Pekerjaan</td>
						<td class="pr-4">{{order.jenis_pekerjaan.kode}}</td>
					</tr>
					<tr>
						<td class="td-label pl-3">Tanggal Masuk</td>
						<td class="pr-4">{{order.tanggal_masuk}}</td>
					</tr>
					<tr>
						<td class="td-label pl-3">Tanggal Keluar</td>
						<td class="pr-4">{{order.tanggal_keluar}}</td>
					</tr>
					<tr>
						<td class="td-label pl-3">Keterangan</td>
						<td class="pr-4">{{order.keterangan}}</td>
					</tr>
					<tr>
						<td class="td-label pl-3">Prosentase Pekerjaan</td>
						<td class="pr-4">
							<el-progress :percentage="order.prosentase_pekerjaan"></el-progress>
						</td>
					</tr>
					<tr>
						<td class="td-label pl-3">Status</td>
						<td class="pr-4">
							<el-tag effect="dark" :type="order.status_type">{{order.status_label}}</el-tag>
						</td>
					</tr>
				</tbody>
			</table>
		</el-card>
		<el-tabs type="card" class="flex-grow-1">
			<el-tab-pane label="Order Progress">
				<OrderProgress :detail="order.order_detail" />
			</el-tab-pane>
			<el-tab-pane label="Update Order">
				<OrderUpdate :order="order" @reload-data="getData()" />
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
	methods: {
		getData() {
			this.$axios.get(`/api/order/${this.$route.params.id}`).then((r) => {
				this.order = r.data;
			});
		},
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
	max-width: 120px;
}
</style>
