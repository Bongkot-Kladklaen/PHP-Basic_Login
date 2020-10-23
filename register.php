<?php 
    session_start();
    require_once "database/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col-md-9 col-lg-6"><h2 align="center">Register</h2></div>
            <div class="col"></div>
        </div>
        <form action="api/register_server.php" method="POST">
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
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input name="passwordConfirm" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Confirm Password">
                    </div>
                    <button name="register" type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col"></div>
            </div>
        </form>
    </div>
</body>
</html>