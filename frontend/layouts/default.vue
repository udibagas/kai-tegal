<template>
	<el-container>
		<el-aside width="auto">
			<el-menu
				router
				background-color="#1f48ab"
				active-text-color="#fff"
				text-color="#bbb"
				:collapse="collapse"
				default-active="/"
			>
				<el-menu-item v-for="(menu, index) in menus" :key="index" :index="menu.path">
					<i :class="menu.icon"></i>
					<span slot="title">{{menu.label}}</span>
				</el-menu-item>
			</el-menu>
		</el-aside>
		<el-container>
			<el-header class="d-flex">
				<div>
					<i
						style="font-size:18px"
						class="mr-2"
						:class="collapse ? 'el-icon-s-unfold' : 'el-icon-s-fold'"
						@click="collapse = !collapse"
					></i>
				</div>
				<div class="brand flex-grow-1">DASHBOARD SARANA BYTG</div>
				<div>
					<el-avatar></el-avatar>
				</div>
				<div>{{$auth.user.name}}</div>
			</el-header>
			<el-main>
				<Nuxt />
			</el-main>
		</el-container>
	</el-container>
</template>

<script>
export default {
	middleware: ["auth"],
	data() {
		return {
			menus: [],
			collapse: true,
		};
	},
	methods: {
		getMenu() {
			this.$axios.get("/api/menu").then((r) => (this.menus = r.data));
		},
	},
	created() {
		this.getMenu();
		this.$store.dispatch("getListJenisSarana");
		this.$store.dispatch("getListJenisPekerjaan");
		this.$store.dispatch("getListDipo");
		this.$store.dispatch("getListJalur");
		this.$store.dispatch("getListJenisDetailPekerjaan");
	},
};
</script>

<style lang="scss" scoped>
.el-header {
	line-height: 60px;
	border-bottom: 1px solid #ddd;
}

.el-menu {
	height: 100vh;
}

.el-menu-item.is-active {
	background-color: rgb(25, 58, 137);
}
</style>
