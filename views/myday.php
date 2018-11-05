<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>day View</title>
	
	
	
	
	
   
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<style>
	html, body
		{
		background-image: linear-gradient(to right,#313133, #505052);
			
		}
        h5
        {
            color:white;
        }
		table
		{
			margin-left: 2%;
			margin-right: 2%;
			background-color: white;
		}
		
	</style>
	
	
	
	
	
	
</head>

<body>
	<div hidden=true class="g-signin2" data-onsuccess="isSignedinAuth"></div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="http://control.apptcenter.com">ApptCenter</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active ">
        <a class="nav-link" href="">My Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<? echo site_url("tech/claim"); ?>">Claim<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<? echo site_url("tech/admin"); ?>">Operator options</a>
      </li>
		<li class="nav-item">
        <a onclick="signOut();" class="nav-link" href="<?  echo site_url(" welcome/logout") ?>">LogOut</a>
      </li>
    </ul>
    <span class="navbar-text">
      
    </span>
  </div>
</nav>
    <h5>
	signed in as:
		
		<p><? echo $this->session->userdata("activeName"); ?></p>
        </h5>
	<?
	$user = "josephmt5";
$pass = "thompson01";
$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass); 
	?>
	
	<table class="table-striped" border="1">
	<thead>
    	<tr>
        	<th>name</th>
            <th>email</th>
			<th>Phone</th>
            <th>address</th>
			<th>state</th>
			<th>zip</th>
			<th>date</th>
			<th>time</th>
			<th></th>
			<th></th>
        </tr>
    </thead>
    <tbody >
		<form method=post>
<?php
		
			
	

	$email = trim($this->session->userdata('activeEmail'));
		
			
		
$query = $db->query("SELECT users.name, users.email, users.phone, users.address, users.state, users.zip, datetime.date, datetime.techemail, datetime.time, datetime.finished, datetime.claimed, datetime.userid, datetime.paid, datetime.dateid FROM users JOIN datetime ON users.userid=datetime.userid  WHERE datetime.techemail ='". $email."' AND ( datetime.finished=0 OR datetime.paid=0 ) ORDER BY datetime.date DESC"); 

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['name']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['email']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['phone']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['address']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['state']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['zip']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['date']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['time']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>" ;
		if($row['finished']=='0')
			{echo "&nbsp;&nbsp;&nbsp;<input type=submit value=FINISH name='".$row['dateid']."'></input>&nbsp;&nbsp;&nbsp;";}
		else { echo "FINISHED";} 
		echo "</td>";
	echo "<td>" ;
	if($row['paid']=='0')
		{echo "&nbsp;&nbsp;&nbsp;<input type=submit value=PAID name='".$row['userid']."'></input> &nbsp;&nbsp;&nbsp;";}
	else
	{echo "PAID";}
	echo "</td>";
	echo "</tr>";
	
	
	if ( isset( $_POST[$row['dateid']]) )
	{
		//print($row['dateid']);
		$dateid = $row['dateid'];
		$claim = $db->prepare("UPDATE `datetime` SET finished=1 WHERE dateid='$dateid'");
			$claim->execute();
		header( 'Location: http://control.apptcenter.com/index.php/tech/day');

	}

	
	if ( isset( $_POST[$row['userid']]) )
	{
		
		//print($row['dateid']);
		$dateid = $row['dateid'];
		$claim = $db->prepare("UPDATE `datetime` SET paid=1 WHERE dateid='$dateid'");
			$claim->execute();
		header( 'Location: http://control.apptcenter.com/index.php/tech/day');

	}
	
	
	
	
	
}
	
	?>
	
	
	</form>
	
	
</body>
</html>