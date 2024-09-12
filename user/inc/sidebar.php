<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="Ghana Draught Association">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/gda-logo-icon.jpeg" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Ghana Draught Association</title>

	<link href="../assets/css/app.css" rel= "stylesheet">
	<link href="../assets/css/light.css" rel= "stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<!-- data tables -->
	<link rel="stylesheet" href="../assets/css/dataTables.dataTables.css">
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
	

	<!-- dropdwon live search css -->
	<link rel="stylesheet" href="../assets/css/bootstrap-select.min.css">
	<!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.14/css/bootstrap-select.min.css">
	
    <!-- styles css -->
     <link rel="stylesheet" href="../assets/css/styles.css">
     <link rel="stylesheet" href="../assets/css/responsive.css">
</head>

<body>

<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
                    <span class="align-middle d-flex gap-2">
                        <img width="50" class=" rounded-5" src="./img/icons/gda-logo-icon.jpeg" alt="">
                        <span style="line-height: 1">Ghana Draught Association</span>
                    </span>
                </a>
                <ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="index.php">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                    </li>
					
					
					<li class="sidebar-item">
						<a data-bs-target="#manage-players" data-bs-toggle="collapse" class="sidebar-link collapsed dropdown-toggle" aria-expanded="false">
                        <i class="align-middle" data-feather="users"></i><span class="align-middle">Manage Players</span>
						</a>
						<ul id="manage-players" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="players.php 	">PLayers</a></li>
							
							
						</ul>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#manage-camps" data-bs-toggle="collapse" class="sidebar-link collapsed dropdown-toggle" aria-expanded="false">
                        <i class="align-middle" data-feather="coffee"></i><span class="align-middle">Manage Camps</span>
						</a>
						<ul id="manage-camps" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="./camps.php">Camps</a></li>
							
						</ul>
					</li>
                    </li>

                    
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./profile.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./changePassword.php">
                            <i class="align-middle" data-feather="lock"></i> <span class="align-middle">Change Password</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" onclick="return confirm('Confirm to logout!')" href="../logout.php">
                            <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
                        </a>
                    </li>
					
				</ul>

				

				
			</div>
		</nav>