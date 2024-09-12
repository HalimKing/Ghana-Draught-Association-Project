<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_GET["userId"])) {
        $userId = mysqli_real_escape_string($conn, $_GET["userId"]);
        $defaultPassword = md5("gda2024");
        $sql = mysqli_query($conn, "SELECT * FROM usertbl WHERE id='$userId' LIMIT 1");
        if(mysqli_num_rows($sql) > 0) {
            $sql = mysqli_query($conn, "UPDATE usertbl SET password='$defaultPassword' WHERE id='$userId'");

            if($sql) { 
                echo "<script>
                    alert('Password Reset Successfully!');
                    window.location='../manageUsers.php?success'
                </script>";
            }else{
                mysqli_errno($conn);
            }
            
        } else{
            echo "<script>
            window.location='../404.php'
            </script>";
        }
        
    }

    mysqli_close($conn);


?>