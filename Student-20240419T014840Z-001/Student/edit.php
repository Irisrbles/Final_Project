<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE-edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="style/style.css">
        <title>Change Profile</title>
    </head>
    <body>
        <div class="nav">
            <div class="logo">
                <p><a href="home.php">Logo</a></p>
            </div>
            
            <div class="right-links">
                <a href="edit.php">Change Profile</a>
                <a href="logout.php"> <buttom class="btn"> Log Out</buttom></a>
            </div>
        </div>
        <div class = "container">
            <div class = "box form-box">
                <header>Change Profile</header>
                <form action = "" method = "post">
                    <div class = "field input">
                        <label for = "fullname">Full Name</label>
                        <input type = "text" name = "fullname" id = "fullname" autocomplete="off" required>
                    </div>
                    <div class = "field input">
                        <label for = "email">Email</label>
                        <input type = "text" name = "email" id = "email" autocomplete="off" required>
                    </div>
                    <div class = "field input">
                        <label for = "sr-code">Sr - Code</label>
                        <input type = "text" name = "sr-code" id = "sr-code" autocomplete="off" required>
                    </div>

                    <div class = "field">
                        <input type = "submit" class="btn" name = "submit" value = "Update" required>
                    </div>
                    <div class="links">
                        Already have an account? <a href="index.html">Register Now</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>