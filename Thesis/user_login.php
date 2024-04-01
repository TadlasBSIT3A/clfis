<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <link rel="stylesheet" href="css/users_login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="img/bisulogo.ico" type="image/x-icon">
</head>

<body>
    <!-- Login Form -->

    <div class="wrapper" id="loginForm">
        <form action="#" method="post">
            <h2>Student Login</h2>
            <div class="input-form">
                <input type="text" name="username" placeholder="Username" id="id_username" required autofocus>
            </div>
            <div class="input-form">
                <input type="password" name="password" placeholder="Password" id="id_password" required>
                <i class="far fa-eye" id="togglePassword"></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
            </div>
            <input type="submit" name="submit" class="login_btn" value="Login"></button>
            <div class="register-link">
                <p>Don't have account? <a href="#" onclick="toggleForm('registerForm')"> Register</a></p>
            </div>
        </form>
    </div>

    <!-- Registraion Form -->

    <div class="wrapper-reg" id="registerForm">
        <h2>Student Register</h2>
        <form action="#" method="post">
            <div class="input-form-reg">
                <input type="text" name="firstname" id="firstname" placeholder="Firstname" required>
                <input type="text" name="lastname" id="lastname" placeholder="Lastname" required>
                <input type="text" name="username" id="username" placeholder="Username" required>
                <input type="password" name="password" id="password" placeholder="Password"  required>
                <div class="pword_btn">
                    <i class="far fa-eye" id="reg_togglePassword"></i>
                </div>
                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" 
                    required>
                <div class="cpword_btn">
                    <i class="far fa-eye" id="confirmreg_togglePassword"></i>
                </div>
            </div>
            <input type="submit" class="reg_btn" value="Register">
        </form>
        <div class="form-switch">
            <p>Already have an account?
                <a href="#" onclick="toggleForm('loginForm')"> Login here</a>
            </p>
        </div>
    </div>
    <footer>
        <p>Campus Lost and Found Information System</p>
        <p>Bohol Island State University - Balilihan Campus</p>
    </footer>

    <script src="script/script.js"></script>
</body>

</html>