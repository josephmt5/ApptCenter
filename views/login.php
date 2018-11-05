<?
if(isset($_POST['activeName']))
{
	$this->session->set_userdata('activeName', $_POST['activeName']);
	$this->session->set_userdata('activeEmail', $_POST['activeEmail']);
	redirect("tech/claim");

}

?>
<!doctype html>
<html>
	
<head>
<meta charset="utf-8">
<title>Login</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta name="google-signin-client_id" content="184777192547-tena6f3cfd6rlipnoi3kj40mucheapsj.apps.googleusercontent.com">
   
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="/auth.js"></script>

	<script src="../../auth.js"></script>
	<style>
	html, body
		{
			background-image: linear-gradient(to right,#313133, #505052);
			align-content: center;
			color: white;
			
		}
		#container {
    width: 50%;
    background-color: #ffcc33;
    margin: auto;
}
#first {
    width: 25%;
    float: left;
    height: 300px;
        margin-top: 3%;
}
#second {
    width: 25%;
    float: left;
    height: 300px;
    
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
        <a class="nav-link" href="http://control.apptcenter.com">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://control.apptcenter.com/index.php/welcome/login">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://control.apptcenter.com/index.php/welcome/schedule">Schedule</a>
      </li>
    </ul>
    <span class="navbar-text">
      
    </span>
  </div>
</nav>
		<br><br><br><br>
        
		<form method="post" id="loginForm">
			<input type=text hidden=true name=activeName id=activeName></input>
			<input type=text hidden=true name=activeEmail id=activeEmail></input>
		</form>
	<div id="container" >
		<div id="first" class="g-signin2" data-onsuccess="onSignIn"></div>
			
			
			<div id="second">
			<form float=right method=post>
				<lable>username</lable><input type=text name=username></input><br>
				<lable>password</lable><input type=password name=password></input><br>
				<input type=submit name=submit></input>

			</form>
</div>
</div>	
<?
if ( isset( $_POST['submit'] ) )
	{
		if(isset ($_POST['username']) && strlen(trim($_POST['username']))>0){}
		else{$errors = "*Please enter your username<br>";}
		
		if(isset ($_POST['password']) && strlen(trim($_POST['password']))>0){}
		else{$errors .= "*Please enter your password<br>";}
	
		
		
    
		if($_POST['password']!="jetisawesome")
		{$errors = "*incorect password";}
		
		else if($_POST['username']=="testuser" && $_POST['password']=="jetisawesome")
        {
			$this->session->set_userdata('activeName', "Test User");
		$this->session->set_userdata('activeEmail',"TestUser@test.com");
		redirect("tech/claim");
        }
    else if($_POST['username']=="testadmin" && $_POST['password']=="jetisawesome")
        {
			$this->session->set_userdata('activeName', "Test Admin");
		$this->session->set_userdata('activeEmail',"TestAdmin@test.com");
		redirect("tech/claim");
        }
			
		}
		
		

		?>

		
		<br><br><br><br>
	
		
	</body>

</html>