<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_POST["saveRegion"])) {
        $regionName = mysqli_real_escape_string($conn, $_POST["regionName"]);
        $sql = mysqli_query($conn, "SELECT regionName FROM regiontbl WHERE regionName='$regionName'");
        if(mysqli_num_rows($sql) > 0) {
            echo "<script>
                alert('Already exist!');
                window.location='../addRegion.php?success'
            </script>";
        }else {
            $sql = mysqli_query($conn, "INSERT INTO regiontbl(regionName) VALUES('$regionName')");

            if($sql) { 
                echo "<script>
                    alert('Successful Added!');
                    window.location='../regions.php?success'
                </script>";
            }else{
                mysqli_errno($conn);
            }
        }
        
    }

    mysqli_close($conn);


?>