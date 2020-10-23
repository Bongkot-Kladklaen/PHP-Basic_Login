<?php 
    session_start();
    $filepath  = realpath(dirname(__FILE__));
    require_once $filepath.'../../controller/registerController.php';
    $conn = new Register();

    $error = array();

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];
        $email = $_POST['email'];

        if (empty($username)) {
            array_push($error,'Username is required');
        }
        if (empty($email)) {
            array_push($error,'Email is required');
        }
        if (empty($password)) {
            array_push($error,'Password is required');
        }
        if ($password_1 != $password_2) {
            array_push($error,'Password confirm do not match');
        }

        $checkUserOrEmailExist = $conn->checkUserAndEmail();
        if ($checkUserOrEmailExist) {
            if ($checkUserOrEmailExist['username'] === $username) {
                array_push($error,'Username already exists');
            }
            if ($checkUserOrEmailExist['email'] === $email) {
                array_push($error,'Email already exists');
            }
        }

        if (count($error) == 0) {
            $password = md5($password);

            $conn->setData($username, $password, $email);
            if($conn->insert()){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: ../index.php');
            }

        } else {
            array_push($errors, "Wrong username/pass");
            $_SESSION['errors'] = "Wrong username or password tyr again";
            header('location: ../register.php');
        }

    }



?>