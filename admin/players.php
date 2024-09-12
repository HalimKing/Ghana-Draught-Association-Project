
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>


		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Manage Players / <span class=" text-secondary">Players</span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">Players</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="./addPlayer.php" class="btn btn-primary float-end">Add Player</a>
                                            </div>
                                        </div>
                                        <?php  
                                            if(isset($_SESSION['SESS_ERRORS'])) {
                                        ?>
                                        <div class="row pt-3">
                                            <div class="col">
                                                <div class="alert alert-warning" style="line-height: .5" class="p-3">
                                                    <div class="p-3">
                                                        <?php  
                                                            foreach ($_SESSION['SESS_ERRORS'] as $error) {
                                                                echo "<p> $error .</p>";
                                                            }
                                                        
                                                        ?>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <?php } ?>
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class=" table-responsive">
                                            <form id="filter-form" method="POST" class="w-100">
                                                <div class="row w-100">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Region <span id="error-message" class="text-danger">*</span></label>
                                                            <select id="regions" class="selectpicker form-control regions" data-show-subtext="true" data-live-search="true" name="regionId" >
                                                            <option  value=""></option>
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
                                                    <div class="col-md-4 ">
                                                        <div class="form-group">
                                                            <label for="">Camp</label>
                                                            <select id="camps" class="selectpicker form-control campData" data-show-subtext="true" data-live-search="true" name="campId">
                                                            <option  value=""></option>
                                                           
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <!-- <label for=""></label> -->
                                                            <button type="submit" name="filter" class="btn btn-info form-control extra-m">Filter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                             
                                            
                                            <table id="example" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Nick Name</th>
                                                        <th>Region</th>
                                                        <th>Camp</th>
                                                        
                                                        
                                                        <th>Picture</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                                        include('./config.php');

                                                        if(isset($_POST['filter'])) {
                                                            $campId = $_POST['campId'];
                                                            $regionId = $_POST['regionId'];
                                                            if($campId == '') {
                                                                $sql = mysqli_query($conn,"SELECT playerstbl.id,playerstbl.fullName,playerstbl.nickname,playerstbl.passportPicture,regiontbl.regionName,camptbl.campName FROM playerstbl
                                                                JOIN regiontbl ON regiontbl.id=playerstbl.regionId
                                                                JOIN camptbl ON camptbl.id=playerstbl.campId
                                                                WHERE playerstbl.regionId='$regionId'
                                                                ORDER BY playerstbl.fullName ASC");
                                                            }else {
                                                                $sql = mysqli_query($conn,"SELECT playerstbl.id,playerstbl.fullName,playerstbl.nickname,playerstbl.passportPicture,regiontbl.regionName,camptbl.campName FROM playerstbl
                                                                JOIN regiontbl ON regiontbl.id=playerstbl.regionId
                                                                JOIN camptbl ON camptbl.id=playerstbl.campId
                                                                WHERE playerstbl.campId='$campId' AND playerstbl.regionId='$regionId'
                                                                ORDER BY playerstbl.fullName ASC");
                                                            }
                                                            
                                                        }else {
                                                            $sql = mysqli_query($conn,'SELECT playerstbl.id,playerstbl.fullName,playerstbl.nickname,playerstbl.passportPicture,regiontbl.regionName,camptbl.campName FROM playerstbl
                                                            JOIN regiontbl ON regiontbl.id=playerstbl.regionId
                                                            JOIN camptbl ON camptbl.id=playerstbl.campId
                                                            ORDER BY playerstbl.fullName ASC');
                                                        }


                                                        
                                                        $count = 1;
                                                        while ($row = mysqli_fetch_assoc($sql)) {

                                                    ?>
                                                    <tr>
                                                        <td><?= $count ?></td>
                                                        <td><?= $row['fullName'] ?></td>
                                                        <td><?= $row['nickname'] ?></td>
                                                        <td><?= $row['regionName'] ?></td>
                                                        <td><?= $row['campName'] ?></td>
                                                        <td>
                                                            <img src="./img/uploaded_files/<?= $row['passportPicture'] ?>" width="50" alt="">
                                                        </td>
                                                        
                                                        <td>
                                                            <a href="./viewPlayer.php?playerId=<?= $row['id'] ?>" class="btn btn-info btn-sm">View</a>
                                                            <a href="./editPlayer.php?playerId=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                                            <a onclick="return confirm('You are about to delete this permanently!')" href="./main/deletePlayer.php?playerId=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $count++;
                                                        }
                                                    ?>
                                                   
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>#</th>
                                                        <th>Name</th>
                                                        <th>Nick Name</th>
                                                        <th>Region</th>
                                                        <th>Camp</th>
                                                        
                                                        <th>Picture</th>
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
            <?php unset($_SESSION['SESS_ERRORS']) ?>                                           
			<?php include('inc/footer.php') ?>