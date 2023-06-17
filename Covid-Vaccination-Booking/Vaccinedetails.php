<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Covid Vaccination Booking</title>
	  <link rel="icon"  type="image/png" href="Picture1.jpg">


    <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/style.css" rel="stylesheet">
	  <script src="https://kit.fontawesome.com/a076d05399.js"></script>


<body>

<?php
	session_start();
	include "DBconnection.php";
	if(!isset($_SESSION['email']))
	{
		header("location:loginindex.php");
	}
	else
	{
		$id = $_SESSION['id'];
		$email = $_SESSION['email'];

		$result = mysqli_query($conn,"SELECT * FROM patients WHERE id='" . $id."'");
		$row  = mysqli_fetch_array($result);

		if($row >0)
		{
		$name=$row['name'];
		$password =$row['password'];
		$city =$row['city'];
		$vaccinename =$row['vaccinename'];
		$email =$row['patientEmail'];
		 }
		$result = mysqli_query($conn,"SELECT * FROM second_vaccine_requests WHERE patientID='" . $id."'");
		$row  = mysqli_fetch_array($result);



		if($row >0)
		{
		$SL = $row['SvaccineTime'];
		$SD = $row['SvaccineLocation'];
		}



			$mysqli = new mysqli('localhost','root','','covidV') or die(mysqli_error($mysqli));
			$result2  = $mysqli->query("SELECT * FROM vaccine") or die ($mysqli->erorr);

	}
	  ?>

<div class="topnav" style=" margin-top: -20px  " >
<a style="padding-top:0px; padding-bottom: 0px"><img height="60px" src="Picture1.jpg"></a>
<h2 style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'">COVID VACCINATION BOOKING</h2>

<a  href="VaccineIndex.php">Home</a>
<a  href="Vaccinedetails.php">Vaccine Details</a>
<a  href="myprofile.php">My Profile</a>

<a  href="userLogout.php">Log out</a>
<h3  align="right" style="padding-right:25px;font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">User - <?php echo $name;?></h3>



</div>



<div class="section2" align="center" style="padding: 30px; overflow-y: scroll"  >

<h1 align="center" >Vaccine Details</h1>

<table class="table table-hover" id="user-data" >
  <thead>
    <tr>
	  <th class="hidden" scope="span">ID</th>
	  <th scope="col">Name</th>
	  <th scope="col">Details</th>

    </tr>
  </thead>
  <tbody>
	  <?php
 		while ($row= $result2->fetch_assoc()):  ?>

    <tr>
     	 <td class="hidden"><?php echo $row['id']; ?></td>
		 <td><?php echo $row['vaccinename']; ?></td>
		 <td><?php echo $row['details']; ?></td>




    </tr>



  </tbody>


<?php endwhile; ?>
</table>
	<?php
 	 function pre_r( $array ){
 	 	echo '<pre>';
 	 	print_r($array);
 	 	echo '</pre>';

 	 }
 	 ?>

</div>



<script src="js/slider.js"></script>
</body>
</html>
