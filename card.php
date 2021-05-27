<?php
require('config/db.php');

$query='SELECT * FROM emp';

$result=mysqli_query($conn,$query);

$empl=mysqli_fetch_all($result,MYSQLI_ASSOC);

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
    <link rel="stylesheet" type="text/css" href="http://bootswatch.com/cerulean/bootstrap/min.css">
    <link rel="stylesheet" href="style/bootstrap.css">
</head>
<body>
<div class="container" >
<h1 style="color:black"><u>Employees Workin in BIT</u></h1>

<?php foreach($empl as $emp): ?>
<div style="well">
<h2 style="font-size: large;">Emp_Id: <?php echo $emp['emp_id'];?> </h2>
Name :  <?php echo $emp['name'];?> Email :  <?php echo $emp['email'];?> Contact No: <?php echo $emp['phone'];?><br>Works in : <?php echo $emp['shift'];?>Department Name : <?php echo $emp['dept_name']; ?><br> Last Date Of Covid Checkup : <?php echo $emp['date'];?> Current Covid Status : <?php echo $emp['status'];?>
</div>
<?php endforeach; ?>

</div>

    
</body>
</html>
