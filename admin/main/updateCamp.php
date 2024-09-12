<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_POST["updateCamp"])) {
        $campId = mysqli_real_escape_string($conn, $_POST["campId"]);
        $campName = mysqli_real_escape_string($conn, $_POST["campName"]);
        $regionId = mysqli_real_escape_string($conn, $_POST["regionId"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $sql = mysqli_query($conn, "UPDATE camptbl SET campName='$campName',regionId='$regionId',description='$description' WHERE id='$campId'");

        if($sql) { 
            echo "<script>
                alert('Successful Updated!');
                window.location='../camps.php?success'
            </script>";
        }else{
            mysqli_errno($conn);
        }
    }

    mysqli_close($conn);


?>