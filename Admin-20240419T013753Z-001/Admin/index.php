<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Admin Login</title>
</head>
<body>
<div class="container">
    <div class="box form-box">

        <?php
        session_start(); // Start session to manage user login state
        include("php/config.php");

        if (isset($_POST['submit'])) {
            $sr_code = mysqli_real_escape_string($con, $_POST['sr-code']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $result = mysqli_query($con, "SELECT * FROM admin_info WHERE sr_code='$sr_code' AND password='$password' AND is_admin='1'") or die("Select Error");
            $row = mysqli_fetch_assoc($result);

            if (is_array($row) && !empty($row)) {
                $_SESSION['admin_id'] = $row['Id'];
                $_SESSION['admin_full_name'] = $row['full_name'];
                $_SESSION['admin_email'] = $row['email'];

                header("Location: admin_dashboard.php");
                exit(); 
            } else {
           
                echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                echo "<a href='admin_login.php'><button class='btn'>Go Back</button>";
            }
        }
        ?>

        <header>
            <div class="logo-container">
                <img src="website logo-3.png" alt="Logo" class="logo">
                <div class="login-text">Admin Login</div>
            </div>
        </header>
        <form action="" method="post">
            <div class="field input">
                <input type="text" name="sr-code" id="sr-code" placeholder="Sr - Code" autocomplete="off" required>
            </div>
                
            <div class="field input">
                <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
            </div>

            <div class="field">
                <input type="submit" class="btn" name="submit" value="Login" required>
            </div>
            <div class="links">
                Don't have an account? <a href="register.php">Register Now</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
