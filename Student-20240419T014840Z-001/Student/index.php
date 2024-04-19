<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE-edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="style/style.css">
        <title>Login</title>
    </head>
    <body>
        <div class = "container">
            <div class = "box form-box">

            <?php
                include("php/config.php");
                if (isset($_POST['submit'])) {
                    $sr_code = mysqli_real_escape_string($con, $_POST['sr-code']); // Corrected variable name
                    $password = mysqli_real_escape_string($con, $_POST['password']);
        
                    $result = mysqli_query($con, "SELECT * FROM student_info WHERE sr_code='$sr_code' AND Password='$password'") or die("Select Error"); // Corrected field names
                    $row = mysqli_fetch_assoc($result);
        
                    if (is_array($row) && !empty($row)) {
                        $_SESSION['valid'] = $row['sr_code'];
                        $_SESSION['full_name'] = $row['full_name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['id'] = $row['Id'];
                    } else {
                        echo "<div class='message'>
                              <p>Wrong Username or Password</p>
                               </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Go Back</button>";
                    }
                    if (isset($_SESSION['valid'])) {
                        header("Location: lessons/home.php");
                    }
                } else {
            
            ?>
                 <header>
                    <div class="logo-container">
                        <img src="Web logo.png" alt="Logo" class="logo">
                        <div class="login-text"> Student Login</div>
                    </div>
                </header>
                <form action = "" method = "post">
                    <div class = "field input">
                        <input type = "text" name = "sr-code" id = "sr-code" placeholder="Sr - Code" autocomplete="off" required>
                    </div>
                        
                    <div class = "field input">
                        <input type = "password" name = "password" id = "password" placeholder="Password" autocomplete="off" required>
                    </div>

                    <div class = "field">
                        <input type = "submit" class="btn" name = "submit" value = "Login"  required>
                    </div>
                    <div class="links">
                        Don't have an account? <a href="register.php">Register Now</a>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </body>
</html>