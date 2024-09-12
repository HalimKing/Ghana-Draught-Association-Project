
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>
    <?php  

        include('./config.php');

        if(isset($_GET['playerId']) && !empty(isset($_GET['playerId']))) {
            $playerId = mysqli_real_escape_string($conn, $_GET['playerId']);
            $sqlPlayer = mysqli_query($conn, 'SELECT playerstbl.fullName,playerstbl.nickname,playerstbl.gender,playerstbl.contact,playerstbl.competitionsWon,playerstbl.yearWon,playerstbl.passportPicture,playerstbl.dateOfBirth,camptbl.campName,regiontbl.regionName
            FROM playerstbl
            JOIN regiontbl ON regiontbl.id=playerstbl.regionId
            JOIN camptbl ON camptbl.id=playerstbl.campId
            WHERE playerstbl.id="'. $playerId . '"');
            if($sqlPlayer) { 
                if(mysqli_num_rows($sqlPlayer) >= 1) {
                    
                    $rowPlayer = mysqli_fetch_assoc($sqlPlayer);
                    
                }else{
                    echo '<script>
                        window.location=404.html
                    </script>';
                }
            }else {
                echo '<script>
                        window.location=404.html
                    </script>';
            }
        }else {
            echo '<script>
                window.location=404.html
            </script>';
        }
    
    ?>


			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Manage Players <span class=" text-secondary">/ View Player</span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">Player Details</h3>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Full Name<span class="text-danger">*</span></label>
                                                        <p class="form-control"><?= $rowPlayer['fullName'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Nick Name</label>
                                                        <p class="form-control" style="height: 35px;"><?= $rowPlayer['nickname'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Date Of Birth<span class="text-danger">*</span></label>
                                                        <p class="form-control"><?= $rowPlayer['dateOfBirth'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Gender<span class="text-danger">*</span></label>
                                                        <p class="form-control"><?= $rowPlayer['gender'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Region<span class="text-danger">*</span></label>
                                                        <p class="form-control"><?= $rowPlayer['regionName'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Camp<span class="text-danger">*</span></label>
                                                        <p class="form-control"><?= $rowPlayer['campName'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                                $playerId = mysqli_real_escape_string($conn, $_GET['playerId']);    
                                                
                                                $sqlCompetition = mysqli_query($conn, "SELECT * FROM competitiontbl WHERE playerId='$playerId'");
                                                while($row = mysqli_fetch_assoc($sqlCompetition)) {
                                                
                                                ?>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Compititions Won</label>
                                                        <p class="form-control" style="height: 35px;"><?= $row['competitionName'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Year Won</label>
                                                        <p class="form-control" style="height: 35px;"><?= $row['yearWon'] ?></p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <?php        
                                                }
                                            ?>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Contact</label>
                                                        <p class="form-control"><?= $rowPlayer['contact'] ?></p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Passport Picture</label>
                                                        <p class="form-control">
                                                            <img class="w-100" src="img/uploaded_files/<?= $rowPlayer['passportPicture'] ?>" alt="Image">
                                                        </p>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                          
                                        </form>
                                    </div>
                                </div>

                            </div>
						</div>
					</div>
				</div>
			</main>

			<?php include('inc/footer.php') ?>