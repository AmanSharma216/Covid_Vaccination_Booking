<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Covid Vaccination Booking</title>
	  <link rel="icon"  type="image/png" href="Picture1.png">


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
		 		}

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



<div class="section1" align="center" >

<div style="margin-top: 100px">



	<br>	<br>	<br>	<br>
	<a href="one.php"> <button style="width: 350px; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif';font-size: 28px" class="btn btn-Primary btn-lg">Book Covid Vaccine</button></a>


	<?php

include "DBconnection.php";
$result = mysqli_query($conn,"SELECT * FROM second_vaccine_requests WHERE patientID='" . $id."'");
$row  = mysqli_fetch_array($result);

		ob_start();


		if($row >0)
		{
         $SvaccineLocation=$row['SvaccineLocation'];
         $SvaccineTime=$row['SvaccineTime'];
		 $status1=$row['status'];

		if($status1 == "") {
  		ob_end_clean();

		echo "<h1 class='alert-warning'>PENDING VACCINE </h1>";
		echo "<h2 class='alert-info'>Location - $SvaccineLocation <br> Date/Time  - $SvaccineTime</h2>";

      ob_start();
		}
		if($status1 == "completed") {

		ob_end_clean();

		echo "<h1 class='alert-success'>YOU WERE AMONG THOSE WHO HAVE COMPLETED THE VACCINE</h1>";
		echo "<button class='btn btn-secondary btn-lg' ><a href='certificate.php'>Get Your Certificate</a></button>";

		}

}

?>



</div>

</div>





<script src="js/slider.js"></script>
</body>
</html>
