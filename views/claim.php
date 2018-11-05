<!doctype html>
<html>
	<head>
<meta charset="utf-8">
<title>Claim Appt</title>
	
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
    <meta name="google-signin-client_id" content="184777192547-tena6f3cfd6rlipnoi3kj40mucheapsj.apps.googleusercontent.com">
  
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	
	<style>
        p
        {
            color: white;
        }
	html, body
		{
			background-image: linear-gradient(to right,#313133, #505052);
		}
		table
		{
			background-color: white;
			margin-right: 2%;
			margin-left: 2%;
		}
        h5
        {
            color:white;
        }
	</style>
	
	</head>
	<body>
		
			
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="http://control.apptcenter.com">ApptCenter</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<? echo site_url("tech/day"); ?>">My Schedule</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<? echo site_url("tech/claim"); ?>">Claim<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<? echo site_url("tech/admin"); ?>">Operator options</a>
      </li>
		<li class="nav-item">
        <a class="nav-link" href="<? echo site_url("welcome/logout"); ?>">LogOut
</a>
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
	<form method=post>
		<input name=move hidden=true type=text id=move></input>
	<table border="1">
	<thead>
    	<tr>
        	<th>name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>state&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>zip&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th></th>
        </tr>
    </thead>
    <tbody>
		
<?php
	
	$user = "josephmt5";
$pass = "thompson01";
$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
	
		
$query = $db->query("SELECT users.name, users.email, users.phone, users.address, users.state, users.zip, datetime.date, datetime.time,datetime.claimed, datetime.dateid FROM users JOIN datetime ON users.userid=datetime.userid WHERE datetime.claimed=0 ");
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
	echo "<td>&nbsp;&nbsp;&nbsp;  <input type=submit value=CLAIM name='".$row['dateid']."'></input> &nbsp;&nbsp;&nbsp;</td>";
	echo "</tr>";
	
	
	if ( isset( $_POST[$row['dateid']]) )
{
		
	
	$email=$this->session->userdata('activeEmail');
	
		
	print($row['dateid']);
	$dateid = $row['dateid'];
	

takeappt($email,$dateid);
		$this->email->from('DoNotReply@apptcenter.com', 'your appt');
		$this->email->to($row['email']);

		$this->email->subject('your appt on '.$_POST['date']);
		$this->email->message("
		Dear ".$row['name'].", \n This email is to inform you that you appointment has been confirmed on ".$row['date']." \n you can expext a visit from ".$this->session->userdata('activeName')." between ".$row['time']
		
		);
		$this->email->send();		
		

header( 'Location: http://control.apptcenter.com/index.php/tech/claim');

}
	



}
		function takeappt($email,$dateid)
		{
			
		$user = "josephmt5";
		$pass = "thompson01";
		$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
	
			$claim = $db->prepare("UPDATE `datetime` SET techemail='$email', claimed='1' WHERE dateid='$dateid'");

			$claim->execute();
			
			
			
			
			
		}
?>
		
    </tbody>
</table>
</form>	
</body>
</html>