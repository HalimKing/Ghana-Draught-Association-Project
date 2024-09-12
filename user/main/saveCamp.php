<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_POST["saveCamp"])) {
        $campName = mysqli_real_escape_string($conn, $_POST["campName"]);
        $regionId = mysqli_real_escape_string($conn, $_POST["regionId"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $sql = mysqli_query($conn, "SELECT campName,regionId FROM camptbl WHERE campName='$campName' AND regionId='$regionId' LIMIT 1");
        if(mysqli_num_rows($sql) > 0) {
            echo "<script>
                alert('Campt already exist!');
                window.location='../addCamp.php'
            </script>";
        } else{
            $sql = mysqli_query($conn, "INSERT INTO camptbl(campName,regionId,description) VALUES('$campName','$regionId','$description')");

            if($sql) { 
                echo "<script>
                    alert('Successful Added!');
                    window.location='../camps.php?success'
                </script>";
            }else{
                mysqli_errno($conn);
            }
        }
        
    }

    mysqli_close($conn);


?>