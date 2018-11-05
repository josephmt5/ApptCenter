<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>ApptCenter</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        html, body
		{
			background-image: linear-gradient(to right,#313133, #505052);
			color:white;
		}
        img.displayed
        {
            display: block;
             margin-left: auto;
              margin-right: auto;
        }
	</style>

</head>





<!--/////////////////////////////////////////////////////////////////////////////////////-->

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">ApptCenter</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://control.apptcenter.com/index.php/welcome/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<? $name = $this->session->userdata('activeName'); echo site_url(" welcome/schedule") ?>">
                        <?
	
	if(!empty($name))
		
   {
	echo "Schedule";

   }
	?></a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<? $name = $this->session->userdata('activeName'); echo site_url(" welcome/myappt") ?>">
                        <?
	
	if(!empty($name))
		
   {
	echo "My Appointments";

   }
	?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<? $name = $this->session->userdata('activeName'); echo site_url(" welcome/logout") ?>">
                        <?
	
	if(!empty($name))
		
   {
	echo "Logout";

   }
	?></a>
                </li>



            </ul>
            <span class="navbar-text">

            </span>
        </div>
    </nav>
    <?
	
	if(!empty($name))
		
   {
	echo "logged in as ".$name;

   }
	?>
    <br>
  <?
    $name = $this->session->userdata('activeName');
    if(!empty($name))
		
   {
	 echo "<a href='http://control.apptcenter.com/index.php/welcome/schedule'>
        <img class='displayed' width='70%'  src=../../images/makef.png ></img>
    </a>";

   }
    else
    {
        echo "<a href='http://control.apptcenter.com/index.php/welcome/login'>
        <img class='displayed' width='70%'  src=../../images/loginf.png ></img>
    </a>";
    }
    ?>


    <img width="100%" src="../../images/nobgf.png">

    </img>
      <?
    $name = $this->session->userdata('activeName');
    if(!empty($name))
		
   {
	 echo "<a href='http://control.apptcenter.com/index.php/welcome/schedule'>
        <img class='displayed' width='70%'  src=../../images/makef.png ></img>
    </a>";

   }
    else
    {
        echo "<a href='http://control.apptcenter.com/index.php/welcome/login'>
        <img class='displayed' width='70%'  src=../../images/loginf.png ></img>
    </a>";
    }
    ?>

    

    <br>
    <br><br><br>


    <br><br><br><br><br><br><br>
</body>

</html>
