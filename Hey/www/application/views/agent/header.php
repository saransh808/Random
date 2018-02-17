<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to Simplifytrips.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" type="png/jpg" href="images/fevicon.png">
<link href="<?=base_url()?>main-assets/css/awesomplete.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>main-assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>main-assets/css/style.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>main-assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
</head>
<body>
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
	        <li><a href="<?=base_url()?>">Back to Website</a></li>
	        
	        
	          <?php
	          	if($agentauth['agentlogged_in'] == 1){
	          		?>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?=$agentauth['agentfullname']?><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          		
	            	<li><a href="<?=base_url();?>agent">Profile</a></li>
	            	
	            	<li><a href="<?=base_url();?>agent/domestic_trip">Domestic Trip</a></li>
	            	<li><a href="<?=base_url();?>agent/international_trip">International Trip</a></li>
	            	<li><a href="<?=base_url();?>agent/signout?redir=agent">Sign Out</a></li>
	          		<?php
	          	}
	          	else{
	          		?>
	          		<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Account<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          		<li><a href="<?=base_url();?>account/signin?redir=<?=current_url()?>">Sign In</a></li>
	            	<li><a href="<?=base_url();?>account/signup?redir=<?=current_url()?>">Sign Up</a></li>
	          		<?php
	          	} 
	          ?>
	            	            
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>  	
  </div>
</header>