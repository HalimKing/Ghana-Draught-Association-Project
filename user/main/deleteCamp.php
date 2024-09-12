<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_GET["campId"])) {
        $campId = mysqli_real_escape_string($conn, $_GET['campId']);
        $sql = mysqli_query($conn, "DELETE FROM camptbl WHERE id='$campId'");

        if($sql) { 
            echo "<script>
                alert('Successful Deleted!');
                window.location='../camps.php?success'
            </script>";
        }else{
            mysqli_errno($conn);
        }
    }

    mysqli_close($conn);


?>