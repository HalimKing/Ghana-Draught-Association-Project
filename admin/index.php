
    <!-- side bar/navigation -->
	 <?php include('inc/session.php') ?>
	<?php include('inc/sidebar.php') ?>

    <!-- header -->
	<?php include('inc/header.php') ?>

	<?php  
		require('./config.php');
	
		function totalNumberOfPlayers($conn) {
			$sql = mysqli_query($conn,'SELECT * FROM usertbl');
			$totalPlayers = mysqli_num_rows($sql);
			return $totalPlayers;
		}
		function totalNumberOfCamps($conn) {
			$sql = mysqli_query($conn,'SELECT * FROM camptbl');
			$totalCamps = mysqli_num_rows($sql);
			return $totalCamps;
		}
		function totalNumberOfRegions($conn) {
			$sql = mysqli_query($conn,'SELECT * FROM regiontbl');
			$totalRegion = mysqli_num_rows($sql);
			return $totalRegion;
		}
		function totalNumberOfUsers($conn) {
			$sql = mysqli_query($conn,'SELECT * FROM usertbl');
			$totalUsers = mysqli_num_rows($sql);
			return $totalUsers;
		}
	?>
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-md-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Players</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= totalNumberOfPlayers($conn) ?></h1>
												<div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i></span>
													<span class="text-muted">Total number of players</span>
												</div>
											</div>
										</div>
										
									</div>
									<div class="col-md-3">
										
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Camps</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= totalNumberOfCamps($conn) ?></h1>
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i></span>
													<span class="text-muted">Total number of camps</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Regions</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= totalNumberOfRegions($conn) ?></h1>
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i></span>
													<span class="text-muted">Total number of regions</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Users</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= totalNumberOfUsers($conn) ?></h1>
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i></span>
													<span class="text-muted">Total number of users</span>
												</div>
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