<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
	<style>
	html, body
		{
			background-image: linear-gradient(to right,#313133, #505052);
		}
        p
        {
            color:white;
        }
		
	</style>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	
<style>
	.content
		{
			align-content: left;
			float: right;
			width:78%;
			
		}
		.menu
		{
			align-content: left;
			float: left;
			width:20%;
			height: 100%;
			background-color: white;
			
		}
		html, body
		{
			background-color: darkred;
		}
	
	table
	{
		background-color: white;
	}
	</style>

</head>

<body>
	<div hidden=true class="g-signin2" data-onsuccess="isSignedinAuth"></div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="http://control.apptcenter.com">Control</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<? echo site_url("tech/day"); ?>">My Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<? echo site_url("tech/claim"); ?>">Claim<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="">Operator options</a>
      </li>
		<li class="nav-item">
        <a class="nav-link" onclick="signOut();" href="http://control.apptcenter.com/">LogOut</a>
      </li>
    </ul>
    <span class="navbar-text">
      
    </span>
  </div>
</nav>
    <h5>
	<p>signed in as:</p>
		
		<p><? echo $this->session->userdata("activeName"); ?></p>
		
	</h5>
	<?
	$user = "josephmt5";
$pass = "thompson01";
$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
	?>
			
	<div class="mainContent">
		<div class="menu"><?php $this->load->view("adminmenu");?></div>
		<div class="content"><?php $this->load->view($view); ?></div>
	</div>
</body>
</html>