
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>

    <?php 
    
    if(isset($_GET['userId']) && !empty(isset($_GET['userId']))) {
        $userId = mysqli_real_escape_string($conn, $_GET['userId']);
        // $sqlCamp = mysqli_query($conn, 'SELECT usertbl.fullName,usertbl.username,usertbl.email,usertbl.contact,usertbl.gender,usertbl.role,usertbl.regionId,usertbl.campId
        // FROM usertbl
        // JOIN regiontbl ON regiontbl.id=camptbl.regionId');
        $sqlUser = mysqli_query($conn, 'SELECT * FROM usertbl WHERE id="' . $userId . '"');
        if($sqlUser) { 
            if(mysqli_num_rows($sqlUser) >= 1) {
                
                $rowUser = mysqli_fetch_assoc($sqlUser);
                
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

					<h1 class="h3 mb-3"><span class=" text-secondary">Manage Users</span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">Edit User</h3>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <form action="./main/updateUser.php" method="POST" autocomplete="off">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Full Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="fullName" value="<?= $rowUser['fullName'] ?>" required>
                                                        <input type="hidden" class="form-control" name="userId" value="<?= $rowUser['id'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Username</label>
                                                        <input type="text" class="form-control" name="username" value="<?= $rowUser['username'] ?>">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Email<span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" name="email" value="<?= $rowUser['email'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Contact<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="contact" value="<?= $rowUser['contact'] ?>" required>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Gender<span class="text-danger">*</span></label>
                                                        <select name="gender" id="" class="form-control" required>
                                                            <option value=""></option>
                                                            <option <?php if($rowUser['gender'] == 'Male') { echo 'selected'; }  ?> value="Male">Male</option>
                                                            <option <?php if($rowUser['gender'] == 'Female') { echo 'selected'; }  ?> value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Role<span class="text-danger">*</span></label>
                                                        <select name="role" id="role" class="form-control" required>
                                                            <option value=""></option>
                                                            <option <?php if($rowUser['role'] == 'Admin') { echo 'selected'; }  ?> value="Admin">Admin</option>
                                                            <option <?php if($rowUser['role'] == 'User') { echo 'selected'; }  ?> value="User">User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2 show-camp-region <?php if($rowUser['role'] == 'Admin') { echo 'd-none'; }else{echo ''; }  ?> ">
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
                                            
                                            
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12 ">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" name="updateUser" class="btn btn-primary">Update</button>
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


            <script>
                $(document).on('change', '#role', function () {
                    var roleName = $(this).val();
                    if(roleName == 'User') {
                        $('.show-camp-region').removeClass('d-none');
                    }else{
                        $('.show-camp-region').addClass('d-none');
                    }
                });
            </script>