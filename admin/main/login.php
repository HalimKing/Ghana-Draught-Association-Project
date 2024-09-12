<?php 
    // include('../inc/session.php');
    session_start();
    require('../config.php');
    if(isset($_POST["login"])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = md5($_POST['password']);
        $sql = mysqli_query($conn, "SELECT * FROM usertbl WHERE email='$email' AND password='$password' LIMIT 1");

        if($sql) { 
            if(mysqli_num_rows($sql) == 1) {
                $_SESSION["SESS"] = "a12";
                $row = mysqli_fetch_array($sql);
                $_SESSION['SESS_NAME'] = $row['fullName'];
                $_SESSION['SESS_USERNAME'] = $row['username'];
                $_SESSION['SESS_ID'] = $row['id'];
                echo "<script>
                    window.location='../index.php'
                </script>"; 

            }else{
                echo "<script>
                alert('Wrong details, please try again!');
                window.location='../login.php?error'
                </script>"; 
            }
            
        }else{
            mysqli_errno($conn);
        }
    }

    mysqli_close($conn);


?>