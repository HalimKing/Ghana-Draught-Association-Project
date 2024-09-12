<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_GET["playerId"])) {
        $playerId = mysqli_real_escape_string($conn, $_GET['playerId']);
        $sql = mysqli_query($conn, "SELECT passportPicture FROM playerstbl WHERE id='$playerId'");
        $row = mysqli_fetch_array($sql);
       
        $sql = mysqli_query($conn, "DELETE FROM playerstbl WHERE id='$playerId'");
        // Delete competitions that are related to the player
        $qry = mysqli_query($conn, "DELETE FROM competitiontbl WHERE playerId='$playerId'");

        if($sql) { 
            if(file_exists('../img/uploaded_files/'.$row['passportPicture'])) {
                if('../img/uploaded_files/'.$row['passportPicture'] != 'avatar.png') {
                    unlink('../img/uploaded_files/'.$row['passportPicture']);
                }
            }
            echo "<script>
                alert('Successful Deleted!');
                window.location='../players.php?success'
            </script>";
        }else{
            mysqli_errno($conn);
        }
    }

    mysqli_close($conn);


?>