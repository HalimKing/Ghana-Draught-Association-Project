<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_POST["updateProfilePicture"])) {
        
        $avatar = $_FILES["avatar"];
        $userId = mysqli_real_escape_string($conn, $_POST['userId']);
        $sql = mysqli_query($conn, 'SELECT profilePicture FROM usertbl WHERE id="' . $userId . '"');
        if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_array($sql);
            $file1 = $row['profilePicture'];

            if(file_exists('../img/uploaded_files/'. $file1)) {
                if($file1 != 'avatar.png') {
                    unlink('../img/uploaded_files/'. $file1);
                }
            }

            if($avatar['name'] == ""){
                echo "<script>
                    alert('Sorry file field can't be empty!');
                    window.location='../profile.php';
                </script>";
                    
            }else {
                $imageName = $avatar["name"];
                $imagePathTemp = $avatar['tmp_name'];
                $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                $imageNameWithoutExtension = pathinfo( $imageName, PATHINFO_FILENAME );
                $extensionsArray = ["jpg","jpeg",'png'];
                if(in_array($imageExtension, $extensionsArray)){
                    $imageNameAndExtension = $imageNameWithoutExtension. time() . ".". $imageExtension;
                    move_uploaded_file($imagePathTemp, "../img/uploaded_files/" . $imageNameAndExtension);
                }else {
                    echo "<script>
                        alert('Invalid File');
                        window.location='../profile.php';
                    </script>";
                    return false;
                }
    
            }

            $sql = mysqli_query($conn, "UPDATE usertbl SET profilePicture='$imageNameAndExtension' WHERE id='$userId'");

            if($sql) { 
                echo "<script>
                    alert('Successful Updated!');
                    window.location='../profile.php'
                </script>";
            }else{
                mysqli_errno($conn);
            }
        }

        
        
        
    }


    if(isset($_POST['updateProfileDetails'])) {
        $userId = mysqli_real_escape_string($conn, $_POST["userId"]);
        $fullName = mysqli_real_escape_string($conn, $_POST["fullName"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
        

        $sql = mysqli_query($conn, "SELECT * FROM usertbl WHERE email='$email' AND id !='$userId' LIMIT 1");
        if(mysqli_num_rows($sql) > 0) {
            echo "<script>
                alert('Email alredy exist!');
                window.location='../profile.php'
            </script>";
            return false;
        }else {
            $sql = mysqli_query($conn, "UPDATE usertbl SET fullName='$fullName',username='$username',email='$email',contact='$contact',gender='$gender' WHERE id='$userId'");

            if($sql) { 
                echo "<script>
                    alert('Successful Updated!');
                    window.location='../profile.php?success'
                    </script>";
                }else{
                mysqli_errno($conn);
            }
        }
    }




    if(isset($_POST['changePassword'])) {
        $userId = mysqli_real_escape_string($conn, $_SESSION['SESS_ID']);
        $pass = md5($_POST['currentPassword']);
        $newPass =md5($_POST['newPassword']);
        $confirmPass = md5($_POST['confirmNewPassword']);

        $sql = mysqli_query($conn, 'SELECT password FROM usertbl WHERE id="'. $userId .'"');
        if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_array($sql);
            if($pass != $row['password']) {
                echo "<script>
                    alert('Sorry the current password is incorrect!');
                    window.location='../changePassword.php'
                    </script>";
            }else if($newPass != $confirmPass) {
                echo "<script>
                    alert('New password missed matched!');
                    window.location='../changePassword.php'
                    </script>";
            }else {
                $sql = mysqli_query($conn,"UPDATE usertbl SET password='$newPass' WHERE id='$userId'");
                if($sql) {
                    echo "<script>
                    alert('Operation successful!');
                    window.location='../changePassword.php'
                    </script>";
                }
            }
        }
    }

    mysqli_close($conn);


?>