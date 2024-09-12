
<?php  

	require_once('./config.php');

	$sqlh = mysqli_query($conn,'SELECT * FROM usertbl WHERE id="'. $_SESSION['SESS_ID'] .'"');
	if(mysqli_num_rows($sqlh) > 0) {
		$rowh = mysqli_fetch_array($sqlh);
	}
?>
<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
				<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <img src="img/uploaded_files/<?= $rowh['profilePicture'] ?>" class="avatar img-fluid rounded rounded-5 me-1" alt="avatar" /> <span class="text-dark"><?= $rowh['username'] ?></span>
                            </a>
							<div class="dropdown-menu dropdown-menu-end p-3">
								<a class="dropdown-item" href="./profile.php"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="./changePassword.php"><i class="align-middle me-1" data-feather="lock"></i> Change Password</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" onclick="return confirm('Confirm to logout!')" href="../logout.php"><i class="align-middle me-1" data-feather="log-in"></i>Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>