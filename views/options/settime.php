<!doctype html>
<html>
<body>
	<style>
        html, body
        {
            color:white;
        }
	table
		{
			background-color: white;
            color:black;
		}
        hr
        {
           line-height: 5%;
            color: white;
            
        }
	</style>
<?php
	$user = "josephmt5";
	$pass = "thompson01";
	$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);	
?>
	<form method=post>
	<table border="1">
	<thead>
    	<tr>
        	<th>Times</th>
            <th>Actions</th>
			
        </tr>
    </thead>
    <tbody>
<?php
		$errors="";
	$user = "josephmt5";
$pass = "thompson01";
$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
				
	
$query = $db->query("SELECT time FROM windows");
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['time']."</td>";
	
	echo "<td>  <input type=submit value=remove name='".$row['time']."'></input> </td>";
	echo "</tr>";
	
	
	if ( isset( $_POST[$row['time']]) )
{
	
$delete = $db->prepare("DELETE FROM `windows` WHERE time='".$row['time']."'");

$delete->execute();
echo "Deleted: ".$row['time']."<br>";
header( 'Location: http://control.apptcenter.com/index.php/tech/add');

}
	



}
?>
		</form>	
    </tbody>
</table>
	<br>
	add a window (6:00am-8:00am)
	<form  method="post">
	
		<input name=time height="20%" type="text"><br>
		<br>
		<input type="submit" name="submit" Value=submit></input>
			</form>
	
		<br><br>

<hr >

<table border="1">
	<thead>
    	<tr>
        	<th>Current Limit</th>
            
			
        </tr>
    </thead>
    <tbody>
<?php
		
				
	
$query = $db->query("SELECT number FROM limiter");
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['number']."</td>";
	
	
	echo "</tr>";
	
	
}



?>
    </tbody>
</table>
<br>
How many appointments will you allow in each window?
        
	<form  method="post">
	
		<input name=limit height="20%" type="number"><br>
		<br>
		<input type="submit" name="submit6" Value=submit></input>
			</form>
	
	<hr>
<?php	
if ( isset( $_POST['submit6'] ) )
	{
		if(isset ($_POST['limit']) && strlen(trim($_POST['limit']))>0)
		{
			$limit =$_POST['limit'];
				
            $insert = $db->prepare("TRUNCATE limiter");
	       $insert->execute();		
            $insert = $db->prepare("INSERT INTO limiter ( number ) VALUES ( ?)");
				$insert->bindParam(1, $limit);

				$insert->execute();
				header( 'Location: http://control.apptcenter.com/index.php/tech/add' );
		}
		else{$errors = "*Please enter your limit<br>";}
	}
		

	echo "<font color='blue' size='5'>&nbsp;&nbsp;&nbsp;&nbsp;$errors</font>";	
	
	if ( isset( $_POST['submit'] ) )
	{
		if(isset ($_POST['time']) && strlen(trim($_POST['time']))>0)
		{
			$time =$_POST['time'];
				$insert = $db->prepare("INSERT INTO windows ( time ) VALUES ( ?)");
				$insert->bindParam(1, $time);

				$insert->execute();
				header( 'Location: http://control.apptcenter.com/index.php/tech/add' );
		}
		else{$errors = "*Please enter your time<br>";}
	}
		
			
			
	
?>

<br>

<table border="1">
	<thead>
    	<tr>
        	<th>Days you are closed</th>
           
			
        </tr>
    </thead>
    <tbody>
<?php
		
				
	
$query = $db->query("SELECT day FROM days");
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>".getday($row['day'])."</td>";
	
	
	echo "</tr>";
	
	
	
	



}
		function getDay($w){
			$w=(int)$w;
			
    $dowMap = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    
    return $dowMap[$w];
}
?>
		</form>	
    </tbody>
</table>
	
	<br>
What days do you NOT want to take appointments<br>
<form method=post>
	
	
	<input type="checkbox" name="monday" value="2">Monday<br>
	<input type="checkbox" name="tuesday" value="3"> Tuesday<br>
	<input type="checkbox" name="wednesday" value="4"> Wednesday<br>
	<input type="checkbox" name="thursday" value="5"> Thursday<br>
	<input type="checkbox" name="friday" value="6"> Friday<br>
	<input type="checkbox" name="saturday" value="7"> Saturday<br>
	<input type="checkbox" name="sunday" value="1"> Sunday<br>
	<input type="submit" name="submit1" Value=submit></input>
</form>
	
