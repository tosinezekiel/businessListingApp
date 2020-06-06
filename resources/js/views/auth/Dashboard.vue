<template>
    <div>
         <admin-top-nav></admin-top-nav> 
            <side-bar></side-bar>
         <!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-lg-9 col-xl-10 maxw100flex-992">
					<div class="row">
						<!-- -->
						<div class="col-lg-12 mb10">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">Howdy, {{this.$store.getters.name}}</h2>
								<p>We are glad to see you again!</p>
							</div>
						</div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style1">
								<div class="icon"><span class="flaticon "></span></div>
								<div class="detais">
									<div class="timed">2407</div>
									<p>Total Views</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon "></span></div>
								<div class="detais">
									<div class="timed">24</div>
									<p>Total Businesses</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style3">
								<div class="icon"><span class="flaticon-disabled"></span></div>
								<div class="detais">
									<div class="timed">12</div>
									<p>Disabled Businesses</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style4">
								<div class="icon"><span class="flaticon-okay"></span></div>
								<div class="detais">
									<div class="timed">18</div>
									<p>Active Businesses</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt50">
						<div class="col-lg-6 offset-lg-3">
							<div class="copyright-widget text-center">
								<p>© 2020 Business Listing. Made with love.</p>
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
    name:'Dashboard',
    data(){
		return{
			host:''
		}
	},
	mounted(){
	
	}
};
</script>