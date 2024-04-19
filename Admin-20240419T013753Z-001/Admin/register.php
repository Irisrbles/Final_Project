<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Admin Register</title>
</head>
<body>
<div class="container">
    <div class="box form-box">

    <?php
        include("php/config.php");
        if(isset($_POST['submit'])){
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $sr_code = $_POST['sr_code'];
            $password = $_POST['password'];
            $admin_role = $_POST['admin_role']; 
            $contact_info = $_POST['contact_info'];
            $is_admin = 1; //

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $verify_query = mysqli_query($con, "SELECT Email FROM admin_info WHERE Email = '$email'");
            if(mysqli_num_rows($verify_query) !=0){
                echo "<div class = 'message'>
                        <p>This email is used, Try another one please!</p>
                    </div> <br>";
                echo "<a href = 'javascript:self.history.back()'><button class = 'btn' > Go back </button>";
            }

            else{
                mysqli_query($con, "INSERT INTO admin_info(full_name, email, sr_code, password) VALUES ('$full_name', '$email', '$sr_code', '$hashed_password')") or die("Error Occured");
                echo "<div class = 'message'>
                        <p>Registration Successfully!!</p>
                    </div> <br>";
                echo "<a href = 'index.php')'><button class = 'btn' > Login Now </button>";
            }
        } else {
    ?>


            <header>
                <div class="logo-container">
                    <img src="website logo-3.png" alt="Logo" class="logo">
                    <div class="login-text">Admin Register</div>
                </div>
            </header>
            <form action="" method="post">
                <div class="field input">
                    <input type="text" name="full_name" id="full_name" placeholder="Full Name" autocomplete="off" required>
                </div>

                <div class="field input">
                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <input type="text" name="sr_code" id="sr_code" placeholder="Sr - Code" autocomplete="off" required>
                </div>

                <div class="field input">
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <input type="text" name="contact_info" id="contact_info" placeholder="Contact Information" autocomplete="off" required>
                </div>

                <div class="field input">
                    <input type="text" name="admin_role" id="admin_role" placeholder="Admin Role" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already have an account? <a href="index.php">Login Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
