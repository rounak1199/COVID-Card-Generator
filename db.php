<?php

$conn = mysqli_connect ('localhost','root','','covid');

if(mysqli_connect_error()){
    echo "connection failed".mysqli_connection_errno();
}
echo "connected";
?>