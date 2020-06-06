<template>
    <div>
         <top-nav></top-nav> 
            <!-- Our Blog -->
            <section class="our-blog pb0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="main-title text-center">
                                <h2>{{business.name}}</h2>
                                <p>{{business.description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-4">
                            <div class="for_blog feat_property home9">
                                <div class="thumb">
                                    <img class="img-whp" :src="business.images[0].path" alt="bh1.jpg"  style="width:338px !important;height:216px" >
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p class="text-thm">{{business.name}}</p>
                                        <h4>{{business.description}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-4">
                           
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Business Email: {{ business.email }}</li>
                                <li class="list-group-item">Business Description: {{business.phone }}</li>
                                <li class="list-group-item">Business Url: {{business.url}}</li>
                                <li class="list-group-item">Business Address: {{business.address.city}}, {{business.address.state}}, {{business.address.country}}</li>
                                <li class="list-group-item">Created: {{business.created_at}}</li>
                            </ul>
                            <div class="mt10">
                                <textarea class="form-control" placeholder="review" v-model="review"></textarea>
                            </div>
                            <div class="mt10">
                                <star-rating :star-size=20 v-model="rating"></star-rating>
                            </div>
                            <div class="mt10">
                                <button @click="sendReview(business.id)">Submit Review</button>
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
    name:'Single',
    data(){
        return{
            host:'',
            business:'',
            searchtext:'',
            rating:0,
            review:'',
            errors:[]
        }
    },
    methods:{
        getBusiness(id){
            console.log(id);
			let vm = this
			this.$http({
					'method': 'GET',
					'url': '/api/businesses/'+id
            }).then(response =>{
                vm.business = response.data.data;
                console.log(response.data.data);
            })
        },
        sendReview(id){
            let vm = this;
			if (!this.review) {
				this.errors.push('review is required.');
			}
            if (this.rating < 1) {
				this.errors.push('rating is required.');
            }
            for (const error in this.errors){
				return this.$noty.warning(this.errors[error]);
				return;
			}
            if(this.review && this.rating){
                let form = new FormData();
                form.append('review',this.review);
                form.append('rating',this.rating);
                form.append('business_id',id);
                this.$http.post('/api/review', form).then(response => {
                        vm.$noty.success(response.data.message);
                        vm.rating = 0;
                        vm.review = ''
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
        // location.reload();
        this.getBusiness(this.$route.params.id)
    }
};
</script>
<style scoped>
    .checked {
    color: orange;
    }
    .s-rate:hover{
        cursor:pointer;
    }
</style>