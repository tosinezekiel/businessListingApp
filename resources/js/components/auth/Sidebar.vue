<template>
    <div class="dashboard_sidebar_menu dn-992">
	    <ul class="sidebar-menu">
	   		<li class="header"><img :src="'//'+host+'/images/header-logo2.png'" alt="header-logo2.png"> FindHouse</li>
	   		<li class="title"><span>Main</span></li>
	    	<li class="treeview"><a href="page-dashboard.html"><i class="flaticon-layers"></i><span> Dashboard</span></a></li>
			<li class="title"><span>Manage Businnesses</span></li>
		    <li><a href="/admin/businesses"><i class="fa fa-circle"></i> All Businesses</a></li>
			<li class="title"><span>Manage Categories</span></li>
		    <li><a href="/admin/categories/create"><i class="fa fa-circle"></i> Categories</a></li>
	   		<li class="title"><span>Manage Account</span></li>
		    <li><b @click="logout"><i class="flaticon-logout"></i> <span>Logout</span></b></li>
	    </ul>
    </div>
</template>
<script>
export default {
	name:"sidebar",
	data(){
		return{
			host:''
		}
	},
	methods:{
		logout(e){
			e.preventDefault();
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
	mounted(){
		this.host = window.location.host;
	}
}
</script>