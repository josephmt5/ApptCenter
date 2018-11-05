<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email</title>
	<style>
		html, body
		{
			background-color: darkred;
			color:white;
		}
	</style>
</head>

<body>
	
	<br>
	
	<form method=post enctype="multipart/form-data">
		subject:<br><input type=text name=subj  ></input><br><br>
		message:<br><textarea rows=10 cols="40" type=text name=mess></textarea><br><br>
	
	<input type=submit name=submit value=Send></input>
	</form>
	
	
	
	
	
	
	
	
	
	<?
if(isset($_POST['submit']))
{
	$subject=$_POST['subj'];
	$message=$_POST['mess'];
	$this->email->from($this->session->userdata("activeEmail"), $this->session->userdata("activeName"));
		$this->email->to("josephmt95@gmail.com");

		$this->email->subject($subject);
		$this->email->message($message);
	
	
	
		$this->email->send();
	redirect("tech/search");
}
	?>
</body>
</html>