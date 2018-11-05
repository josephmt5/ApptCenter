<!doctype html>


<body>
	
	
	
	<form method=post>
		
	<table border="1">
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
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['phone']."</td>";
	echo "<td>".$row['address']."</td>";
	echo "<td>".$row['state']."</td>";
	echo "<td>".$row['zip']."</td>";
	echo "<td>".$row['date']."</td>";
	echo "<td>".$row['time']."</td>";
	echo "<td><select name='time'>";
	echo	"<option></option>";
		$gettechs = $db->query("SELECT name, email FROM tech");
	
		while($tech = $gettechs->fetch(PDO::FETCH_ASSOC))
		{
  			echo	"<option value='".$tech['email']."'>".$tech['name']."</option>";
			
		}
  				
		echo "</select> </td>";
	echo "<td>  <input type=submit value=ASIGN name='".$row['dateid']."'></input> </td>";
	echo "<td>  <input type=submit value=DELETE name='".$row['name']."'></input> </td>";
	echo "</tr>";
	
	
	if ( isset( $_POST[$row['dateid']]) )
	{
		
		$techemail= trim($_POST['time']);
		$dateid = $row['dateid'];
		
			$claim = $db->query("UPDATE `datetime` SET techemail='".$techemail."', claimed='1' WHERE dateid='".$dateid."'");
			$claim->execute();	
		
		$this->email->from('DoNotReply@apptcenter.com', 'your appt');
		$this->email->to($row['email']);

		$this->email->subject('your appt on '.$row['date']);
		
		$gettechs1 = $db->query("SELECT name, email FROM tech WHERE email='".$techemail."'");
	
		while($tech1 = $gettechs1->fetch(PDO::FETCH_ASSOC))
		{
			$techname= $tech1['name'];
		}
		$this->email->message("
		Dear ".$row['name'].", \n This email is to inform you that you appointment has been confirmed on ".$row['date']." \n you can expext a visit from ".$techname." between ".$row['time']
		
		);
		$this->email->send();		
		
		//redirect("tech/unclaimed");

	}
	
	if ( isset( $_POST[$row['name']]) )
		{
			
			
			
			$dateid = $row['dateid'];
			
			$claim = $db->query("UPDATE `datetime` SET finished='1', paid='1', claimed='1' WHERE dateid='$dateid'");
			$claim->execute();
			redirect("tech/unclaimed");

		}


}
		
	
		
		?>
		</tbody>
		</form>
</body>
