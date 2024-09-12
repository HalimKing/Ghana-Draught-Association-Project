
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>

		<!-- Modal -->
            <div class="modal fade" id="playersBulkUpload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Players Bulk Upload</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="addPlayersBulkUpload" required>
                            </div>
                            <div class="col-md-6">
                                <a href="" class="btn btn-success">Download Template</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Upload</button>
                    </div>
                </form>
                </div>
            </div>
            </div>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Manage Camps <span class=" text-secondary">/ Add Camp</span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">Add Camp</h3>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <form action="./main/saveCamp.php" method="POST" autocomplete="off">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Camp Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="campName" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Region<span class="text-danger">*</span></label>
                                                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" required name="regionId">
                                                            <option value=""></option>
                                                            <?php 
                                                                require('./config.php');
                                                                $reg = $_SESSION['SESS_REGION_ID'];

                                                                $regSql = mysqli_query($conn, 'SELECT * FROM regiontbl WHERE id="' . $reg . '"');
                                                                if($regSql) {
                                                                    while($row = mysqli_fetch_array($regSql)) {
                                                               
                                                            ?>
                                                            <option value="<?= $row['id'] ?>"><?= $row['regionName'] ?></option>
                                                            <?php 
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea name="description" id="" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12 ">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" name="saveCamp" class="btn btn-primary">Submit</button>
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