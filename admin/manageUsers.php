
    <!-- side bar/navigation -->
    <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>

		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><span class=" text-secondary">Manage Users <?php echo $_SESSION['SESS_ROLE'] ?> </span></h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class=" card-title">Users</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="./addUser.php" class="btn btn-primary float-end">Add User</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class=" table-responsive">
                                           
                                            <table id="example" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Username</th>
                                                        <th>Contact</th>
                                                        <th>Gender</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 

                                                        include('./config.php');

                                                        $sql = mysqli_query($conn, "SELECT * FROM usertbl ORDER BY fullName ASC");
                                                        $count = 1;
                                                        while ($row = mysqli_fetch_array($sql)) {
                                                    ?>
                                                    
                                                    <tr>
                                                        <td><?= $count ?></td>
                                                        <td><?= $row['fullName'] ?></td>
                                                        <td><?= $row['email'] ?></td>
                                                        <td><?= $row['username'] ?></td>
                                                        <td><?= $row['contact'] ?></td>
                                                        <td><?= $row['gender'] ?></td>
                                                        <td>
                                                            <a onclick="return confirm('Confirm to reset password!')" href="./main/resetPassword.php?userId=<?= $row['id'] ?>" class="btn btn-secondary btn-sm">Reset Password</a>
                                                            <a onclick="return confirm('Confirm to delete!')" href="./main/deleteUser.php?userId=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                                            <a href="./editUser.php?userId=<?= $row['id'] ?>" class="btn btn-success btn-sm">Edit</a>
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
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Username</th>
                                                        <th>Contact</th>
                                                        <th>Gender</th>
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