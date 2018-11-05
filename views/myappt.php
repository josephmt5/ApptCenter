<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <style>
        html, body, p
		{
			background-image: linear-gradient(to right,#313133, #505052);
 			
				 color: white;
		}
        table
        {
            background-color: white;
            color: black;
			margin-left: 2%;
        }
		
	</style>



    <meta charset="utf-8">
    <title>ApptCenter</title>



</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">ApptCenter</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="http://control.apptcenter.com">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://control.apptcenter.com/index.php/welcome/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<? echo site_url(" welcome/schedule") ?>">
                        <? echo "Schedule";?></a>
                </li>
                 <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <? echo "My Appointments";?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<? $name = $this->session->userdata('activeName'); echo site_url(" welcome/logout") ?>">
                        <? echo "Logout";?></a>
                </li>

            </ul>
            <span class="navbar-text">

            </span>
        </div>
    </nav>
    signed in as:

    <p>
        <? echo $this->session->userdata("activeName"); ?>
    </p>


<script>
    function confirmation(){
    var del=confirm("Are you sure you want to delete this appointment?\nIf you do you may not be able to reschedule for the same time slot.");
    if (del==true){
        return true;
       
    }
     
        return false;
      
   
}
</script>

    <form action="" method="post" onsubmit="return confirmation();">

        <table border="1">
            <thead>
                <tr>
                    <th>name</th>

                    <th>Phone</th>
                    <th>address</th>
                    <th>state</th>
                    <th>zip</th>
                    <th>date</th>
                    <th>time</th>


                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php
	
	$user = "josephmt5";
$pass = "thompson01";
$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
	$runner= $this->session->userdata("activeEmail");
	
$query = $db->query("SELECT users.name, users.email, users.phone, users.address, users.state, users.zip, datetime.date, datetime.time, datetime.finished, datetime.dateid FROM users JOIN datetime ON users.userid=datetime.userid WHERE (datetime.finished=0 OR datetime.paid=0 )AND users.email= '".$runner."'" );
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['name']."&nbsp;&nbsp;&nbsp;</td>";
	
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['phone']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['address']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['state']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['zip']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['date']."&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;&nbsp;".$row['time']."&nbsp;&nbsp;&nbsp;</td>";
	
	
	
	echo "<td> &nbsp;&nbsp;&nbsp; <input  type=submit value=CANCEL name= '".$row['dateid']."'></input>&nbsp;&nbsp;&nbsp; </td>";
	echo "</tr>";
	
	

	if ( isset( $_POST[$row['dateid']])  )
		{
			
			
			$dateid =$row['dateid'];
			
			$claim = $db->query("UPDATE `datetime` SET finished='1', paid='1', claimed='1' WHERE dateid='$dateid'");
			$claim->execute();
			redirect("welcome/myappt");

		}

}

		
	
		
		?>

            </tbody>
        </table>

    </form>
</body>

</html>
