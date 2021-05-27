
<html>
<head>
<link rel="stylesheet" href="style/home.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="style/boot.min.css"> -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
input[type=text],input[type=date] {
  width: 15%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
::placeholder {
  color: black;
  opacity: 1; /* Firefox */
}
.label {
  color: white;
  padding: 8px;
  font-family: Arial;
  font-size:large;
}
.other {background-color: #2196F3; color: black;} /* Gray */ 


</style>
</head>

<?php
$server="localhost";
$username="root";
$password="";
$update = false;
$delete = false;
$faildelete=false;
$failupdate = false;

$con=mysqli_connect($server,$username,$password,"covid");

if(!$con){
    die("Connection to this Database Failed due to ".
    mysqli_connect_error());
}

if(isset($_POST['update']))	{
	$eid=$_POST['id'];
  $dc = substr($eid,4, 2);
  $len = strlen($eid);
  $lenn = $len - 6;
  $ec = substr($eid, 6, $lenn);
  $date = $_POST['testdate'];
  $time = strtotime($date);

	$newformat = date('Y-m-d',$time);
	$sql = "UPDATE emp SET date = '$newformat' WHERE emp_id = $ec AND dept_code = $dc";
	if($con->query($sql)==true){
    // echo "Successfully inserted";
    $update=true;
}
else{
    $failupdate = true;
}
}
if(isset($_POST['delete']))	{
	$eid=$_POST['id'];
  $dc = substr($eid,4, 2);
  $len = strlen($eid);
  $lenn = $len - 6;
  $ec = substr($eid, 6, $lenn);
	$sql = "DELETE FROM emp where emp_id = $ec AND dept_code = $dc";
	if($con->query($sql)==true){
    // echo "Successfully inserted";
    $delete=true;
}
else{
    $faildelete=true;
}
}
$con->close();

?>

<body>

<div class="header">
  <header>
  <img src="image/bit.webp">
  <b><h5>BIT Infratech</h5></b>
  <b>COVID CARD GENERATOR</b>
</header>
</div>

<div class="topnav">
  
  <a href="welcome.html">Home</a>
  <a href="about.php">About Us</a>
  <a href="reg.php">Registration Form</a>
  <a href="id.php">Card Generator</a>
  <a href="list.php">Employee list</a>
  <a href="updl.php">Update/Delete</a>
</div>


	<form action="" method="post" enctype="multipart/form-data"><hr width="5px">
		<span class="label other">Enter Covid Id : </span><input type="text" name="id" required placeholder="CVIDXXXX" ><br><br>
		<span class="label other">Entre New Date : </span><input type="date" name="testdate" ><br><br>
		<button class="button" type="submit" name = "update"  >UPDATE</button>
		<button class="button" type="submit" name = "delete">DELETE</button>

	</form>

    <?php
        if($delete==true){
            echo '<h3 style="color:red">Successfully Deleted </h3>';
        }
        if($faildelete==true){
            echo '<h3 style="color:red">Failed To Deleted No Records Found</h3>';
        }

        ?>
        <?php
        if($update==true){
            echo '<h3 style="color:red">Successfully Updated </h3>';
        }
        if($failupdate==true){
            echo '<h3 style="color:red">Failed to  Updated No Records Found </h3>';
        }

        ?>

    <div class="footer">
  <footer>
    <table>
    <tr>
      <td>
        <u><b style="font-size: large;">Address</b></u>
        <address style="font-size: large;"><br>LG Floor - Premshree GV Mall,<br> 
          Boring Rd, Patna, <br>Bihar 800001</address><br><br><br> 
      </td>

      <td colspan="5">
        <u><b style="font-size: large;">Location</b></u><br>
        <a href="https://goo.gl/maps/AHwVYtU5jvdZZofPA">https://goo.gl/maps/AHwVYtU5jvdZZofPA</a>
        <br><br><img src="image/map.png">
      </td>
      
      <td colspan="5">
        <u><b style="font-size: large;">Social Media Handles</b></u><br><br><br>
        <a href="https://www.facebook.com/bitinfratech/">Facrbook Page Link</a><br><br>
        <a href="m.me/bitinfratech">Messenger Page Link</a><br><br>
        <a href=" https://www.bitinfratech.in/">Website Link</a>
      </td>

      <td colspan="5">
        <u><b style="font-size: large;">Contact Us</b></u><br>
        <p>email ID:</p>
        <p>bitinfratech@yahoo.in</p>
        <p>Contact Number:</p>
        <p>093863 67554</p>
  
      </td>

    </tr>
    </table>
  </footer>
</div>

</body>
</html>
