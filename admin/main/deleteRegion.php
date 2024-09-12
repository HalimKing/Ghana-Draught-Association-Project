<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_GET["regionId"])) {
        $regionId = mysqli_real_escape_string($conn, $_GET['regionId']);
        $sql = mysqli_query($conn, "DELETE FROM regiontbl WHERE id='$regionId'");

        if($sql) { 
            echo "<script>
                alert('Successful Deleted!');
                window.location='../regions.php?success'
            </script>";
        }else{
            mysqli_errno($conn);
        }
    }

    mysqli_close($conn);


?>