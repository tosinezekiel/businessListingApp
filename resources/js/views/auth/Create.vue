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
								<h2 class="breadcrumb_title">Add New Business</h2>
								<p>We are glad to see you again!</p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="my_dashboard_review mb30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Create Listing</h4>
										<div class="my_profile_setting_input form-group">
									    	<label for="propertyTitle">Business Name</label>
									    	<input type="text" v-model="name" class="form-control" id="propertyTitle">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="my_profile_setting_textarea">
										    <label for="propertyDescription">Business Description</label>
										    <textarea class="form-control" v-model="description" id="propertyDescription" rows="7"></textarea>
										</div>
									</div>
								
									<div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="formGroupExamplePrice">City</label>
									    	<input type="text" v-model="city" class="form-control" id="formGroupExamplePrice3">
										</div>
									</div>
									<div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="4">State</label>
									    	<input type="text" v-model="state" class="form-control" id="42">
										</div>
									</div>
                                    <div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="4">Country</label>
									    	<input type="text" v-model="country" class="form-control" id="4">
										</div>
									</div>
									
								</div>
							</div>
							<div class="my_dashboard_review">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Location</h4>
										<div class="my_profile_setting_input form-group">
									    	<label for="propertyTitle">URL</label>
									    	<input type="text" v-model="url" class="form-control" id="propertyTitle">
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<label for="formGroupExamplePrice">Email</label>
									    	<input type="text" v-model="email" class="form-control" id="formGroupExamplePrice">
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<label for="4">Phone</label>
									    	<input type="text" v-model="phone" class="form-control" id="formGroupExampleArea4">
										</div>
									</div>
									
								</div>
							</div>
							<div class="my_dashboard_review mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Business media</h4>
									</div>
									<label for="4" v-if="fileupload" style="color:green;">File is set for upload { {{ filename }} }</label>
									<div class="input-group" style="margin-bottom:50px;">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
										</div>
										<div class="custom-file">
											<input type="file" @change="onFileChange" class="custom-file-input" id="inputGroupFile01"
											aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
										</div>
                                    </div>
                                    <div class="col-xl-12">
							        	<h4>Categories</h4>
							        </div>
							        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
						                <ul class="ui_kit_checkbox selectable-list">
						                	<li v-for="(cat,index) in categories" :key="index">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" @click="addToCategory(cat.id)" class="custom-control-input" :id="'customCheck'+cat.id">
													<label class="custom-control-label" :for="'customCheck'+cat.id">{{cat.name}}</label>
												</div>
						                	</li>
						                </ul>
							        </div>
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<!-- <button class="btn btn1 float-left">Back</button> -->
											<button class="btn btn2 float-right" @click="submitForm">Submit</button>
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
    name:'Create',
    data(){
		return{
			host:'',
			categories:'',
			selectedCategories:[],
			fileupload:false,
			filename:'',
			image:'',
			name:'test business',
			description:'lorem ispum',
			email:'test@test.com',
			phone:'09089897867',
			url:'https://yttld.com',
			city:'yaba',
			state:'lagos',
			country:'Ng',
			errors:[]
		}
	},
	methods:{
		onFileChange(e){
			console.log(e.target.files[0]);
			this.image = e.target.files[0];
			this.filename = this.image['name']
			this.fileupload = true;
		},
		getCategories(){
			let vm = this
			const auth = 'Bearer '+ this.$store.getters.userToken;
			this.$http({
					'method': 'GET',
					'url': '/api/categories',
					'headers':auth
				}).then(response =>{
					vm.categories = response.data;
				})
		},
		addToCategory(id){
			let exist = this.selectedCategories.find(item => item === id)
			let catIndex = this.selectedCategories.findIndex(item => item === id)
			if(this.selectedCategories.length < 1){
				this.selectedCategories.push(id);
				return;
			}
			if(exist){
				this.selectedCategories.splice(catIndex,1)
			}else{
				this.selectedCategories.push(id);
			}			
		},
		submitForm(e){
			e.preventDefault();
			const auth = 'Bearer '+ this.$store.getters.userToken;
			const config = {
				headers:{'Authorization':auth}
			}
			
			let vm = this;
			if (!this.name) {
				this.errors.push('name is required.');
			}
			if (!this.description) {
				this.errors.push('description field is required.');
			}
			if (!this.url) {
				this.errors.push('url field is required.');
			}
			if (!this.phone) {
				this.errors.push('phone field is required.');
			}
			if (!this.email) {
				this.errors.push('email field is required.');
			}
			if (!this.city) {
				this.errors.push('city field is required.');
			}
			if (!this.state) {
				this.errors.push('state field is required.');
			}
			if (!this.country) {
				this.errors.push('country field is required.');
			}
			if (this.selectedCategories.length < 1) {
				this.errors.push('kindly select atleast one category.');
			}
			for (const error in this.errors){
				return this.$noty.warning(this.errors[error]);
				return;
			}

			if(this.name && this.description && this.email && this.phone && this.url && this.city && this.state && this.country){

				let form = new FormData();
				form.append('name',this.name);
				form.append('description',this.description);
				form.append('url',this.url);
				form.append('email',this.email);
				form.append('city',this.city);
				form.append('state',this.state);
				form.append('country',this.country);
				form.append('phone',this.phone);
				form.append('myFile',this.image);
				form.append('category_id',this.selectedCategories);
				for(let i = 0; i < this.selectedCategories.length; i++){
					form.append('category_id[]',this.selectedCategories[i]);
				}
				this.$http.post('/api/businesses', form, config).then(response => {
						console.log(response)
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