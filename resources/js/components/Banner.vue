<template>
    <!-- Home Design -->
	<section class="home-nine">
		<div class="container">
			<div class="row posr">
				<div class="col-lg-8 offset-lg-2">
					<div class="home_content home7">
						<div class="home-text text-center">
							<h2 class="fz55">Discover your place to live</h2>
							<p class="fz18 color-white">Get started in few clicks.</p>
						</div>
						<div class="home_adv_srch_opt home9">
							<div class="home1-advnc-search home9">
								<ul class="h1ads_1st_list mb0">
									<li class="list-inline-item">
									    <div class="form-group">
									    	<input type="text" class="form-control" v-model="searchtext" id="exampleInputName1" placeholder="Enter keyword...">
									    </div>
									</li>
									<li class="list-inline-item">
										<div class="search_option_button">
										    <button type="submit" class="btn btn-thm" @click="searchForm">Search</button>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>
<script>
export default {
    data(){
        return{
            searchtext:''
        }
    },
    methods:{
        searchForm(e){
			e.preventDefault();
			if(!this.searchtext){
				this.$noty.warning('kindly enter a search keyword');
				return;
			}
            let name = encodeURI(this.searchtext);
            this.$router.push('/business/search-result/'+name);
        }
	},
	mounted(){
		
	}
}
</script>