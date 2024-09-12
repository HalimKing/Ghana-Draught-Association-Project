<?php 
    include('../inc/session.php');
    require('../config.php');

    if(isset($_GET["regionId"])) {
        $regionId = mysqli_real_escape_string($conn, $_GET['regionId']);
        $sql = mysqli_query($conn, "SELECT * FROM camptbl WHERE regionId='$regionId'");
        $camps = [];
        while($row = mysqli_fetch_array($sql)) {
            $camps[] = $row;
        }

        if($sql) { 
            $res = [
                'status' => 'success',
                'msg'=> 'Fetched Successfully',
                'data'=> $camps
            ];
            echo json_encode($res);
            return false;
        }else{
            mysqli_errno($conn);
        }
    }

    mysqli_close($conn);


?>