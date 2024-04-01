<?php
session_start();

// Include database connection file
include 'check.php';

if (isset($_POST['submit'])) {
    // Retrieve form data
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];

    // Query the database to check if the username exists
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Username exists, retrieve the password
        $row = $result->fetch_assoc();
        $stored_pass = $row['password'];

        // Verify the password
        if (password_verify($pass, $stored_pass)) {
            // Password is correct, create session and redirect
            $_SESSION['username'] = $uname;
            header('location: admin_dashboard.php'); // Redirect to dashboard after login
            exit();
        } else {
            // Password is incorrect
            $error[] = 'Incorrect password!';
        }
    } else {
        // Username doesn't exist
        $error[] = 'User not found!';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/admin_login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="img/bisulogo.ico" type="image/x-icon">
</head>

<body>
    <!-- Login Form -->

    <div class="wrapper" id="loginForm">
        <form action="" method="post">
            <h2>Admin Login</h2>
            <?php if (isset($error)) {
                foreach ($error as $error_msg) {
                    echo '<span class="error-msg">' . $error_msg . '</span>';
                }
            }
            ?>
            <div class="input-form">
                <input type="text" name="username" placeholder="Username" id="id_username" required autofocus>
            </div>
            <div class="input-form">
                <input type="password" name="password" placeholder="Password"  id="id_password" required>
                <i class="far fa-eye" id="togglePassword"></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
            </div>
            <input type="submit" name="submit" class="login_btn" value="Login"></button>
            <div class="register-link">
                <p>Don't have account? <a href="admin_register.php""> Register</a></p>
            </div>
        </form>
    </div>
    <footer>
        <p>Campus Lost and Found Information System</p>
        <p>Bohol Island State University</p>
    </footer>

    <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('id_password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // Toggle eye icon class to change its appearance
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>

</html>