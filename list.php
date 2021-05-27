
<?php
require('config/db.php');

$query='SELECT * FROM emp';

$result=mysqli_query($conn,$query);

$sql1 = "SELECT * FROM emp"; //if fails then shows the entire table
$result1 = mysqli_query($conn, $sql1);


$empl=mysqli_fetch_all($result,MYSQLI_ASSOC);

$count_negative=0;
$count_positive=0;
$count_emp=count($empl);

foreach($empl as $em)
{
    if($em['status']=='Positive'){
        ++$count_positive;
    }
    if($em['status']=='Negative'){
        ++$count_negative;
    }

}

mysqli_free_result($result);

// var_dump($empl);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php fetch</title>
    <!-- <link rel="stylesheet" type="text/css" href="http://bootswatch.com/cerulean/bootstrap/min.css"> -->
    <link rel="stylesheet" href="style/bootstrap.css">
   
    <link rel="stylesheet" href="style/home.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
      body {
    background-color: #3d4a4b;
  }
  body * {
    box-sizing: border-box;
  }
  
  .header {
    background-color: #327a81;
    color: white;
    font-size: 1.5em;
    padding: 1rem;
    text-align: center;
    text-transform: uppercase;
  }
  
  img {
    height: 100px;
    width: 100px;
  }
  
  .table-users {
    border: 1px solid #327a81;
    border-radius: 20%;
    box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
    max-width: calc(100% - 2em);
    margin: 1em auto;
    overflow: hidden;
    width: 800px;
  }
  
  table {
    width: 100%;
  }
  table td, table th {
    color: black;
    padding: 10px;
    font-weight: bold;
    
  }
  table td {
    text-align: center;
    vertical-align: middle;
  }
  table td:last-child {
    font-size: 0.95em;
    line-height: 1.4;
    text-align: left;
  }
  table th {
    background-color: #4f6b6e;
    color: white;
    font-weight: 1000;
    font-size: 16px;
    text-align: center;
  }
  table tr:nth-child(2n) {
    background-color: white;
    font-size: 16px;
  }
  table tr:nth-child(2n+1) {
    background-color: #cee3e6;
    font-size: 16px;
  }
     </style>

</head>
<body style=" background-image: url('image/slide-02.jpg');background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;" >
 

<div class="topnav">
  
  <a href="welcome.html">Home</a>
  <a href="about.php">About Us</a>
  <a href="reg.php">Registration Form</a>
  <a href="id.php">Card Generator</a>
  <a href="list.php">Employee list</a>
  <a href="updl.php">Update/Delete</a>
</div>

<?php foreach($empl as $emp): ?>

<?php endforeach; ?>

<p style="color:black; background-color:pink">
<?php echo "Total No of Employees : ".$count_emp."<br>Total No of Positive case : ".$count_positive."<br> Total no. of Negative case : ".$count_negative; ?> </p>

<div class="container">

  <h1 style="color:black"><u>Employees Workin in BIT</u></h1>

  <div class="container empContainer">
        <div>

          <table>
                <thead>
                    <tr>
                    <th>Employee ID</th>
                    <th>Covid ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Employee Shift</th>
                    <th>Dept Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Photo</th>
                    </tr>
                </thead>

                <tbody>
                <?php while($row = mysqli_fetch_object($result1)) { ?>
                        <tr>
                            <td><?php echo $row->emp_id ?></td>
                            <td><?php echo "CVID".$row->dept_code; echo $row->emp_id ?></td>
                            <td><?php echo $row->name ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->phone ?></td>
                            <td><?php echo $row->shift ?></td>
                            <td><?php echo $row->dept_name ?></td>
                            <td><?php echo $row->date ?></td>
                            <td><?php echo $row->status ?></td>
                            <td> <img src="<?php echo $row->photo ?>" width="50%"> </td>                                                  
                    <?php } ?> 
                        </tr>
                </tbody>
          </table>

        </div>
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
    

