
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>

		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><span class=" text-secondary">Change Password</span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">Change Password</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="./main/updateProfile.php" method="POST">
                                                    <div class="form-group">
                                                        <label for="">Current Password</label>
                                                        <input type="password" name="currentPassword" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="">New Password</label>
                                                        <input type="password" name="newPassword" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="">Confirm New Password</label>
                                                        <input type="password" name="confirmNewPassword" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <button type="submit" name="changePassword" class="btn btn-success">Change</button>
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