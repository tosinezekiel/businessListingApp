<template>
    <div>
         <top-nav></top-nav> 
            <!-- Our Blog -->
            <section class="our-blog pb0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="main-title text-center">
                                <h2>All Businesses</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="display">
                        <p class="text-thm">No Record Found</p>
                    </div>
                    <div class="row" v-else>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <p>{{businesses.length }} record(s) found</p>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-4" v-for="(business,index) in businesses" :key="index">
                            <div class="for_blog feat_property home9">
                                <div class="thumb">
                                    <img class="img-whp" :src="business.images[0].path" alt="bh1.jpg"  style="width:338px !important;height:216px" >
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p class="text-thm">{{business.name}}</p>
                                        <h4>{{business.description}}</h4>
                                    </div>
                                    <div class="fp_footer">
                                        <ul class="fp_meta float-left mb0">
                                            <!-- <li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li> -->
                                            <li class="list-inline-item"><a href="#" class="btn btn-secondary" style="color:#fff;">view</a></li>
                                        </ul>
                                        <a class="fp_pdate float-right" href="#">{{business.created_at}}</a>
                                    </div>
                                </div>
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
    name:'Business',
    data(){
        return{
            host:'',
            businesses:'',
            searchtext:'',
            display:false
        }
    },
    methods:{
        getBusinesses(){
			let vm = this
			this.$http({
					'method': 'GET',
					'url': '/api/businesses/search/'+ this.$route.params.searchtext
				}).then(response =>{
                    vm.businesses = response.data.data;
                    if(vm.businesses.length < 1){
                        vm.display = true
                    }
                    console.log(response);
				})
		},
    },
    mounted(){
        // location.reload();
        this.getBusinesses()
    }
};
</script>