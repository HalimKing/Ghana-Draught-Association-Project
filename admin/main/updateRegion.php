<?php 

    include('../inc/session.php');
    require('../config.php');

    if(isset($_POST["updateRegion"])) {
        $regionId = mysqli_real_escape_string($conn, $_POST["regionId"]);
        $regionName = mysqli_real_escape_string($conn, $_POST["regionName"]);
        $sql = mysqli_query($conn, "UPDATE regiontbl SET regionName='$regionName' WHERE id='$regionId'");

        if($sql) { 
            echo "<script>
                alert('Successful Updated!');
                window.location='../regions.php?success'
            </script>";
        }else{
            mysqli_errno($conn);
        }
    }

    mysqli_close($conn);


?>