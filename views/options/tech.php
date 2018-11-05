<!doctype html>

<body>
	<style>
	table
		{
			background-color: white;
			width= 80%;
		}
	</style>
	<br><br>
	<form method=post>
	<table border="1">
	<thead>
    	<tr>
        	<th>ID</th>
            <th>Name</th>
			<th>Phone</th>
            <th>Email</th>
			<th></th>
        </tr>
    </thead>
    <tbody>
<?php
		
	$user = "josephmt5";
$pass = "thompson01";
$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
				
		
$query = $db->query("SELECT id, name, phone1, email FROM tech ORDER BY id DESC ");
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['id']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['phone1']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>  <input type=submit value= remove name='".$row['id']."'></input> </td>";
	echo "</tr>";
	
	
	if ( isset( $_POST[$row['id']]) )
{
	
$delete = $db->prepare("DELETE FROM `tech` WHERE ID = ?");
$delete->bindParam(1, $row['id']);

$delete->execute();
echo "Deleted: ".$row['name']."<br>";
header( 'Location: http://control.apptcenter.com/index.php/tech/admin');

}
	



}
?>
		
    </tbody>
</table>
</form>
</body>
</html>