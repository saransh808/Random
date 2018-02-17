<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Simplify Trips - Admin</title>
	<meta name="description" content="Simplify Trips - Admin">
	<meta name="author" content="Ghanshyam Parasad">
	<meta name="keyword" content="Admin Panel">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?php echo base_url(); ?>admin-assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>admin-assets/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url(); ?>admin-assets/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url(); ?>admin-assets/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<style type="text/css">

#file{
    color:green;
    padding:5px; border:1px dashed #123456;
    background-color: #f9ffe5;
	width:94px;
}
#upload{
    margin-left: 45px;
}
.post-pics {width: 60%;height: auto;position: relative;}
#noerror{
    color:green;
    text-align: left;
}
#error{
    color:red;
    text-align: left;
}
#img{ 
    width: 25px;
    border: none; 
    height:25px;
    margin-left: -20px;
    margin-bottom: 91px;
}
.abcd{
    text-align: center;
}

.abcd img{
    height:90px;
    width:90px;
    padding: 5px;
    border: 1px solid rgb(232, 222, 189);
	float:left;
	
}

#file1{
    color:green;
    padding:5px; border:1px dashed #123456;
    background-color: #f9ffe5;
	width:94px;
}
#upload1{
    margin-left: 45px;
}

#img1{ 
    width: 25px;
    border: none; 
    height:25px;
    margin-left: -20px;
    margin-bottom: 91px;
}
.abcd1{
    text-align: center;
}

.abcd1 img{
    height:250px;
    width:250px;
    padding: 5px;
    border: 1px solid rgb(232, 222, 189);
	
	
}
#text1 {
    /* display: block; */
    text-align: center;
    margin-left: 224px;
    margin-top: -123px;
}


</style>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Simlify Trips Admin Panel</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?=$username?>								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="<?=base_url()?>admin/logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
	