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
		$pid = $_SESSION['id'];
		$email = $_SESSION['email'];

		$result = mysqli_query($conn,"SELECT * FROM patients WHERE id='" . $pid."'");
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
<h3  align="right" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">User - <?php echo $name;?></h3>



</div>
<div class="section1" align="center" style="  margin-bottom: 20px;" >
<div style="margin-top: 50px">

      <h1 class="alert-danger">Choose a Center</div>

 		  <div class="custom-select" style="font-size: 29px;font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'">



<?php
if (isset($_POST['submit'])){
include "DBconnection.php";

   $SvaccineLocation = $_POST['questions'];

   $query = "UPDATE second_vaccine_requests SET SvaccineLocation='$SvaccineLocation' WHERE patientID= $pid" ;
   $query_run = mysqli_query($conn, $query);

	if($query_run)
	{
	echo "submitted";
   header('location:Time.php') ;

	}
	else
	{
echo "form not submitted";
	}
}
?>

<form action="" method="post">
<?php

$result= mysqli_query($conn,"SELECT * FROM centres");

echo "<select name='questions'>";
echo "<option>---Available centres---</option>";
while ($row  = mysqli_fetch_array($result))
{
echo "<option value='" . $row['CITYNAME'] . "'>" . $row['CITYNAME'] . "</option>";
}
echo "</select>";

?>

<input type="submit" class="btn btn-danger btn-lg" value="Select this City" name="submit"/>
</form>

  </div>
</div>


	  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/slider.js"></script>
</body>
</html>
