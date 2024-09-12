<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_POST["updatePlayer"])) {

        $competitionId = $_POST["competitionId"];
        $playerId = mysqli_real_escape_string($conn, $_POST["playerId"]);
        $fullName = mysqli_real_escape_string($conn, $_POST["fullName"]);
        $nickname = mysqli_real_escape_string($conn, $_POST["nickName"]);
        $dateOfBirth = mysqli_real_escape_string($conn, $_POST["dateOfBirth"]);
        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
        $competitionsWon = $_POST["competitionsWon"];
        $yearWon = $_POST["yearWon"];
        $campId = mysqli_real_escape_string($conn, $_POST["campId"]);
        $regionId = mysqli_real_escape_string($conn, $_POST["regionId"]);
        $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
        $passportPicture = $_FILES["passportPicture"];

      
        $sql = mysqli_query($conn, "SELECT passportPicture FROM playerstbl WHERE id='$playerId'");
        $row = mysqli_fetch_assoc($sql);
        $file = '../img/uploaded_files/'.$row['passportPicture'];
        if($passportPicture['name'] == ""){
            $imageNameAndExtension = $row['passportPicture'];
        }else {
           
            if(file_exists($file) && $row['passportPicture'] != 'avater.png'){
                unlink('../img/uploaded_files/'.$row['passportPicture']);
            }
            // echo $passportPicture['size'];
            // if($passportPicture['size'] > 30000){
            //     echo "<script>
            //     alert('The file size is greater than the require file size (350kb)');
            //     window.location='../editPlayer.php?playerId='. $playerId;
            //     </script>";
            // }
            
            // return false;
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
                    window.location='../editPlayer.php?playerId='. $playerId;
                </script>";
                return false;
            }


            
            // return false;

        }

        // return false;



        $sql = mysqli_query($conn, "UPDATE playerstbl SET fullName='$fullName',nickname='$nickname',dateOfBirth='$dateOfBirth',gender='$gender',contact='$contact',regionId='$regionId',campId='$campId',passportPicture='$imageNameAndExtension' WHERE id='$playerId'");

        
        for ($i=0; $i < count($competitionId); $i++) { 
            $competitionName = $competitionsWon[$i];
            $year = $yearWon[$i];

            if($competitionId[$i] == "") {
                $qry = mysqli_query($conn, "INSERT INTO competitiontbl(competitionName,yearWon,playerId) VALUES('$competitionName','$year','$playerId')");
            }else{
                $qry = mysqli_query($conn, "UPDATE competitiontbl SET competitionName='$competitionName',yearWon='$year' WHERE id='$competitionId[$i]'");
            }
        }
       

        if($sql) { 
            echo "<script>
                alert('Successful Update!');
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