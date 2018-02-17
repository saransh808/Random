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
	      	<?php
	      		if($this->uri->segment(2) == 'signin'){
	      			?>
	      			<li><a href="<?=base_url()?>account/signup?redir=<?=$_GET['redir']?>">Sign Up</a></li>
	      			<?php
	      		}
	      		else if($this->uri->segment(2) == 'signup'){
	      			?>
	      			<li><a href="<?=base_url()?>account/signin?redir=<?=$_GET['redir']?>">Sign In</a></li>
	      			<?php
	      		}
	      	?>
	        
	        
	      </ul>
	    </div>
	  </div>
	</nav>  	
  </div>
</header>