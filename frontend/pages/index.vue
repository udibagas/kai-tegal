<template>
	<div>
		<div class="d-flex flex-wrap justify-content-center align-items-center">
			<el-card
				class="m-2 flex-grow-1"
				style="width:250px"
				v-for="(sarana, index) in jenisSarana"
				:key="index"
			>
				<div slot="header" class="text-center">{{sarana.nama}}</div>
				<div style="width:150px;margin:auto;">
					<el-progress :width="150" type="circle" :percentage="30"></el-progress>
					<div class="mt-3 text-center text-bold">30 dari 100</div>
				</div>
			</el-card>
		</div>
		<div class="d-flex flex-wrap justify-content-center align-items-center">
			<el-card class="m-2 flex-grow-1" style="width:250px">
				<div slot="header" class="text-center">PENCAPAIAN TARGET BULAN {{months[bulan].toUpperCase()}}</div>
				<div style="width:150px;margin:auto;">
					<el-progress :width="150" type="circle" :percentage="30"></el-progress>
					<div class="mt-3 text-center text-bold">30 dari 100</div>
				</div>
			</el-card>
			<el-card class="m-2 flex-grow-1" style="width:250px">
				<div slot="header" class="text-center">PENCAPAIAN TARGET TAHUN {{tahun}}</div>
				<div style="width:150px;margin:auto;">
					<el-progress :width="150" type="circle" :percentage="30"></el-progress>
					<div class="mt-3 text-center text-bold">30 dari 100</div>
				</div>
			</el-card>
		</div>
	</div>
</template>

<script>
import { Chart } from "highcharts-vue";

export default {
	components: { highcharts: Chart },
	data() {
		return {
			laporanBulanan: [],
			bulan: new Date().getMonth() + 1,
			tahun: new Date().getFullYear(),
			jenisSarana: [],
			months: "-,Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember".split(
				","
			),
		};
	},
	methods: {
		bulanan() {
			this.$axios
				.get("/api/report/bulanan", { params: { bulan: this.bulan } })
				.then((r) => {
					this.laporanBulanan = r.data;
				});
		},
		getJenisSarana() {
			this.$axios.get("/api/jenisSarana").then((r) => {
				this.jenisSarana = r.data;
			});
		},
	},
	mounted() {
		this.getJenisSarana();
		this.bulanan();
	},
};
</script>
