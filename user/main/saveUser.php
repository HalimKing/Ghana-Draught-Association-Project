<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_POST["saveUser"])) {
        $fullName = mysqli_real_escape_string($conn, $_POST["fullName"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
        $defaultPassword = md5("gda2024");

        $sql = mysqli_query($conn, "SELECT * FROM usertbl WHERE username='$username' OR email='$email' OR contact='$contact' LIMIT 1");
       
        if(mysqli_num_rows($sql) > 0) {
            echo "<script>
                alert('Email or Contact or username exist!');
                window.location='../addUser.php'
            </script>";
        }else {
            $sql = mysqli_query($conn, "INSERT INTO usertbl(fullName,username,email,contact,gender,profilePicture,password) VALUES('$fullName','$username','$email','$contact','$gender','avatar.png','$defaultPassword')");

            if($sql) { 
                echo "<script>
                    alert('Successful Added!');
                    window.location='../manageUsers.php?success'
                    </script>";
                }else{
                mysqli_errno($conn);
            }
        }
        
    }

    mysqli_close($conn);


?>