<?
if ( isset( $_POST['submit1'] ) ){
	
	$insert = $db->prepare("TRUNCATE days");
	$insert->execute();			
	
	
if(isset ($_POST['monday']))
{
	$insert = $db->prepare("INSERT INTO days ( day ) VALUES ( '1')");
	$insert->execute();			

}
	else
	{
		$delete = $db->prepare("DELETE FROM `days` WHERE day='1'");

$delete->execute();
	}
	
	if(isset ($_POST['tuesday']))
{
	$insert = $db->prepare("INSERT INTO days ( day ) VALUES ( '2')");
	$insert->execute();			

}
	else
	{
		$delete = $db->prepare("DELETE FROM `days` WHERE day='2'");

$delete->execute();
	}
	
	if(isset ($_POST['wednesday']))
{
	$insert = $db->prepare("INSERT INTO days ( day ) VALUES ( '3')");
	$insert->execute();			

}
	else
	{
		$delete = $db->prepare("DELETE FROM `days` WHERE day='3'");

$delete->execute();
	
	}
	
	if(isset ($_POST['thursday']))
{
	$insert = $db->prepare("INSERT INTO days ( day ) VALUES ( '4')");
	$insert->execute();			

}
	else
	{
		$delete = $db->prepare("DELETE FROM `days` WHERE day='4'");

$delete->execute();
	
	}
	
	if(isset ($_POST['friday']))
{
	$insert = $db->prepare("INSERT INTO days ( day ) VALUES ( '5')");
	$insert->execute();			

}
	else
	{
		$delete = $db->prepare("DELETE FROM `days` WHERE day='5'");

$delete->execute();
	
	}
	
	if(isset ($_POST['saturday']))
{
	$insert = $db->prepare("INSERT INTO days ( day ) VALUES ( '6')");
	$insert->execute();			

}
	else
	{
		$delete = $db->prepare("DELETE FROM `days` WHERE day='6'");

$delete->execute();
	
	}
	
	
	
	
	if(isset ($_POST['sunday']))
{
	$insert = $db->prepare("INSERT INTO days ( day ) VALUES ( '0')");
	$insert->execute();			

}
	else
	{
		$delete = $db->prepare("DELETE FROM `days` WHERE day='0'");

$delete->execute();
	
	}
	
	header( 'Location: http://control.apptcenter.com/index.php/tech/add' );
	
	
	
}
?>
<hr>
<br>
<br>
<form method=post>
<table border="1">
	<thead>
    	<tr>
        	<th>scheduled holidays</th>
           <th></th>
			
        </tr>
    </thead>
    <tbody>
<?php
		
				
	
$query = $db->query("SELECT days FROM holidays");
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['days']."</td>";
	echo "<td>  <input type=submit value=remove name='".$row['days']."'></input> </td>";
	echo "</tr>";
	
	if ( isset( $_POST[$row['days']]) )
{
	
$delete = $db->prepare("DELETE FROM `holidays` WHERE days='".$row['days']."'");

$delete->execute();
echo "Deleted: ".$row['days']."<br>";
header( 'Location: http://control.apptcenter.com/index.php/tech/add');

}
	
}
		
		?>
	</tbody>
</table>
</form>
		<br>
add a holiday<br>
		<form method=post>
			  <? $effectiveDate=date('Y-m-d');
		$effectiveDate = strtotime("+3 months", strtotime($effectiveDate)); ?>
			<label>DATE:</label><input id=date name=date height="20%" type="date"  min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',$effectiveDate);?>"><br><br>
           
			<input type="submit" name="submit9" Value=submit></input>
	</form>
<?
if(isset ($_POST['submit9']))
{
	$insert = $db->prepare("INSERT INTO holidays ( days ) VALUES ( '".$_POST['date']."')");
	$insert->execute();			
header( 'Location: http://control.apptcenter.com/index.php/tech/add');
}
?>


<hr>
<br>
<br>
<form method=post>
<table border="1">
	<thead>
    	<tr>
        	<th>Accepted zip codes</th>
           <th></th>
			
        </tr>
    </thead>
    <tbody>
<?php
		
				
	
$query = $db->query("SELECT zip FROM codes");
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['zip']."</td>";
	echo "<td>  <input type=submit value=remove name='".$row['zip']."'></input> </td>";
	echo "</tr>";
	
	if ( isset( $_POST[$row['zip']]) )
{
	
$delete = $db->prepare("DELETE FROM `codes` WHERE zip='".$row['zip']."'");

$delete->execute();
echo "Deleted: ".$row['zip']."<br>";
header( 'Location: http://control.apptcenter.com/index.php/tech/add');

}
	
}
		
		?>
	</tbody>
</table>
</form>
		<br>
add a accepted zip code<br>
		<form method=post>
			  
			<label>Zip:</label><input id=zip name=zip2 height="20%" type="int"  ><br><br>
           
			<input type="submit" name="submit93" Value=submit></input>
	</form>
<?
if(isset ($_POST['submit93']) )
{
	if(strlen($_POST['zip2'])==5)
	{
	$insert2 = $db->prepare("INSERT INTO codes ( zip ) VALUES ( '".$_POST['zip2']."')");
	$insert2->execute();			
header( 'Location: http://control.apptcenter.com/index.php/tech/add');
	}
	
	else
{
	echo "*Please enter a valid zip code";
}
}

?>


<br><br><br><br><br><br><br><br><br>
		

</body>
</html>