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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$item_type = $_POST['item_type']; 
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $landmark = mysqli_real_escape_string($conn, $_POST['landmark']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date_time = $_POST['date_time'];

    // Check if a file is selected
    if(isset($_FILES['item_image']) && $_FILES['item_image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/"; // Directory where the file will be saved
        $target_file = $target_dir . basename($_FILES["item_image"]["name"]);
        
        // Check if the file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["item_image"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file selected.";
    }

	$sql = "INSERT INTO item_list (item_type, item_name, landmark, description, item_image, date_time) VALUES ('$item_type', '$item_name', '$landmark', '$description', '$target_file', '$date_time')";

	if(mysqli_query($conn, $sql)) {
        echo "Item posted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection (if not using persistent connections)
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/post_item.css">
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
			<li>
				<a href="admin_dashboard.php">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
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
					<i class='bx bxs-message-dots'></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="manage_user.php">
					<i class='bx bxs-group'></i>
					<span class="text">Manage Users</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
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
			<i class='bx bx-menu'></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="profile">
				<img src="img/user_img2.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Post Item</h1>
				</div>
			</div>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>New Items Entry</h3>
					</div>
					<div class="post_item">
					<form action="" method="post" enctype="multipart/form-data" id="postForm">
							<label for="item_choose" class="form-label"> Select item type:</label>
							<input type="radio" id="lost" name="item_type" value="Lost" required>
  							<label for="choose1"> Lost</label>
  							<input type="radio" id="found" name="item_type" value="Found" required>
  							<label for="choose2"> Found</label><br>
							<label for="ItemName" class="form-label">Item Name:</label>
							<br>
							<input type="text" id="item_name" name="item_name" class="form-control" required>
							<br>
							<label for="landmark" class="form-label">Landmark Lost/Found:</label>
							<br>
							<input type="text" id="landmark" name="landmark" class="form-control" required>
							<div class="mb-3">
								<label for="formFile" class="form-label">Add Image:</label><br>
								<input class="input_image" type="file" id="formFile" name="item_image" onchange="previewImage(event)">
							</div>
                            <div class="mb-3">
                            <label for="date_time_lbl">Select (date and time):</label><br>
                            <input type="datetime-local" id="date_time" name="date_time" class="date_time1">
                            </div>
							<div class="mb-3">
								<label for="exampleFormControlTextarea1" class="form-label">Item Description:</label><br>
								<textarea class="form-control" id="description" name="description" rows="3" required></textarea>
							</div>
							<input type="submit" name="submit" class="post_btn" value="Save">
							<input type="submit" name="cancel" class="post_btn" value="Cancel">
						</form>
						<div class="addimage" id="imagePreview">
							<!-- this div is for the image preview -->
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script/dashboard_script.js"></script>
	<script src="script/post_item.js"></script>
</script>
</body>

</html>