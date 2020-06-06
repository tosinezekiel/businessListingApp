<template>
    <div>
         <top-nav></top-nav> 
            <!-- Our LogIn Register -->
	<section class="our-log bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-6 offset-lg-3">
					<div class="login_form inner_page">
					
							<div class="heading">
								<h3 class="text-center">Login to your account</h3>
								<!-- <p class="text-center">Don't have an account? <a class="text-thm" href="page-register.html">Sign Up!</a></p> -->
							</div>
							 <div class="form-group">
						    	<input type="email" class="form-control" v-model="email" id="exampleInputEmail3" placeholder="Email Address">
							</div>
							<div class="form-group">
						    	<input type="password" class="form-control" v-model="password" id="exampleInputPassword4" placeholder="Password">
							</div>
							<button type="submit" style="" @click="submitForm" class="btn btn-log btn-block btn-thm2">Login</button>
					
					</div>
				</div>
			</div>
		</div>
	</section>
         <footer-nav></footer-nav>
         <!-- <h1>Hello</h1> -->
    </div>
</template>
<script>
export default {
	name:'Login',
	data(){
		return{
			email:'',
			password:'',
			errors:[],
			data:''
		}
	},
	methods:{
		submitForm(e){
			e.preventDefault();
			let vm = this;
			if (!this.email) {
				this.$noty.warning('email is required.');
			}
			if (!this.password) {
				this.$noty.warning('password field is required.');
			}
			if(this.email && this.password){
				let form = new FormData();
				form.append('email',this.email);
				form.append('password',this.password);
				this.$http.post('/api/login', form).then(response => {
					if(!response.data.status){
						vm.$noty.error(response.data.message);
					}else{
						this.data = response.data 
						vm.$store.commit('init',this.data)
						window.location.href = "/admin/dashboard"
					} 
				}).catch(function(error){
						if(error.response.status === 422){
						vm.errors = error.response.data.errors
						let vern = vm.errors
						for(let err in vern){
							vm.$noty.error(vern[err]);
						}
						vm.errors = []
					}
				});
			}

		}
	}
};
</script>
<style scoped>
    .btn-log{background-color:#5f1e8f !important;border:1px solid #5f1e8f !important;}
    .btn-log:hover{background-color:#eee !important;border:1px solid #eee !important; color:#5f1e8f !important}
</style>