<?php 
    session_start();
    require_once "database/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col-md-9 col-lg-6"><h2 align="center">Login</h2></div>
            <div class="col"></div>
        </div>
        <form action="api/login_server.php" method="POST">
            <?php if(isset($_SESSION['errors'])) : ?>
            <div class="row">
                <div class="col"></div>
                <div class="alert alert-danger col-md-9 col-lg-6">
                    <h4>
                        <?php 
                            echo $_SESSION['errors'];
                            unset($_SESSION['errors']);
                        ?>
                    </h4>
                </div>
                <div class="col"></div>
            </div>
            <?php endif ?>
            <div class="row">
                <div class="col"></div>
                <div class="col-md-9 col-lg-6">
                    <div class="form-group ">
                        <label for="exampleInputUsername">Username</label>
                        <input name="username" type="text" class="form-control" id="exampleInputUsername" aria-describedby="userHelp" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Enter Username">
                    </div>
                    <button name="login" type="submit" class="btn btn-primary">Submit</button>
                    <p>Create account member <a href="register.php">Sign up</a></p>
                </div>
                <div class="col"></div>
            </div>
        </form>
    </div>
</body>
</html>