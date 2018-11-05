<!doctype html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<meta name="google-signin-client_id" content="184777192547-tena6f3cfd6rlipnoi3kj40mucheapsj.apps.googleusercontent.com">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




<style>
    html, body, p
		{
			background-image: linear-gradient(to right,#313133, #505052);
 			
				 color: white;
		}
		input
		{
			margin-left: 10px;
		}
		label{
    display: inline-block;
    float: left;
    clear: left;
    width: 250px;
    text-align: right;
			margin-right: 2%;
}
input {
  display: inline-block;
  float: left;
}
	</style>

<head>

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
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <? echo "Schedule";?></a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="<? $name = $this->session->userdata('activeName'); echo site_url(" welcome/myappt") ?>">
                        <?echo "My Appointments";?></a>
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
    <? echo validation_errors(); ?>

    <br>
    <font size="6" color="white">
        <form action="" method="post">
            <section id=area1>
               
              
            </section>
            <section id=area2>
               <label> TEXT NUMBER:</label><input name=phone height="20%" type=number><br><br>
               <label> ADDRESS:</label><input name=address height="20%" type="text"><br><br>
               <label> CITY:</label><input name=city height="20%" type="text"><br><br>
               <label> STATE:</label><select name="state">
                    <option value="GA">GA</option>
                </select>
                <br><br>
               <label> ZIP:</label><select name="zip">
                    <option value="30534">30534</option>
                    <option value="30533">30533</option>
                    <option value="30041">30041</option>
                    <option value="30040">30040</option>
                </select> <br><br>
               <label> PROBLEM:</label><input name=problem height="20%" type="text"><br><br>
            </section>
            <section id=area3>
                <? $effectiveDate=date('Y-m-d');
		$effectiveDate = strtotime("+3 months", strtotime($effectiveDate)); ?>
                <label>DATE:</label><input id=date name=date height="20%" type="date"  min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',$effectiveDate);?>"><br><br>
            </section>
            <section id=area4>
                <label>TIME:</label>
                <select id=time name="time">



                </select>
            </section>

            <br>

            <script>
                $(document).ready(function(e) {
	$("#date").on("change",function(e) {
		$("#time").html("Loading!");
		$.ajax({url: "http://control.apptcenter.com/index.php/ajax/ajaxsender?date="+$("input[name='date']").val()}).done(function(data) {
			$("#time").html(data);
			});
		});
	
		});
	

	</script>


            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="image" name="submit" width="20%" src="../../images/nextf.png">
        </form>
    </font>


    <?php	
	$user = "josephmt5";
		$pass = "thompson01";
		$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);

$errors;
	
	

//https://www.howtogeek.com/howto/27051/use-email-to-send-text-messages-sms-to-mobile-phones-for-free/	
	

		
		
				
		

?>
    <br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>
