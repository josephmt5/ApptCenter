<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>add tech</title>
	
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta charset="utf-8">
<title>ApptCenter</title>
	
	
	<br>
	<font size="6" color="white">
		<section id=area>
		<form action="" method="post">
	
		NAME:<input name=name height="20%" type="text"><br><br>
		GOOGLE EMAIL:<input name=email height="20%" type="text"><br><br>
	
		PHONE:<input name=phone1 height="20%" type="text"><br><br>
		PROVIDER:<select name=provider>
			<option></option>
		<option value=@VTEXT.COM>STRAIGHT TALK</option>
		<option value=@vtext.com>Verizon</option>
		<option value=@vmobl.com>Virgin Mobile</option>
		<option value=@email.uscc.net>U.S. Cellular</option>
		<option value=@tmomail.net>T-Mobile</option>
		<option value=@page.nextel.com>Sprint (Nextel) </option>
		<option value=@messaging.sprintpcs.com>Sprint (PCS) </option>
		<option value=@mymetropcs.com>Metro PCS</option>
		<option value=@sms.mycricket.com>Cricket</option>
		<option value=@myboostmobile.com>Boost Mobile </option>
		<option value=@cingularme.com> AT-T (formerly singular) </option>
		<option value=@txt.att.net> ATT Wireless</option>
		<option value=@text.wireless.alltel.com> Alltel Wireless</option>
			</select>
			
		</section>
		
		<br>
<br>
	<br>
	<input type="image" name="submit" width="20%" src="../../images/nextf.png">
			</form>
		</font>
		
	
	
<?php	


	$user = "josephmt5";
$pass = "thompson01";
$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
			
	//echo "HERE1<br>";
	
	//print_r($_POST);
	if ( isset( $_POST['submit_x'] ) )
	{
		if(isset ($_POST['name']) && strlen(trim($_POST['name']))>0){}
		else{$errors = "*Please enter your name<br>";}
		
		if(isset ($_POST['email']) && strlen(trim($_POST['email']))>0){}
		else{$errors .= "*Please enter your email<br>";}
		
		if(isset ($_POST['phone1']) && strlen(trim($_POST['phone1']))>0){}
		else{$errors = "*Please enter your Phone Number<br>";}
		
		if(isset ($_POST['provider']) && strlen(trim($_POST['provider']))>0){}
		else{$errors = "*Please enter your Phone Provider<br>";}
		
		echo "<font color='blue' size='5'>&nbsp;&nbsp;&nbsp;&nbsp;$errors</font>";
		
		if(
			isset ($_POST['name']) && strlen(trim($_POST['name']))>0&&
			isset ($_POST['email']) && strlen(trim($_POST['email']))>0 && 
			isset ($_POST['phone1']) && strlen(trim($_POST['phone1']))>0 &&
			isset ($_POST['provider']) && strlen(trim($_POST['provider']))>0 
			
			) {
				$name =$_POST['name'];
				$email = strtolower(trim($_POST['email']));
				$phone=$_POST['phone1'];
				$provider=$_POST['provider'];
				
				
		
			
		
		

			
			//print_r($db);
			
		
			$insert = $db->prepare("INSERT INTO tech ( name , email , phone1, provider ) VALUES ( ?, ?, ?, ? )");
$insert->bindParam(1, $name);
$insert->bindParam(2, $email);
$insert->bindParam(3, $phone);
$insert->bindParam(4, $provider);

			//print_r($insert);
$insert->execute();
header( 'Location: http://control.apptcenter.com/index.php/tech/admin' );
			/*
			$arr = get_defined_vars();
print_r($arr);*/
	}
		
	}
	
?>
	<br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>