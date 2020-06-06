<template>
<div>
<!-- Main Header Nav -->
	<header class="header-nav menu_style_home_one home9 navbar-scrolltofixed stricky main-menu" id="myHeader">
		<div class="container-fluid p0">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" :src="'//'+host+'/images/header-logo.png'" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="/" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" :src="'//'+host+'/images/header-logo.png'" alt="header-logo.png">
		            <img class="logo2 img-fluid" :src="'//'+host+'/images/header-logo2.png'" alt="header-logo2.png">
		            <span>FindHouse</span>
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
		            <li>
		                <a href="/"><span class="title">Home</span></a>
		                <!-- Level Two-->
		            </li>
		            <li>
		                <a href="/businesses"><span class="title">Listing</span></a>
		                <!-- Level Two-->
		            </li>
	                <!-- <li class="list-inline-item list_s"><a href="#" class="btn flaticon-user" > <span class="dn-lg">Login</span></a></li> -->
	                <li class="list-inline-item add_listing"><a href="/login"><span class="flaticon-login"></span><span class="dn-lg"> Login</span></a></li>
		        </ul>
		    </nav>
		</div>
	</header>

	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0 zi9">
		<div class="mobile-menu">
			<div class="header stylehome1">
				<div class="main_logo_home2 text-center">
		            <img class="nav_logo_img img-fluid mt20" :src="'//'+host+'/images/header-logo2.png'" alt="header-logo2.png">
		            <span class="mt20">FindHouse</span>
				</div>
				<ul class="menu_bar_home2">
	                <li class="list-inline-item list_s"><a href="page-register.html"><span class="flaticon-user"></span></a></li>
					<li class="list-inline-item"><a href="#menu"><span></span></a></li>
				</ul>
			</div>
		</div>
		<!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li><a href="/"><span>Home</span></a></li>
				<li><a href="/businesses"><span>Listing</span></a></li>
				<li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="/login"><span class="flaticon-plus"></span> Login</a></li>
			</ul>
		</nav>
	</div> 
</div>
</template>
<script>
    export default {
		name:'Header',
		data(){
			return{
				host:'',
			}
		},
		mounted(){
			this.host = window.location.host;
		}
    }
</script>
<style scoped>
	#myHeader{
	z-index: 1000;
    position: fixed;
    top: 0px;
    margin-left: 0px;
    width: 1263.33px;
	left: 0px;
	}
</style>