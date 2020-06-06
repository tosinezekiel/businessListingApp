<template>
    <div>
        <p>Logout</p>
    </div>
</template>
<script>
export default {
	name:"Logout",
	data(){
		return{
			host:''
		}
	},
	methods:{
		logout(e){
			let vm = this;
			const auth = 'Bearer '+ this.$store.getters.userToken;
			this.$http({ 
				'method': 'POST',
				'url': '/api/logout',
				"headers":{
					'Authorization': auth
				}
			}).
			then(response => {
				if(response.data.success){
					this.$store.dispatch('logout');
					window.location.href = "/"
					vm.$noty.success("thank you for your time");
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
	},
	created(){
		this.logout();
	}
}
</script>