<?php 
    // include('../inc/session.php');
    session_start();
    require('admin/config.php');
    if(isset($_POST["login"])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = md5($_POST['password']);
        $sql = mysqli_query($conn, "SELECT * FROM usertbl WHERE email='$email' AND password='$password' LIMIT 1");

        if($sql) { 
            if(mysqli_num_rows($sql) == 1) {
                
                $row = mysqli_fetch_array($sql);
                $_SESSION['SESS_NAME'] = $row['fullName'];
                $_SESSION['SESS_USERNAME'] = $row['username'];
                $_SESSION['SESS_ROLE'] = $row['role'];
                $_SESSION['SESS_ID'] = $row['id'];
                if ($row['role'] == 'Admin') {
                    echo "<script>
                    window.location='admin/index.php'
                    </script>"; 

                } else if($row['role'] == 'User') {
                    $_SESSION['SESS_REGION_ID'] = $row['regionId'];
                    echo "<script>
                    window.location='user/index.php'
                    </script>"; 
                }
                
            }else{
                echo "<script>
                alert('Wrong details, please try again!');
                window.location='index.php?error'
                </script>"; 
            }
            
        }else{
            mysqli_errno($conn);
        }
    }

    mysqli_close($conn);


?>