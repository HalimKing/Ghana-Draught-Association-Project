
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>

		

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
                                                <h3 class=" card-title">Add User</h3>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <form action="./main/saveUser.php" method="POST" autocomplete="off">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Full Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="fullName" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Username</label>
                                                        <input type="text" class="form-control" name="username">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Email<span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Contact<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="contact" required>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Gender<span class="text-danger">*</span></label>
                                                        <select name="gender" id="" class="form-control" required>
                                                            <option value=""></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-sm-12 ">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" name="saveUser" class="btn btn-primary">Submit</button>
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