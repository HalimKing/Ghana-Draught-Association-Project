<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_GET["userId"])) {
        $userId = mysqli_real_escape_string($conn, $_GET['userId']);
        $sql = mysqli_query($conn, "DELETE FROM usertbl WHERE id='$userId'");

        if($sql) { 
            echo "<script>
                alert('Successful Deleted!');
                window.location='../manageUsers.php?success'
            </script>";
        }else{
            mysqli_errno($conn);
        }
    }

    mysqli_close($conn);


?>