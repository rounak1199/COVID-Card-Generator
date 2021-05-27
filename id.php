
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style/home.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

  *{
    color:white;
  }
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
.print{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
.title {
  color: grey;
  font-size: 18px;
}

.status {
  color: #154360;
  font-size: 20px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

input{
  color: white;
  background-color: #000;
}

.form{
  background-color:rgba(0, 60, 138, 0.651);
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
<script src="jquery-3.6.0.js"></script>
<script type = "text/javascript">

$(document).ready(function()	{
	$(".card").hide();
	$(".showCard").click(function(){
		$(".card").fadeIn(1500);	
	});
});

function printDiv(printCard) {
        var printContents = document.getElementById(printCard).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.print();
        w.close();
    }
</script>
</head>
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

<?php


if(isset($_POST['submit'])){
  $eid=$_POST['id'];
  $dc = substr($eid,4, 2);
  $len = strlen($eid);
  $lenn = $len - 6;
  $ec = substr($eid, 6, $lenn);
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"covid");

if(!$con){
    die("Connection to this Database Failed due to ".
    mysqli_connect_error());
}

$sql = "SELECT emp_id, name, dept_name, dept_code, date, status, phone, email, photo FROM emp WHERE emp_id = $ec AND dept_code = $dc";
   $retval = mysqli_query( $con, $sql );

   if($retval)	{
  while($row = mysqli_fetch_row($retval)) {
      $emp_id = $row[0];
	  $name = $row[1];
	  $dept_name = $row[2];
	  $dept_code = $row[3];
	  $date = $row[4];
	  $status = $row[5];
	  $phone = $row[6];
	  $email = $row[7];
	  $photo = $row[8];
   }
   }
   
   $now = time();
   $then = strtotime("$date now");
   $daysdiff = $now - $then;
   $days = round($daysdiff / (60 * 60 * 24));
   
   if($days > 14 || $status == "Positive")	{
		echo "<style> .card {background-color: red;}</style>";
   }
   else if($days <= 14 && $days > 7)	{
	   		echo "<style> .card {background-color: orange;}</style>";
   }
   else if($days > -1 && $days <= 7)	{
	  		echo "<style> .card {background-color: green;}</style>";
   }
   $ndate = strtotime($date."+ 13 days");
   $cid = $dept_code.$emp_id;
  }
?>

 <div class="form">
<form action="id.php" method="post"><hr width="5px" >
Enter Covid Id : <input type="text" name="id" id="id" required>
<input type="submit" value="submit" name="submit" class = "showCard"><br><br>

</form>

<h2 style="text-align:center">User Profile Card</h2>

<div class="card">
  <div id = "printCard">
  <img src = "<?php echo $photo; ?>" style="width:100%">
  <h1><?php echo $name; ?></h1>
  <p class="title"><?php echo $dept_name; ?></p>
  <p>Mob:- <?php echo $phone; ?><br>
	Email:-<?php echo $email; ?><br><br>
	Last Tested: <?php echo $date; ?><br>
	Due Date: <?php echo date("Y-m-d",$ndate); ?>
  </p>
  <p class = "status"> Covid Status: <?php echo $status; ?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><button><?php echo "CVID".$cid; ?></button></p>
  
	</div>
</div> 
</div>
<div class = "print">
	<form>
		<input type="button" onclick="printDiv('printCard')" value="PRINT ID"/>
	</form>
</div>

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
        <a href="https://www.facebook.com/bitinfratech/">Facebook Page Link</a><br><br>
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