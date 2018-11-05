<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
</head>
	
<body>
	
	<? $this->load->helper('url');?>
	<section height="100%">
<ul>
	<li><a href="<?php echo site_url("tech/techs"); ?>">Techs</a></li>
	<li><a href="<?php echo site_url("tech/addtech"); ?>">add tech</a></li>
	<li><a href="<?php echo site_url("tech/unclaimed"); ?>">uncalimed appointments</a></li>
	<li><a href="<?php echo site_url("tech/unfinished"); ?>">unfinished appointments</a></li>
	<li><a href="<?php echo site_url("tech/unpaid"); ?>">unpaid appoinments</a></li>
	<li><a href="<?php echo site_url("tech/search"); ?>">customer Search</a></li>
	<li><a href="<?php echo site_url("tech/add"); ?>">set availability</a></li>
</ul>
	</section>
</body>
</html>