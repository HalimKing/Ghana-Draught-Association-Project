<?php  

// error_reporting(0);
$conn = mysqli_connect("localhost","root","","ghana_draught_association");


if(!$conn) {
    die("Connection Failed, Error: ". mysqli_connect_error());
}

?>