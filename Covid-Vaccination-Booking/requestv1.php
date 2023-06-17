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
		 $resultSet = $mysqli->query("SELECT * FROM centres ") or die ($mysqli->erorr);

	}
	  ?>




<div class="topnav" style=" margin-top: -20px  " >
<a style="padding-top:0px; padding-bottom: 0px"><img height="60px" src="Picture1.jpg"></a>
<h2 style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'">Covid Vaccination Booking</h2>

<a  href="adminindex.php">Registerd Patients</a>
<a  href="requestv1.php">Add Location </a>
<a  href="requestv2.php">Vaccine Requests</a>
<a  href="userLogout.php">Log out</a>
<h3  align="right" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">User - <?php echo $name;?></h3>



</div>



<div class="section2" align="center" style="margin-bottom: 20px; overflow-y: scroll" >
<h1 align="center" >Vaccine Requests Details</h1><hr>
	<?php
	include "DBconnection.php";
if (isset($_POST['updatedata'])){

	$id = $_POST['update_id'];


		$CITYNAME = $_POST['CITYNAME'];
    $result = mysqli_query($conn,"SELECT max(ID)+1 FROM centres ");
		$row  = mysqli_fetch_array($result);
    $IDD = $row[0];
    $query = "INSERT INTO centres VALUES ('$IDD', '$CITYNAME') " ;


	$query_run = mysqli_query($conn, $query);
	if($query_run)
	{
	echo "submitted";
   header('location:requestv1.php') ;
	}
	else
	{
		echo "form not submitted";
	}
}
?>

<?php
include "DBconnection.php";
if (isset($_POST['deletedata'])){

$id = $_POST['delete_id'];


  $CITYNAME = $_POST['CITYNAME'];

  $query = "DELETE FROM centres WHERE CITYNAME='$CITYNAME' " ;


$query_run = mysqli_query($conn, $query);
if($query_run)
{
echo "submitted";
 header('location:requestv2.php') ;
}
else
{
  echo "form not submitted";
}
}
?>



		<!-- update model -->
	<div align="left" class="col-md-12" style="margin-top: -30px" >

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Vaccine Location </h5>
		<form method="post" action=" "  enctype="multipart/form-data">
		<input type="hidden" name="" value="">
      </div>

      <div class="modal-body">




    <input type="hidden" name="update_id" id="update_id" class="form-control"   readonly/>




    <label>City</label>
     <input type="text" name="CITYNAME" id="CITYNAME" class="form-control" />
    <br>

      <div class="modal-footer">

     <button type="submit" value="submit" id="update_id" name="updatedata" class="btn btn-info"> Add </button>
     <button type="submit" value="submit" id="delete_id" name="deletedata" class="btn btn-info"> Delete </button>
       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
		</form>
    </div>
  </div>
</div>

    </div>

<div style="margin-top: 10px; margin-bottom: 10px">


<table class="table table-bordered"  style=" color: black; font-size: 20px; border:10px ">
  <thead>
    <tr>
      <th scope="col">ID </th>
		<th scope="col">  Vaccine Locations</th>

    </tr>
  </thead>
  <tbody>
	  		<?php
		While($rows = $resultSet->fetch_assoc ()):
{
	$eid = $rows['ID'];
	$CITYNAME = $rows['CITYNAME'];
}

	 ?>

    <tr>
        <td><?php echo $eid ; ?></td>
		<td><?php echo $CITYNAME ; ?></td>



    </tr>
  </tbody>

<?php endwhile; ?>
</table>
	  <button type="button" class="btn btn-danger btn-xs editbtn" style="width: 330px; font-size: 25px; font-family: 'Gill Sans MT', 'DejaVu Sans Condensed', cursive; ">ADD or DELETE LOCATIONS<i class="fa fa-plus" aria-hidden="true"></i></button>
	<?php
 	 function pre_r( $array ){
 	 	echo '<pre>';
 	 	print_r($array);
 	 	echo '</pre>';
 	 }
 	 ?>



</div>

</div>
</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<script src="js/slider.js"></script>



	<script>
		$(document).ready(function() {

			$('.editbtn').on('click', function(){
			$('#editmodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);
				$('#update_id').val(data[0]);
				$('#eid').val(data[0]);
				$('#name').val(data[1]);
				$('#email').val(data[2]);
				$('#city').val(data[3]);
				$('#vaccinename').val(data[4]);
				$('#patientID').val(data[5]);
				$('#SvaccineLocation').val(data[6]);
				$('#SvaccineTime').val(data[7]);
				$('#Sstatus').val(data[8]);

		});

	});


</script>
</body>
</html>