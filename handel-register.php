<?php
require_once 'config.php';

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = md5($_POST["password"]);

        $query = "insert into `users` (name,email,password,phone) values('$name','$email','$password','$phone')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: login.php");
        }
        else {
            header("Location: register.php");
        }
    }else{
        header("Location: register.php");
    }

?>