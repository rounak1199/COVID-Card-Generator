<?php
$insert=false;
if(isset($_POST['submit']))	{
    // Setting connection variables
$server="localhost";
$username="root";
$password="";

//Create a database connection

$con=mysqli_connect($server,$username,$password);

if(!$con){
    die("Connection to this Database Failed due to ".
    mysqli_connect_error());
}

// collect post variables

$name=$_POST['name'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$shift=$_POST['shift'];
$dept_name=$_POST['dept_name'];
$dept_code=$_POST['dept_code'];
$date=$_POST['testdate'];
//$SDATE = __toString($date);
$status=$_POST['status'];
$file = $_FILES['pic'];
$fileName = $file['name'];
$fileError = $file['error'];
$fileTmp = $file['tmp_name'];
$fileExt = explode('.',$fileName); //to convert it into array
$fileCheck = strtolower(end($fileExt)); //end gives last element of the array
$fileExtStored = array('png', 'jpg', 'jpeg');

if (in_array($fileCheck, $fileExtStored)) { //searches an array file for file
	$destinationFile = 'upload/'.$fileName; //destination folder
	move_uploaded_file($fileTmp, $destinationFile);                  

// Insertion into table

$sql="INSERT INTO `covid`.`emp` ( `name`, `gender`, `email`, `phone`, `shift`, `dept_name`, `dept_code`, `date`, `status`, `photo`) VALUES 
('$name', '$gender', '$email', '$phone', '$shift', '$dept_name', '$dept_code', '$date', '$status','$destinationFile')";
// echo $sql;


// for successfull connection
if($con->query($sql)==true){
    // echo "Successfully inserted";
    $insert=true;
}
else{
    echo "Error $sql<br> $con->error";
}
}
$con->close();


?>

<script>
	function formValidation()	{
		var ename = document.employee.name;
		var eemail = document.employee.email;
		var emobile = document.employee.phone;
		var ephoto = document.employee.pic;
		var date = document.employee.testdate;
		
		if(ename_validation(ename,5,12))	{
			if(eemail_validation(eemail))	{
				if(emobile_validation(emobile))	{
					if(ephoto_validation(ephoto))	{
						if(date_validation(date))	{
							
						}
					}
				}
			}
		}
		return false;
	}
	function ename_validation(ename,min,max)	{
		var ename_len = ename.value.length;
		var pattern =  /^[a-zA-Z ]*$/;
		if (ename_len == 0 || ename_len > max || ename_len < min)	{
			alert("Employee Name should not be empty / length should be between "+min+" to "+max);
			ename.focus();
			return false;
		}
		if(ename.value.match(pattern))	{
			return true;
		}
		alert('Name must have alphabet characters only');
		ename.focus();
		return false;
	}
	function eemail_validation(eemail)	{
		var eemail_len = eemail.value.length;
		var pattern = /^([a-zA-Z\_\-\.0-9])+\@+([a-z]{2,7})+\.([a-z]{2,3})$/;
		if(eemail_len == 0)	{
			alert("Email must not be empty");
			eemail.focus();
			return false;
		}
		if(eemail.value.match(pattern))	{
			return true;
		}
		alert("Enter valid email.");
		eemail.focus();
		return false;
	}
	function emobile_validation(emobile)	{
		var emobile_len = emobile.value.length;
		var pattern = /^(\+\d{1,3}[- ]?)?\d{10}$/;
		if(emobile_len == 0)	{
			alert("Mobile must not be empty");
			emobile.focus();
			return false;
		}
		if(emobile.value.match(pattern))	{
			return true;
		}
		alert("Enter valid mobile number");
		emobile.focus();
		return false;
	}
	function ephoto_validation(ephoto)	{
		var array = ['jpg', 'jpeg', 'png'];
		var Extension = ephoto.value.substring(ephoto.value.lastIndexOf('.') + 1).toLowerCase();
		if(ephoto.value.length != 0)	{
	
			if (array.indexOf(Extension) <= -1) {  
                alert("Please Upload only jpg, jpeg and png extension flle");  
                return false;  
			}  
			return true;
		}
		alert("Select Your Image");
		ephoto.focus();
		return false;
	}
	function date_validation(date)	{
		var tdate = date.value.length;
		if(tdate == 0)	{
			alert("Enter a valid date");
			date.focus();
			return false;
		}
		alert('Form Successfully Submitted');
		window.location.reload()
		return true;
	}
	
</script>
<?php 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style2.css">

    
    <title>Covid Form</title>
	

</head>
<style>
/* form editing */

  

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: rgba(0, 60, 138, 0.651);
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  font-size: 18px;
  padding: 14px 16px;
  font-weight: bolder;
  width: 10%;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.container img{
  float: left;
  height: 70px;
  width: 80px;
}

p,label{
    font-size:20px;
}

</style>
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


    <div class="container "> 
        <img src="image/bit.webp"> 
        <h2>COVID Identity Card Registration</h2>
        <br>
        <br>
        <br>
        <br>
        <?php
        if($insert==true){
            echo "<p=class'submitmessage'>Thanks for Registring into BIT";
        }

        ?>
        <br>
        
        <p style="color:red;font-size:15px;">Enter Employees  Details</p>

        <form action="" name = "employee" method="post" enctype="multipart/form-data">
                <input type="text" name="name" id="name" placeholder="Enter Your Name" autocomplete="off">
                <input type="email" name="email" id="email" placeholder="Enter Your Email" autocomplete="off">
                <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number" autocomplete="off" maxlength="10">
                Choose Photo: <input class="files" type = "file" name = "pic" id = "pic">
                <!-- <input type="text" name="shift" id="shift" placeholder="Enter Working Shift" autocomplete="off"> -->
            
                <label>Gender:</label>	 
                <select name="gender" class="selectBox">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>

                <label for="">Working Shift</label>
                <select name="shift" class="selectBox">
                    <option value="Day">Day</option>
                    <option value="Night">Night</option>
                </select>
            
            <!-- <input type="radio" name="gender" value = "Male" checked="checked">Male<input type="radio" name="gender" value = "Female"> Female</pre><br>
            <p> <><lable>Working Shift:</lable><input type="radio" name="shift" value="Day" checked="checked"> Day <input type="radio" name="shift" value="Night"> Night<p><br>
             -->
            
            
            
            <!-- <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any other Info Here" autocomplete="off"> </textarea> -->
            
            
            
            
                <p style="color:red;font-size:15px;">Department Info:</p><br>
                <label>Working Department</label>
                <select id="dept_name" class="selectBox" name="dept_name" onchange="change()">
                    <option value="Engineer">Engineer</option>
                    <option value="Labour">Labour</option>
                    <option value="Architect">Architect</option>
                    <option value="Vehicle Operator">Vehicle Operator</option>
                </select>
                <input type="text" style="width:10%" name="dept_code" id="dept_code" readonly placeholder="Department Code" value="01" maxlength="2" >
                
                <p style="color:red;font-size:15px;">COVID Info</p>
                <label for="Corona">Last Corona Checkup Date:</label>
                <input type="date" class="date" id="testdate" name="testdate">


                <select name="status" class="selectBox">
                    <option value="Positive">Positive</option>
                    <option value="Negative">Negative</option>
                </select>

                <!-- <pre><lable>Covid Status : </lable><input type="radio" name="status" value="Positive"> Positive <input type="radio" name="status" value="Negative" checked="checked"> Negative</pre><br> -->


                <button  class="btn" type="submit" name = "submit" onclick="return formValidation();">Submit</button> <button class="btn" type="reset">Reset</button>
        </form>
 


    </div>


<br>
<br>
<br>
<br>

<br>


<script >
    function change(){
        var x= document.getElementById("dept_name").value;
        if(x=="Engineer"){
        document.getElementById("dept_code").value ="01";
        }
        if(x=="Labour"){
        document.getElementById("dept_code").value ="02";
        }
        if(x=="Architect"){
        document.getElementById("dept_code").value ="03";
        }
        if(x=="Vehicle Operator"){
        document.getElementById("dept_code").value ="04";
        }
    }



    // onclick="return validation()"
    // function validation(){
    //     var nm= document.getElementById('name').value;
    //     var gen= document.getElementById('gender').value;
    //     var shift= document.getElementById('shift').value;
    //     var phone= document.getElementById('phone').value;
    //     // var add= document.getElementById('address').value;
    //  if(nm=="" ){
    //      alert("Name must be Filled");
    //     return false;
    //  }
    //  if(gen==""  ){
    //      alert("Enter Gender ");
    //     return false;
    //  }
    //  if(shift==""){
    //      alert("Select Shift");
    //     return false;
    //  }
    //  if(phone=="" ){
    //      alert("Enter Phone No. ");
    //     return false;
    //  }
    // //  if(add=="" ){
    // //      alert("Address must be Filled ");
    // //     return false;
    // //  }
    // }

</script>

<!-- INSERT INTO `emp` (`emp_id`, `name`, `gender`, `email`, `phone`, `shift`, `dept_name`, `dept_code`, `date`, `status`) VALUES ('1', 'rounak', 'male', 'rounak1199@gmail.com', '8804022755', 'day', 'engineer', '01', '2021-04-08', 'negative'); -->

</body>
</html>
