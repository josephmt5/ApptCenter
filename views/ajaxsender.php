<?
$user = "josephmt5";
$pass = "thompson01";
$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
$query6 = $db->query("SELECT number FROM limiter");
while($row6 = $query6->fetch(PDO::FETCH_ASSOC))
{
    $limit= $row6['number'];
   
}

$select=$db->query("SELECT time FROM windows");




$dayofweek = date('w', strtotime($_GET['date']));
		$query = $db->query("SELECT  count(*) FROM days WHERE day='".(String)$dayofweek."'");
		
		$row = $query->fetchColumn();
		
$query4 = $db->query("SELECT  count(*) FROM holidays WHERE days='".$_GET['date']."'");
		
		$row4 = $query4->fetchColumn();
		
		if($row>0 || $row4>0){
             echo"<option value=>None available Select different day</option>";
        }
			
        else{       
            
            while($row = $select->fetch(PDO::FETCH_ASSOC))
            {
                $query = $db->query("SELECT  count(*) as c FROM datetime WHERE date='".$_GET['date']."' AND time='".$row['time']."'");
				
                while($row2 = $query->fetch(PDO::FETCH_ASSOC))
                {
                if(!isset($row2['c']) || $row2['c'] < $limit)
                {
                    echo"<option value=".$row['time'].">".$row['time']."</option>";
                }

                }
            }

     }

?>
