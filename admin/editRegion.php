
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>

    <?php include('./config.php');

        if(isset($_GET['regionId']) && !empty(isset($_GET['regionId']))) {
            $regionId = mysqli_real_escape_string($conn, $_GET['regionId']);
            $sqlRegion = mysqli_query($conn, "SELECT * FROM regiontbl WHERE id='$regionId'");
            if($sqlRegion) { 
                if(mysqli_num_rows($sqlRegion) >= 1) {
                    
                    $row = mysqli_fetch_assoc($sqlRegion);
                    $regionName = $row['regionName'];
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

					<h1 class="h3 mb-3">Manage Camps & Regions <span class=" text-secondary">/ Regions</span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">Edit Region</h3>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <form action="./main/updateRegion.php" method="POST" enctype="off">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Region Name<span class="text-danger">*</span></label>
                                                        <input type="hidden" value="<?= $row['id'] ?>" name="regionId">
                                                        <input type="text" value="<?= $regionName ?>" class="form-control" name="regionName" required>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12 ">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" name="updateRegion" class="btn btn-success">Update</button>
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