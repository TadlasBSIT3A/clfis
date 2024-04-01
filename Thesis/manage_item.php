<?php
session_start();

include 'check.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header('location: admin_login.php');
    exit();
}

// Retrieve username from session
$username = $_SESSION['username'];

$query = "SELECT * FROM item_list"; 
$result = mysqli_query($conn, $query); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/manage_item.css">
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
			<li >
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
			<li class="active">
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
					<h1>Item Lists</h1>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Items</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Item Name</th>
								<th>Item Type</th>
								<th>Landmark</th>
								<th>Date Created</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
            <?php 
            while($row = mysqli_fetch_assoc($result)) { 
            ?> 
            <tr> 
                <td><?php echo $row['item_name']; ?></td>
				<td><?php echo $row['item_type']; ?></td>  
                <td><?php echo $row['landmark']; ?></td> 
                <td><?php echo $row['date_time']; ?></td> 
                <td><span class="status pending">Pending</span></td>
                <td><button type="button" class="dropdown-toggle" >
			  Action
			  <i class='bx bxs-down-arrow'></i>
			</button>
			<ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="#"> <i class='bx bx-list-check'></i> View</a></li>
			  <li><a class="dropdown-item" href="#"> <i class='bx bxs-edit'></i> Edit</a></li>
			  <li><a class="dropdown-item" href="#"> <i class='bx bxs-trash' ></i> Delete</a></li>
			</ul></td>
            </tr> 
            <?php 
            } 
            ?> 
        </tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script/dashboard_script.js"></script>
	<script src="script/manage_item.js"></script>
</body>
</html>