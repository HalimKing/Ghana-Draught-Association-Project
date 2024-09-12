<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_POST["savePlayer"])) {
        $userId = $_SESSION['SESS_ID'];
        // storing post values into variables
        $fullName = mysqli_real_escape_string($conn, $_POST["fullName"]);
        $nickname = mysqli_real_escape_string($conn, $_POST["nickName"]);
        $dateOfBirth = mysqli_real_escape_string($conn, $_POST["dateOfBirth"]);
        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
        $competitionsWon =  $_POST["competitionsWon"];
        $yearWon = $_POST["yearWon"];
        $campId = mysqli_real_escape_string($conn, $_POST["campId"]);
        $regionId = mysqli_real_escape_string($conn, $_POST["regionId"]);
        $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
        $passportPicture = $_FILES["passportPicture"];
        // Checking if picture is uploaded or not
        if($passportPicture['name'] == ""){
            $imageNameAndExtension = "avatar.png";
        }else {
            $imageName = $passportPicture["name"];
            $imagePathTemp = $passportPicture['tmp_name'];
            $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageNameWithoutExtension = pathinfo( $imageName, PATHINFO_FILENAME );
            $extensionsArray = ["jpg","jpeg",'png'];
            if(in_array($imageExtension, $extensionsArray)){
                $imageNameAndExtension = $imageNameWithoutExtension. time() . ".". $imageExtension;
                move_uploaded_file($imagePathTemp, "../img/uploaded_files/" . $imageNameAndExtension);
            }else {
                echo "<script>
                    alert('Invalid File');
                    window.location='../addPlayer.php';
                </script>";
                return false;
            }


            
            // return false;

        }

        // return false;

       

       
      
        $sql = mysqli_query($conn, "INSERT INTO playerstbl(fullName,nickname,dateOfBirth,gender,contact,regionId,campId,userId,passportPicture) VALUES('$fullName','$nickname','$dateOfBirth','$gender','$contact','$regionId','$campId','$userId','$imageNameAndExtension')");

        $qry = mysqli_query($conn, "SELECT * FROM playerstbl WHERE userId=$userId ORDER BY id DESC LIMIT 1");
        $rrr = mysqli_fetch_assoc($qry);
        $playerId = $rrr['id'];
        $totalCompetitions = count($competitionsWon);
        for ($i=0; $i < $totalCompetitions; $i++) { 
            # code...
            $competitionName = $competitionsWon[$i];
            $year = $yearWon[$i];

            if($competitionName == "" || $year == "") {
                continue;
            }
            $sql = mysqli_query($conn, "INSERT INTO competitiontbl(competitionName,yearWon,playerId) VALUES('$competitionName','$year','$playerId')");
        }

        if($sql) { 
            echo "<script>
                alert('Successful Added!');
                window.location='../players.php?success'
            </script>";
        }else{
            mysqli_errno($conn);
        }
        
        /*$sql = mysqli_query($conn, "SELECT * FROM playerstbl WHERE fullName='$fullName' AND dateOfBirth='$dateOfBirth' AND  LIMIT 1");
        if(mysqli_num_rows($sql) > 0) {
            echo "<script>
                alert('Campt already exist!');
                window.location='../addCamp.php'
            </script>";
        } else{
            $sql = mysqli_query($conn, "INSERT INTO playerstbl(fullName,nickname,dateOfBirth,gender,regionId,campId,competitionsWon,yearWon,passportPicture) VALUES('$fullName','$nickname','$dateOfBirth','$gender','$regionId','$campId','$competitionsWon','$yearWon','$passportPicture')");

            if($sql) { 
                echo "<script>
                    alert('Successful Added!');
                    window.location='../camps.php?success'
                </script>";
            }else{
                mysqli_errno($conn);
            }
        }*/
        
    }

    mysqli_close($conn);


?>