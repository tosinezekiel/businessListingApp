<template>
    <div>
        <!-- Main Header Nav -->
	<header class="header-nav menu_style_home_one style2 menu-fixed main-menu">
		<div class="container-fluid p0">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="images/header-logo.png" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="#" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="images/header-logo2.png" alt="header-logo.png">
		            <img class="logo2 img-fluid" src="images/header-logo2.png" alt="header-logo2.png">
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
		            <li>
		                <a href="/admin/dashboard"><span class="title">Dashboard</span></a>
		                <!-- Level Two-->
		            </li>
	                <li class="list-inline-item add_listing"><a href="/admin/business/create"><span class="flaticon-plus"></span><span class="dn-lg"> Create Listing</span></a></li>
		        </ul>
		    </nav>
		</div>
	</header>

	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1">
				<div class="main_logo_home2 text-center">
		            <img class="nav_logo_img img-fluid mt20" src="images/header-logo2.png" alt="header-logo2.png">
		            <span class="mt20">FindHouse</span>
				</div>
				<ul class="menu_bar_home2">
	                <li class="list-inline-item list_s"><a href="/admin/profile"><span class="flaticon-user"></span></a></li>
					<li class="list-inline-item"><a href="#menu"><span></span></a></li>
				</ul>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li><a href="/admin/dashboard">Home</a></li>
				<li><a href="/admin/businesses">All Businesses</a></li>
				<li><a href="/admin/business/create"><span class="flaticon-plus"></span> Add Business</a></li>
				<li><a href="/admin/categories/create"><span class="flaticon-edit"></span> Manage Categories</a></li>
				<li><a href=""><span class="flaticon-logout"></span> Logout</a></li>
				<!-- <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span class="flaticon-logout"></span> Logout</a></li> -->
			</ul>
		</nav>
	</div>

    </div>
</template>
<script>
export default {
    name:"Topnav"
}
</script>