<template>
	<el-form style="margin-top: 200px">
		<h1>KAI BALAI YASA TEGAL</h1>
		<el-form-item>
			<el-input placeholder="Email" v-model="loginForm.email"></el-input>
		</el-form-item>
		<el-form-item>
			<el-input type="password" placeholder="Password" v-model="loginForm.Password"></el-input>
		</el-form-item>
		<el-form-item>
			<el-button type="primary">LOGIN</el-button>
		</el-form-item>
	</el-form>
</template>

<script>
export default {
	layout: "login",
	data() {
		return {
			loginForm: {},
		};
	},
	created() {
		this.$axios.$get("/sanctum/csrf-cookie");
	},
	method: {
		login() {
			this.$auth
				.loginWith("local")
				.then((r) => {
					this.$router.push(this.$route.query.redirect || "/");
				})
				.catch((e) => {
					if (e.response.status == 422 || e.response.status == 429) {
						this.$message({
							message: e.response.data.errors.email[0],
							type: "error",
						});
					}
				});
		},
	},
};
</script>
