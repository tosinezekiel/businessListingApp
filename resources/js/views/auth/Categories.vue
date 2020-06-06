<template>
    <div>
         <admin-top-nav></admin-top-nav> 
            <side-bar></side-bar>
     <!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid ovh">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-lg-9 col-xl-10 maxw100flex-992">
					<div class="row">
						<div class="col-lg-12 mb10">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">Add New Category</h2>
								<!-- <p>We are glad to see you again!</p> -->
							</div>
						</div>
						<div class="col-lg-12">
							<div class="my_dashboard_review">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Add Category</h4>
										<div class="my_profile_setting_input form-group">
									    	<label for="propertyTitle">Name</label>
									    	<input type="text" v-model="name" class="form-control" id="propertyTitle">
										</div>
									</div>
									
								</div>
							</div>
							<div class="my_dashboard_review mt30">
								<div class="row">
									
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<!-- <button class="btn btn1 float-left">Back</button> -->
											<button class="btn btn2 float-right" @click="submitForm">Add</button>
										</div>
									</div>
								</div>
							</div>
							<div class="my_dashboard_review mt40">
								<div class="col-lg-12">
									<div class="savesearched_table">
										<div class="table-responsive mt0">
											<table class="table">
												<thead class="thead-light">
											    	<tr>
											    		<th scope="col">Name</th>
											    		<th class="dn-lg" scope="col"></th>
											    		<th class="dn-lg" scope="col"></th>
											    		<th scope="col"></th>
											    		<th scope="col"></th>
											    		<th scope="col">Created</th>
											    		<th scope="col">Action</th>
											    	</tr>
												</thead>
												<tbody>
											    	<tr v-for="(cat,index) in categories" :key="index">
											    		<th class="title">{{cat.name}}</th>
											    		<td class="dn-lg"></td>
											    		<td class="dn-lg"></td>
											    		<td></td>
											    		<td></td>
											    		<td class="para">{{cat.created_at}}</td>
											    		<td>
											    			<ul class="view_edit_delete_list mb0">
											    				<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#" @click="deleteCategory(cat.id)"><span class="flaticon-garbage"></span></a></li>
											    			</ul>
											    		</td>
											    	</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt50">
						<div class="col-lg-12">
							<div class="copyright-widget text-center">
								<p>© 2020 Business Listing App. Made with love.</p>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
    </div>
</template>
<script>

export default {
    name:'Categories',
    data(){
		return{
			host:'',
            categories:'',
            name:'',
			fileupload:false,
			errors:[]
		}
	},
	methods:{
		getCategories(){
			let vm = this
			const auth = 'Bearer '+ this.$store.getters.userToken;
			this.$http({
				'method': 'GET',
				'url': '/api/categories',
				"headers":{
					'Authorization': auth
				}
			}).then(response =>{
				console.log(response);
				vm.categories = response.data;
			})
		},
		deleteCategory(e,id){
			e.preventDefault();
				let vm = this
				const auth = 'Bearer '+ this.$store.getters.userToken;
			this.$http({
				'method': 'DELETE',
				'url': '/api/categories/'+id,
				'headers':auth
			}).then(response =>{
				vm.$noty.success(response.data.message);
				window.location = "/admin/categories/create"
			}).catch(function(error) {
					if(error.response.status === 422){
						vm.errors = error.response.data.errors
						let vern = vm.errors
						for(let err in vern){
							vm.$noty.error(vern[err]);
						}
						vm.errors = []
					}
			});
		},
		submitForm(e){
			e.preventDefault();
			let vm = this;
			const auth = 'Bearer '+ this.$store.getters.userToken;
			if (!this.name) {
				this.errors.push('name is required.');
			}
			for (const error in this.errors){
				return this.$noty.warning(this.errors[error]);
				return;
			}
            let data = {}
            data.name = this.name
			if(this.name){
				this.$http.post('/api/categories', data,{headers:{'Authorization':auth}}).then(response => {
						if(response.data.status == "error"){
							vm.$noty.error(response.data.message);
							return;
						}
						vm.$noty.success(response.data.message);
						window.location = "/admin/categories/create"
					}).catch(function(error) {
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
	},
	mounted(){
		this.getCategories();
	}
};
</script>