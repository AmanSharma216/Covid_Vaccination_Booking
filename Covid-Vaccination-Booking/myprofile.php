<?php error_reporting(0); ?>
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
		$city =$row['city'];
		$vaccinename =$row['vaccinename'];
		$email =$row['patientEmail'];
		$nic =$row['nic'];
		 }
		$result = mysqli_query($conn,"SELECT * FROM second_vaccine_requests WHERE patientID='" . $id."'");
		$row  = mysqli_fetch_array($result);


		if($row >0)
		{
		$SL = $row['SvaccineLocation'];
		$SD = $row['SvaccineTime'];
		$status1 = $row['status'];
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
<h3  align="right" style="padding-right:25px; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">User - <?php echo $name;?></h3>



</div>



<div class="section2" align="center" style="padding: 30px; overflow-y: scroll"  >

<h1 align="center" style="padding-bottom:30px">Profile Details</h1>
<table class="table table-hover table-primary" align="center"  style="margin-top: -100px; color: black; font-size: 14px; border:10px ">
  <thead>
    <tr>


    </tr>
  </thead>
  <tbody>
	    <tr class="table-primary">
		   <th  scope="row">ID</th>
      <th scope="row"><?php echo $id;?></th>
    </tr>
	   <tr>
	  <th  scope="row">Name</th>
      <th scope="row"><?php echo $name;?></th>


    </tr>
	  <tr class="table-primary">
      <th  scope="row">Email</th>
      <td ><?php echo $email; ?></td>
      <br>

    </tr>
	<tr>
      <th scope="row">Password</th>
      <td ><?php echo $password; ?></td>
      <br>
    </tr>
    <tr class="table-primary">
      <th scope="row">City</th>
      <td ><?php echo $city; ?> </td>
      <br>
    </tr>
	   <tr class="table-primary">
      <th scope="row">National Identity Card Number</th>
      <td ><?php echo $nic; ?> </td>
    </tr>
    <tr>
      <th scope="row">Vaccine Name</th>
      <td><?php echo $vaccinename ?></td>

    </tr>
    <tr>
      <th scope="row">Vaccine Location</th>
      <td><?php echo $SL; ?></td>

    </tr>
     <tr class="table-primary">
      <th scope="row">Vaccine Date</th>
      <td><?php echo $SD; ?></td>
    </tr>

	  <tr class="table-primary">
      <th scope="row">Vaccine Status</th>
      <td ><?php echo $status1; ?></td>
      <br>
    </tr>


  </tbody>


</table>

</div>


<script src="js/slider.js"></script>
</body>
</html>
