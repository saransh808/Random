<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to Simplifytrips.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" type="png/jpg" href="images/fevicon.png">
<link href="<?=base_url()?>main-assets/css/awesomplete.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>main-assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="<?=base_url()?>main-assets/css/style.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>main-assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-81727144-1', 'auto');
  ga('send', 'pageview');

</script>
<header>  
  <div class="header-sec">
  	<nav class="">
	  <div class="">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?=base_url()?>home">
	      	<img src="<?=base_url()?>main-assets/images/logo.png" alt="" title="" class="img-responsive">
	      </a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">	      
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="<?=base_url()?>home/contact">Contact Us</a></li>
	        
	        
	          <?php
	          	if($userauth['userlogged_in'] == 1){
	          		?>
	        
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?=$userauth['userfullname']?><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          		<li><a href="<?=base_url();?>account/"><?=$userauth['userfullname']?></a></li>
	            	<li><a href="<?=base_url();?>account/signout?redir=<?=current_url()?>">Sign Out</a></li>
	           </ul>
	        </li>
	          		<?php
	          	}
	          	else{
	          		?>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Login/Signup<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          		<li><a href="<?=base_url();?>account/signin?redir=<?=current_url()?>">Sign In</a></li>
	            	<li><a href="<?=base_url();?>account/signup?redir=<?=current_url()?>">Sign Up</a></li>
	          </ul>
	        </li>
	          		<?php
	          	} 
	          ?>
	            	            
	          
	      </ul>
	    </div>
	  </div>
	</nav>  	
  </div>
</header>