<?php 
    include('../inc/session.php');
    require('../config.php');


    require '../vendor/autoload.php';
    use FontLib\Table\Type\name;

    use PhpOffice\PhpSpreadsheet\IOFactory;

    $errorArray = array();
    // echo "dome";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['addPlayersBulkUpload'])) {
        if(pathinfo($_FILES['addPlayersBulkUpload']['name'], PATHINFO_EXTENSION) != "xlsx") {
            echo "
                <script>
                    alert('Invalid File');
                    window.location='../addPlayer.php';
                </script>
            ";
        }
        $imageNameAndExtension = "avatar.png";

        $file = $_FILES['addPlayersBulkUpload']['tmp_name'];
        $spreadsheet = IOFactory::load($file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Skip the first row (header)
        $count = 0;
        $userId = $_SESSION['SESS_ID'];
        for ($i = 2; $i < count($sheetData); $i++) {
            
            $fullName = ucwords(trim($sheetData[$i][0]));
            $nickname = ucwords(trim($sheetData[$i][1]));
            $dateOfBirth = ucwords(trim($sheetData[$i][2]));
            $gender = ucwords(strtolower(trim($sheetData[$i][3])));
            $contact = trim($sheetData[$i][4]);
            $region = ucwords(trim($sheetData[$i][5]));
            $camp = ucwords(trim($sheetData[$i][6]));
            $competitionsWon = ucwords(trim($sheetData[$i][7]));
            $yearWon = trim($sheetData[$i][8]);
            if(empty($fullName)) {
                continue;
            }

           
            $sqlCamp = mysqli_query($conn, "SELECT * FROM camptbl WHERE campName='$camp'");

            $sqlRegion = mysqli_query($conn,"SELECT * FROM regiontbl WHERE regionName='$region'");

            
            $rowNumber = 1 + $i;
            
            if(mysqli_num_rows($sqlRegion) > 0 && mysqli_num_rows($sqlCamp) > 0) {
                $rowCamp = mysqli_fetch_array($sqlCamp);
                $rowRegion = mysqli_fetch_array($sqlRegion);
                $regionId = $rowRegion['id'];
                $campId = $rowCamp['id'];

                $count = $count + 1;
                
                $sql = mysqli_query($conn, "INSERT INTO playerstbl(fullName,nickname,dateOfBirth,gender,contact,regionId,campId,userId,passportPicture) VALUES('$fullName','$nickname','$dateOfBirth','$gender','$contact','$regionId','$campId','$userId','$imageNameAndExtension')");

                // competition
                $competitions = explode(',',$competitionsWon);
                $years = explode(',',$yearWon);

                $qry = mysqli_query($conn, "SELECT * FROM playerstbl WHERE userId=$userId ORDER BY id DESC LIMIT 1");
                $rrr = mysqli_fetch_assoc($qry);
                $playerId = $rrr['id'];
                
                for ($j=0; $j < count($competitions); $j++) { 
                    $competitionName = $competitions[$j];
                    $year = $years[$j];
                    if($competitionName == "" || $year == "") {
                        continue;
                    }
                    $qry = mysqli_query($conn, "INSERT INTO competitiontbl(competitionName,yearWon,playerId) VALUES('$competitionName','$year','$playerId')");
                }
                


            }else if(mysqli_num_rows($sqlRegion) <= 0 && mysqli_num_rows($sqlCamp) <= 0) {
                $errorArray[] = "Region does not exist in the system! please check the spelling. [line " . $rowNumber  . "]";
                $errorArray[] = "Camp does not exist in the system! please check the spelling. [line $i]";

            }else if(mysqli_num_rows($sqlRegion) <= 0) {
                $errorArray[] = "Region does not exist in the system! please check the spelling. [line $rowNumber ]";

            }else if(mysqli_num_rows($sqlCamp) <= 0) {
                $errorArray[] = "Camp does not exist in the system! please check the spelling. [line $rowNumber ]";

            }

            

            // if ($conn->query($sql) !== TRUE) {
            //     echo "Error: " . $sql . "<br>" . $conn->error;
            // }
        }
        
        array_unshift($errorArray,"$count row(s) uploaded");
        $_SESSION['SESS_ERRORS'] = $errorArray;
       
        header('location:../players.php');
         
        


        // echo "Data uploaded successfully!";
        // return false;
        mysqli_close($conn);
        // exit();
    }
        


    


?>