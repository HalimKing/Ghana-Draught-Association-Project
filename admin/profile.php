
    <!-- side bar/navigation -->
    <?php 
    
        include('inc/session.php');
        include('./config.php');

        $sql = mysqli_query($conn, 'SELECT * FROM usertbl WHERE id="'. $_SESSION['SESS_ID'] .'"');
        if($sql) {
            if(mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_array($sql);

            }else{
                echo "<script>
                    window.location='logout.php';
                </script>";
                
            }
        }else{
            echo "<script>
                window.location='logout.php';
            </script>";
        }
    
    
    ?>
	<?php include('inc/sidebar.php') ?>



    <!-- header -->
	<?php include('inc/header.php') ?>

		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><span class=" text-secondary">Profile</span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">My Profile</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="profile-image">
                                                    <img src="img/uploaded_files/<?= $row['profilePicture'] ?>" alt="Avater">
                                                </div>
                                                <form action="./main/updateProfile.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group mt-3">
                                                        <input type="hidden" name="userId" value="<?= $row['id'] ?>">
                                                        <input type="file" name="avatar" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <button type="submit" name="updateProfilePicture" class="btn btn-outline-dark">Update</button>

                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 profile-details">
                                                <form action="./main/updateProfile.php" method="POST">
                                                    <div class="form-group">
                                                        <label for="">Full Name</label>
                                                        <input type="hidden" name="userId" value="<?= $row['id'] ?>">
                                                        <input type="text" value="<?= $row['fullName'] ?>" name="fullName" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="">Username</label>
                                                        <input type="text" value="<?= $row['username'] ?>" name="username" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="">Email</label>
                                                        <input type="email" value="<?= $row['email'] ?>" name="email" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="">Contact</label>
                                                        <input type="text" value="<?= $row['contact'] ?>" name="contact" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="">Gender</label>
                                                        <input type="text" value="<?= $row['gender'] ?>" name="gender" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <button type="submit" name="updateProfileDetails" class="btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
						</div>
					</div>
				</div>
			</main>

			<?php include('inc/footer.php') ?>