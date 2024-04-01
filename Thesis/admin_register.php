<?php
session_start();
include 'check.php'; // Assuming 'check.php' contains database connection code

if (isset($_POST['submit'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    if ($pass !== $cpass) {
        $error[] = 'Passwords do not match!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Invalid email format!';
    } elseif (!preg_match('/@bisu\.edu\.ph$/', $email)) {
        $error[] = 'Email must end with @bisu.edu.ph';
    } else {
        $select = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($select);
        $stmt->bind_param('s', $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error[] = 'This username is already taken, please choose another one.';
        } else {
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
            $insert = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param('sss', $uname, $hashed_password, $email);
            $stmt->execute();
            header('location: admin_login.php');
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <link rel="stylesheet" href="css/admin_login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="img/bisulogo.ico" type="image/x-icon">
</head>

<body>
    <!-- Registraion Form -->
    <div class="wrapper-reg" id="registerForm">
        <form action="" method="post">
            <h2>Admin Register</h2>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <div class="input-form-reg">
                <input type="text" name="username" id="username" placeholder="Username" required>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
            </div>
            <input type="submit" class="reg_btn" name="submit" value="Register">
        </form>
        <div class="form-switch">
            <p>Already have an account?
                <a href="admin_login.php"> Login here</a>
            </p>
        </div>
    </div>
    <footer>
        <p>Campus Lost and Found Information System</p>
        <p>Bohol Island State University</p>
    </footer>
</body>

</html>