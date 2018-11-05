<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
 
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>	
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>	
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>	
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>	
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>

<style>
section
	{
		margin-right: 2%;
	}
</style>
<body>
	<section>
	<form method=post>	
	<table border="1"  id='userListing' class='display' margin-right=2%>
	<thead>
    	<tr>
        	<th>name</th>
            <th>email</th>
			<th>Phone</th>
            <th>address</th>
			
			<th>zip</th>
			<th>Email</th>
			
        </tr>
    </thead>
    <tbody>
	
<?php
		
	
	$user = "josephmt5";
$pass = "thompson01";
$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
	
		
$query = $db->query("SELECT * FROM `users`");
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	
	echo "<tr>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['phone']."</td>";
	echo "<td>".$row['address']."</td>";
	
	echo "<td>".$row['zip']."</td>";
	echo "<td>  <input type=submit value=Email name='".$row['userid']."'></input> </td>";
	echo "</tr>";
	
	
	if ( isset( $_POST[$row['userid']]) )
	{
		$this->session->set_flashdata('useremail', $row['email']);
		redirect("tech/email");
		
	}
	
	
}
	
		

		
	
		
		?>
		
		

<script>
$(document).ready( function () {
    $('#userListing').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',
			{
                extend: 'colvis',
                columns: ':not(.noVis)'
            }
        ]
    } );
} );
</script>

		</form>
		</section>
		</body>