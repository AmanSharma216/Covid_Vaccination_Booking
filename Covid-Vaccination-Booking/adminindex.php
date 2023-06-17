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
		header("location:adminlogin.php");
	}
	else
	{
		$id = $_SESSION['id'];
		$email = $_SESSION['email'];

		$result = mysqli_query($conn,"SELECT * FROM admins WHERE id='" . $id."'");
		$row  = mysqli_fetch_array($result);

		if($row >0)
		{
		$name=$row['name'];
		$password =$row['password'];
		 		}

	$mysqli = new mysqli('localhost','root','','covidv') or die(mysqli_error($mysqli));
		$result  = $mysqli->query("SELECT * FROM patients ") or die ($mysqli->erorr);

	}
	  ?>




<div class="topnav" style=" margin-top: -20px  " >
<a style="padding-top:0px; padding-bottom: 0px"><img height="60px" src="Picture1.jpg"></a>
<h2 style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'">Covid Vaccination Admin</h2>

<a  href="adminindex.php">Registerd Patients</a>
<a  href="requestv1.php">Add Locations</a>
<a  href="requestv2.php">Vacinne Requests</a>
<a  href="userLogout.php">Log out</a>
<h3  align="right" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">User - <?php echo $name;?></h3>

</div>



<div class="section2" align="center" style="margin-bottom: 20px; overflow-y: scroll" >

<div style="margin-top: 10px; margin-bottom:10px">

 <h1 align="center" >Registerd Patients Details</h1><hr>
<table class="table table-bordered"  style=" color: black; font-size: 20px; border:10px ">
  <thead>
    <tr>
      <th scope="col"> ID</th>
		<th scope="col">  Name</th>
		<th   scope="col">Email</th>
      	<th   scope="col">Password</th>
		<th  scope="col">Vaccine</th>
   	    <th   scope="col">City</th>
		<th   scope="col">NIC</th>



    </tr>
  </thead>
  <tbody>
	  <?php
 		while ($row= $result->fetch_assoc()):  ?>

    <tr>
      <td><?php echo $row['id']; ?></td>
	  <td><?php echo $row['name']; ?></td>
	  <td  ><?php echo $row['patientEmail']; ?></td>
      <td><?php echo $row['password']; ?></td>
      <td ><?php echo $row['vaccinename']; ?></td>
	  <td ><?php echo $row['city']; ?></td>
	  <td ><?php echo $row['nic']; ?></td>



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

</div>

<script src="js/slider.js"></script>
</body>
</html>
