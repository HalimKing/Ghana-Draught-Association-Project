
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>


    <?php $_SESSION['SESS'] = "KING BADD" ?>

		<!-- Modal -->
            <div class="modal fade" id="playersBulkUpload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Players Bulk Upload</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="uploadForm" action="./main/uploadBulk.php" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="addPlayersBulkUpload" accept=".xlsx" required>
                                <!-- <input type="text" class="form-control" name="nm"> -->
                            </div>
                            <div class="col-md-6">
                                <a href="./main/downloadTemplate.php?playersBulkUpload=true" class="btn btn-success">Download Template</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                    </div>
                </form>
                </div>
            </div>
            </div>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Manage Players <span class=" text-secondary">/ Add Player</span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">Add Single Player</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#playersBulkUpload">
                                                Bulk Upload
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <form action="./main/savePlayer.php" enctype="multipart/form-data" method="POST">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Full Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="fullName" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Nick Name</label>
                                                        <input type="text" class="form-control" name="nickName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Date Of Birth<span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" name="dateOfBirth" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Gender<span class="text-danger">*</span></label>
                                                        <select class="form-control" name="gender" required>
                                                            <option value=""></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            
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
                                                            <option value="<?= $row['id'] ?>"><?= $row['regionName'] ?></option>
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
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="competions">
                                                <div class="row mt-2">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="">Compititions Won</label>
                                                            <input type="text" class="form-control" name="competitionsWon[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="">Year Won</label>
                                                            <input type="text" class="form-control" name="yearWon[]">
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <button type="button" id="add-competition" class="btn btn-info rounded-3" title="click to add competition"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Contact</label>
                                                        <input type="text" class="form-control" name="contact">
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
                                                            
                                                            <img class="image-preview w-100" src="" alt="Image">

                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12 ">
                                                    <div class="form-group">
                                                        <button type="submit" name="savePlayer" class="btn btn-primary">Submit</button>
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