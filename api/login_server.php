<?php 
    session_start();
    $filepath = realpath(dirname(__FILE__));
    require_once $filepath."../../controller/loginController.php";
    $conn = new Login();

    $error = array();

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            array_push($error,"Username or Password is required");
            $_SESSION['errors'] = "Username or Password empty try again";
            header('location: ../login.php');
        }

        if (count($error) == 0) {
            $password = md5($password);

            $conn->setData($username,$password);
            $result = $conn->select();

            if(mysqli_num_rows($result) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Your are now logged in";
                header('location: ../index.php');
            } else {
                array_push($error, "Wrong username/pass");
                $_SESSION['errors'] = "Wrong username or password try again";
                header('location: ../login.php');
            }
        }
    }
?>