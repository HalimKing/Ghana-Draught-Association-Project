<?php 

    include('../inc/session.php');
    require('../config.php');

    if(isset($_POST["updateUser"])) {

        $userId = mysqli_real_escape_string($conn, $_POST["userId"]);
        $fullName = mysqli_real_escape_string($conn, $_POST["fullName"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
        $role = mysqli_real_escape_string($conn, $_POST["role"]);

        $sql = mysqli_query($conn, "SELECT * FROM usertbl WHERE username='$username' OR email='$email' OR contact='$contact' LIMIT 1");
       
        if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            if($row['id'] != $userId) {
                echo "<script>
                alert('Email or Contact or username already exist!');
                window.location='../editUser.php?userId=$userId'
                </script>";
            }else {
                if($role == 'Admin') {
                    $sql = mysqli_query($conn, "UPDATE usertbl SET fullName='$fullName',username='$username',email='$email', contact='$contact',gender='$gender',role='$role' WHERE id='$regionId'");
                } else if($role == 'User') {
                    $campId = mysqli_real_escape_string($conn, $_POST["campId"]);
                    $regionId = mysqli_real_escape_string($conn, $_POST["regionId"]);
        
                    $sql = mysqli_query($conn, "UPDATE usertbl SET fullName='$fullName',username='$username',email='$email', contact='$contact',gender='$gender',role='$role',regionId='$regionId',campId='$campId' WHERE id='$userId'");
                }
               
                if($sql) { 
                    echo "<script>
                        alert('Successful Updated!');
                        window.location='../manageUsers.php?success'
                    </script>";
                }else{
                    mysqli_errno($conn);
                }
            }
            
        }
        
    }

    mysqli_close($conn);


?>