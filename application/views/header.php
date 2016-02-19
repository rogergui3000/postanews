<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PostaNews</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<!-- Le styles -->
        <link href="<?= base_url('assets/css/bootstrap.css') ?>" media="screen" rel="stylesheet" type="text/css">
		<link href="<?= base_url('assets/css/style.css') ?>" media="screen" rel="stylesheet" type="text/css">
		<link href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>" media="screen" rel="stylesheet" type="text/css">
		<link href="<?= base_url('assets/images/favicon.ico') ?>" rel="shortcut icon" type="image/vnd.microsoft.icon">
        <!-- Scripts -->
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/worldClock.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/pintstyle.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/loadImg.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/nicEdit.js') ?>"></script>
<!--[if lt IE 9]><script type="text/javascript" src="<?= base_url('/js/html5.js') ?>"></script><![endif]-->
	
	
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

		<div id="header-wrap">
			 <div id="headercontainer">
				 <div style="float:right;margin-right:12%;display: inline-block;" class="hidex"><i class="fa fa-lg fa-clock"> </i> <span id="theClock"></span></div>
				 <div style="float:left;margin-left:12%;"><span class="text"><i class="fa fa-lg fa-volume-up"></i> Update :</span> <span id="textslide"></span></div>
				 <div style="float:right;margin-right:2%;" class="hidex">
					 <span id="">
						 <input  type="input" style="with:300px;height:23px;top:5px"></input> 
					       <button type="button" class="btn btn-xs btn-default"><i class="fa fa-lg fa-search"></i></button>
					 </span>
			     </div>
			</div>
		</div>
		<br>
       <!-- Navigation -->
	   <div class="navbar navbar-default navbar-static-top no-margin">
      <div class="container">
        
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".header-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand link" href="<?= base_url() ?>">
             PostaNews
        </a>
        </div>
        <div class="collapse navbar-collapse header-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="<?= base_url() ?>" class="link" ><i class="fa fa-lg fa-home"></i> Home</a>
            </li>
            <li >
              <a href="<?= base_url('news') ?>"  class="link"><i class="fa fa-lg fa-newspaper-o"></i> News</a>
              
            </li>
            <li >
              <a href="<?= base_url('feed') ?>"  class="link"><i class="fa fa-lg fa-rss-square"></i> Rss Feed<!--<span class="caret"></span>--></a>
            </li>
          </ul>
			<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
			<p class="navbar-btn navbar-right"><a href="<?= base_url('logout') ?>" target="" class="btn btn-primary navbar-link link"><i class="fa fa-lg fa-power-off"></i> Logout</a></p>
			<p class="navbar-btn navbar-right"><a href="<?= base_url('dashboard') ?>" target="" class="btn btn-primary navbar-link link"><i class="fa fa-lg fa-user"></i> <?php echo $_SESSION['username']; ?> </a></p>
			<?php else : ?>
          	 
			 <p class="navbar-btn navbar-right"><a href="<?= base_url('register') ?>" target="" class="btn btn-primary navbar-link link"><i class="fa fa-lg fa-pencil-square-o"></i> Sign Up</a></p>
			
			<p class="navbar-btn navbar-right"><a href="<?= base_url('login') ?>" target="" class="btn btn-primary navbar-link link"><i class="fa fa-lg fa-user"></i> Login</a></p>
			 <?php endif; ?>
			
     
        </div>
      </div>
    </div>
   


<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
			<div class="container">
       <h1>
		   <a href="<?= base_url('dashboard') ?>" ><i class="fa fa-lg fa-dashboard"></i>  <strong>Dashboard </strong></a>
       </h1>
		   <p class="navbar-btn navbar-right"><i class="fa fa-lg fa-clock"></i><i id="theClock"></i></p>
       <p> A quick way to manage you account and your articles posted.</p>
      </div>
			<?php else : ?>
          	 
			 <div class="page-heading jumbotron clearfix">
      <div class="container">
       <h1>
          PostaNews <strong>Community <i class="fa fa-lg fa-slideshare"></i></strong>
       </h1>
		   <p class="navbar-btn navbar-right"><i class="fa fa-lg fa-clock"></i><i id="theClock"></i></p>
       <p>A quick view of people post informations around the globe in one place.</p>
      </div>
    </div>
  </div> 
			 <?php endif; ?>

<!-- end navigation -->


