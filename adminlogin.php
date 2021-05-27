<?php 
session_start(); 
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"covid");

if(!$con)	{
    die("Connection to this Database Failed due to ".
    mysqli_connect_error());
}
else {
	echo "database connected";
}

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: admin.php?error=User Name is required");
        exit();
    }else if(empty($pass)){
        header("Location: admin.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM admin WHERE admin_user='$uname' AND pass='$pass'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['admin_user'] === $uname && $row['pass'] === $pass) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: welcome.html");
                exit();
            }else{
                header("Location: admin.php?error=Incorrect User name or password");
                exit();
            }
        }else{
            header("Location: admin.php?error=Incorrect User name or password");
            exit();
        }
    }
    
}else{
    header("Location: admin.php");
    exit();
}