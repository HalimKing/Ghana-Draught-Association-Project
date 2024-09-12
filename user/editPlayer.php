
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>

    <?php  

        include('./config.php');

        if(isset($_GET['playerId']) && !empty(isset($_GET['playerId']))) {
            $playerId = mysqli_real_escape_string($conn, $_GET['playerId']);
            $sqlPlayer = mysqli_query($conn, 'SELECT playerstbl.id,playerstbl.fullName,playerstbl.nickname,playerstbl.gender,playerstbl.contact,playerstbl.competitionsWon,playerstbl.yearWon,playerstbl.passportPicture,playerstbl.dateOfBirth,camptbl.campName,regiontbl.regionName
            FROM playerstbl
            JOIN regiontbl ON regiontbl.id=playerstbl.regionId
            JOIN camptbl ON camptbl.id=playerstbl.campId
            WHERE playerstbl.id="'. $playerId . '"');
            if($sqlPlayer) { 
                if(mysqli_num_rows($sqlPlayer) >= 1) {
                    
                    $rowPlayer = mysqli_fetch_assoc($sqlPlayer);
                    
                }else{
                    echo '<script>
                        window.location=404.php
                    </script>';
                }
            }else {
                echo '<script>
                        window.location=404.php
                    </script>';
            }
        }else {
            echo '<script>
                window.location=404.php
            </script>';
        }
    
    ?>

        
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Manage Players <span class=" text-secondary">/ Edit Player</span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">Player Details</h3>
                                                <input type="hidden" class="camp-name" value="<?= $rowPlayer['campName'] ?>">
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <form action="./main/updatePlayer.php" enctype="multipart/form-data" method="POST">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Full Name<span class="text-danger">*</span></label>
                                                        <input type="text" value="<?= $rowPlayer['fullName'] ?>" class="form-control" name="fullName" required>
                                                        <input type="hidden" value="<?= $rowPlayer['id'] ?>" class="form-control" name="playerId" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Nick Name</label>
                                                        <input type="text" value="<?= $rowPlayer['nickname'] ?>" class="form-control" name="nickName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Date Of Birth<span class="text-danger">*</span></label>
                                                        <input type="date" value="<?= $rowPlayer['dateOfBirth'] ?>" class="form-control" name="dateOfBirth" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Gender<span class="text-danger">*</span></label>
                                                        <select class="form-control" name="gender" required>
                                                            <option value=""></option>
                                                            <option <?php if($rowPlayer['gender'] == 'Male'){echo 'selected';} ?> value="Male">Male</option>
                                                            <option <?php if($rowPlayer['gender'] == 'Female'){echo 'selected';} ?> value="Female">Female</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Region<span class="text-danger">*</span></label>
                                                        <select id="regions" class="selectpicker form-control regions" data-show-subtext="true" data-live-search="true" name="regionId" required>
                                                            <option  value="empty"></option>
                                                            <?php 
                                                                include('./config.php');

                                                                $sqlRegion = mysqli_query($conn,'SELECT * FROM regiontbl ORDER BY regionName ASC');
                                                                while ($row = mysqli_fetch_assoc($sqlRegion)) {
                                                            
                                                            ?>
                                                            <option <?php if($rowPlayer['regionName'] == $row['regionName']){echo 'selected';} ?>  value="<?= $row['id'] ?>"><?= $row['regionName'] ?></option>
                                                            <?php 
                                                                }
                                                            ?>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Camp<span class="text-danger">*</span></label>
                                                        <select id="camps" class="selectpicker form-control campData" data-show-subtext="true" data-live-search="true" name="campId" required>
                                                            <option  value=""></option>
                                                            <option class="sel" value="king">king</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- start -->
                                            <div id="competions">
                                                <?php 
                                                    $playerId = mysqli_real_escape_string($conn, $_GET['playerId']);    
                                                    
                                                    $sqlCompetition = mysqli_query($conn, "SELECT * FROM competitiontbl WHERE playerId='$playerId'");
                                                    while($row = mysqli_fetch_assoc($sqlCompetition)) {
                                                
                                                ?>
                                                <div class="row mt-2">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="">Compititions Won</label>
                                                            <input type="hidden" value="<?php echo $row['id'] ?>" name="competitionId[]">
                                                            <input type="text" value="<?= $row['competitionName'] ?>" class="form-control" name="competitionsWon[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="">Year Won</label>
                                                            <input type="text" value="<?= $row['yearWon'] ?>" class="form-control" name="yearWon[]">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <?php        
                                                    }
                                                ?>

                                            </div>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <button type="button" id="add-competition" class="btn btn-info rounded-3 add-competition" title="click to add competition"><i class="fa fa-plus"></i> Add Competition</button>
                                                </div>
                                            </div>
                                            <!-- end -->
                                            
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Contact</label>
                                                        <input type="text" value="<?= $rowPlayer['contact'] ?>" class="form-control" name="contact">
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Passport Picture</label>
                                                        <input type="file" class="form-control" id="upload-product-image" name="passportPicture">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="passport-picture">
                                                            <img class="image-preview w-100" src="img/uploaded_files/<?= $rowPlayer['passportPicture'] ?>" alt="Image">

                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12 ">
                                                    <div class="form-group">
                                                        <button type="submit" name="updatePlayer" class="btn btn-success">Update</button>
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