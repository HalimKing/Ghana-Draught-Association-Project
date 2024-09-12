
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>

		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Manage Cmaps <span class=" text-secondary">/ Camps</span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">Camps</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="./addCamp.php" class="btn btn-primary float-end">Add Camp</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class=" table-responsive">
                                           
                                            
                                             
                                            
                                            <table id="example" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Camp</th>
                                                        <th>Region</th>
                                                        <th>Description</th>
                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        include('./config.php');
                                                        $reg = $_SESSION['SESS_REGION_ID'];

                                                        $sql = mysqli_query($conn, 'SELECT camptbl.campName,camptbl.description,camptbl.id, regiontbl.regionName
                                                        FROM camptbl
                                                        JOIN regiontbl ON regiontbl.id=camptbl.regionId
                                                        WHERE regionId="' . $reg . '"');
                                                    
                                                        $count = 1;
                                                        if($sql) {
                                                            while($row = mysqli_fetch_array($sql)) {

                                                         
                                                    ?>
                                                    <tr>
                                                        <td><?= $count ?></td>
                                                        <td><?= $row['campName'] ?></td>
                                                        <td><?= $row['regionName'] ?></td>
                                                        <td><?= $row['description'] ?></td>
                                                        
                                                        
                                                        <td>
                                                            <a href="./editCamp.php?campId=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                                            <a onclick="return confirm('You are about to delete this permanetly!')" href="./main/deleteCamp.php?campId=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php  
                                                            $count++;
                                                           }
                                                        }
                                                    ?>
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Camp</th>
                                                        <th>Region</th>
                                                        <th>Description</th>
                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
						</div>
					</div>
				</div>
			</main>

			<?php include('inc/footer.php') ?>