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
        </tr>
    </thead>
    <tbody>
	
<?php
	
	$user = "josephmt5";
$pass = "thompson01";
$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
	
		
$query = $db->query("SELECT users.name, users.email, users.phone, users.address, users.state, users.zip, datetime.date, datetime.time,datetime.paid, datetime.dateid FROM users JOIN datetime ON users.userid=datetime.userid WHERE datetime.paid=0 ");
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
	
	
	echo "<td>  <input type=submit value=Pay name='".$row['dateid']."'></input> </td>";
	echo "<td>  <input type=submit value=DELETE name='".$row['name']."'></input> </td>";
	echo "</tr>";
	
	
	if ( isset( $_POST[$row['dateid']]) )
	{
		
	
		$dateid = $row['dateid'];
		
			$claim = $db->query("UPDATE `datetime` SET  paid='1' WHERE dateid='".$dateid."'");
			$claim->execute();		
		redirect("tech/unpaid");

	}
	
	if ( isset( $_POST[$row['name']]) )
		{
			
			
			$dateid = $row['dateid'];
			
			$claim = $db->query("UPDATE `datetime` SET finished='1', paid='1', claimed='1' WHERE dateid='$dateid'");
			$claim->execute();
			redirect("tech/unpaid");

		}


}
		
	
		
		?>
		  </tbody>
		</form>
</body>
