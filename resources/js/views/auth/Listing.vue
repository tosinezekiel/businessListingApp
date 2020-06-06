<template>
    <div>
         <admin-top-nav></admin-top-nav> 
            <side-bar></side-bar>
         <!-- Our Dashbord -->
	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
					<div class="row">
						<div class="col-lg-4 col-xl-4 mb10">
							<div class="breadcrumb_content style2 mb30-991">
								<h2 class="breadcrumb_title">Businesses</h2>
								<!-- <p>We are glad to see you again!</p> -->
							</div>
						</div>
						<div class="col-lg-8 col-xl-8">
							<div class="candidate_revew_select style2 text-right mb30-991">
								<ul class="mb0">
									<li class="list-inline-item">
										<div class="candidate_revew_search_box course fn-520">
											<form class="form-inline my-2">
										    	<input class="form-control mr-sm-2" type="search" placeholder="Search Courses" aria-label="Search">
										    	<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
										    </form>
										</div>
									</li>
									<!-- <li class="list-inline-item">
										<select class="selectpicker show-tick">
											<option>Featured First</option>
											<option>Recent</option>
											<option>Old Review</option>
										</select>
									</li> -->
								</ul>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="my_dashboard_review mb40">
								<div class="property_table">
									<div class="table-responsive mt0">
										<table class="table">
											<thead class="thead-light">
										    	<tr>
										    		<th scope="col">Listing Title</th>
										    		<th scope="col">Date published</th>
										    		<th scope="col">Status</th>
										    		<th scope="col">View</th>
										    		<th scope="col">Action</th>
										    	</tr>
											</thead>
											<tbody>
										    	<tr v-for="(business,index) in businesses" :key="index">
										    		<th scope="row">
														<div class="feat_property list favorite_page style2">
															<div class="thumb">
																<img class="img-whp" :src="business.images[0].path" :alt="business.name">
																<div class="thmb_cntnt">
																	<ul class="tag mb0">
																		<li class="list-inline-item dn"></li>
																		<li class="list-inline-item"><a href="#"><span class="fa fa-eye"></span> {{business.views}}</a></li>
																	</ul>
																</div>
															</div>
                                                            
														</div>
										    		</th>
										    		<td colspan="2">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">{{business.name}}</li>
                                                            <li class="list-group-item">{{business.email}} | {{business.phone }}</li>
                                                            <li class="list-group-item">{{business.url}}</li>
														</ul>
                                                    </td>
                                                    <td colspan="2">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">{{business.address.city}}, {{business.address.state}}, {{business.address.country}}</li>
                                                            <li class="list-group-item">{{business.created_at}}</li>
                                                            <li class="list-group-item"><h6> <span class="badge badge-secondary" v-for="(cat,i) in business.categories" :key="i">{{cat.name}}</span></h6></li>
                                                            <li>
                                                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                                    <a href="" type="button" class="btn btn-secondary">Edit</a>
                                                                    <button type="button" @click="disableBusiness(business.id)" v-if="business.status == 1" class="btn btn-warning">Disable</button>
                                                                    <button type="button" @click="enableBusiness(business.id)" v-else class="btn btn-primary">Enable</button>
																	
																</div>
                                                                <div class="btn-group btn-group-sm" role="group" aria-label="Third group">
                                                                    <button type="button" @click="deleteBusiness(business.id)" class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </td>
										    	</tr>
											</tbody>
										</table>
									</div>
									<div class="mbp_pagination">
										<ul class="page_navigation">
										    <li class="page-item disabled">
										    	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
										    </li>
										    <li class="page-item"><a class="page-link" href="#">1</a></li>
										    <li class="page-item active" aria-current="page">
										    	<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
										    </li>
										    <li class="page-item"><a class="page-link" href="#">3</a></li>
										    <li class="page-item"><a class="page-link" href="#">...</a></li>
										    <li class="page-item"><a class="page-link" href="#">29</a></li>
										    <li class="page-item">
										    	<a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
										    </li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt10">
						<div class="col-lg-12">
							<div class="copyright-widget text-center">
								<p>© 2020 Find House. Made with love.</p>
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
    name:'Listing',
    data(){
		return{
            host:'',
            businesses:'',
            errors:[]
		}
    },
    methods:{
        getBusinesses(){
			let vm = this
			const auth = 'Bearer '+ this.$store.getters.userToken;
			this.$http({
				'method': 'GET',
				'url': '/api/businesses/admin',
				"headers":{
					'Authorization': auth
				}
			}).then(response =>{
				vm.businesses = response.data.data;
				console.log(response)
			})
		},
		deleteBusiness(id){
			let vm = this
			const auth = 'Bearer '+ this.$store.getters.userToken;
			this.$http({
				'method': 'DELETE',
				'url': '/api/businesses/'+id,
				"headers":{
					'Authorization': auth
				}
			}).then(response =>{
				vm.$noty.success(response.data.message);
				window.location = "/admin/businesses"
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
        enableBusiness(id){
				let vm = this
				const auth = 'Bearer '+ this.$store.getters.userToken;
			this.$http({
				'method': 'GET',
				'url': '/api/businesses/'+id+'/enable',
				"headers":{
					'Authorization': auth
				}
			}).then(response =>{
				vm.$noty.success(response.data.message);
				window.location = "/admin/businesses"
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
        disableBusiness(id){
			let vm = this
			const auth = 'Bearer '+ this.$store.getters.userToken;
			this.$http({
				'method': 'GET',
				'url': '/api/businesses/'+id+'/disable',
				"headers":{
					'Authorization': auth
				}
			}).then(response =>{
				vm.$noty.success(response.data.message);
				window.location = "/admin/businesses"
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
    },
	mounted(){
        this.getBusinesses();
	}
};
</script>