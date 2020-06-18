<?php
include "database.php";
register();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Register New User</h1>
        <div class="row mt-5">
            <div class="col-md-4 offset-4">
                <form action="" method="post">

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" placeholder="Enter your Full Name" name="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" placeholder="Enter your Email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" placeholder="Enter your Password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" placeholder="Confirm your Password" name="cpassword" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="enter" class="form-control">
                    </div>
                    </form>
                    <p class="text-center">already a member... <a href="login.php" class="text-dark"><b> Login Here</b></a> </p>
            </div>
        </div>
    </div>
</body>

</html>
