<?php
session_start();

include 'check.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header('location: admmin_login.php');
    exit();
}

// Retrieve username from session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="icon" href="img/bisulogo.ico" type="image/x-icon">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

	<title>Campus Lost and Found Information System</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="img/bisulogo.png" alt="bisulogo">
			<span class="text">Lost and Found Information System</span>
		</a>
		
		<ul class="side-menu top">
			<li class="active">
				<a href="admin_dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="post_item.php">
					<i class='bx bxs-edit'></i>
					<span class="text">Post an item</span>
				</a>
			</li>
			<li>
				<a href="manage_item.php">
					<i class='bx bx-list-ul'></i>
					<span class="text">Manage Items</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="manage_user.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Manage Users</span>
				</a>
			</li>
		
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
			</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
				<h3>Welcome, <?php echo $username; ?>!</h3>
			</a>
			<a href="#" class="profile">
				<img src="img/user_img2.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>10</h3>
						<p>Active</p>
					</span>
				</li>
				<li>
				    <i class='bx bxs-flag-alt'></i>
					<span class="text">
						<h3>02</h3>
						<p>Pending</p>
					</span>
				</li>
				<li>
				    <i class='bx bxs-archive-out'></i>
					<span class="text">
						<h3>4</h3>
						<p>Clamied</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Activity</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
								<img src="img/user_img1.png">
									<p>Kenneth Tadlas</p>
								</td>
								<td>03-01-2024</td>
								<td><span class="status completed">Clamied</span></td>
							</tr>
							<tr>
								<td>
								<img src="img/user_img1.png">
									<p>James Warren Bucia</p>
								</td>
								<td>11-26-2023</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/user_img1.png">
									<p>Kathrine Mae Ayuban</p>
								</td>
								<td>09-01-2023</td>
								<td><span class="status process">Active</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script/dashboard_script.js"></script>
</body>
</html>