<?php
require_once 'config.php';
session_start();
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        
        $query = "select * from users";

        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)){
                $_SESSION["id"]=$row["id"];
                // $name = $row["name"];
                // $email = $row["email"];
                // $_SESSION["is_admin"] = $row["is_admin"];
                // $_SESSION["logged_in"] = true;
                if ($email==$row["email"]&&$password==$row["password"]) {
                    # code...
                    $_SESSION["logged_in"] = true;
                    header("Location: index.php");
                }else {

                    header("Location: login.php");
                }
            }
        }else {
            header("Location: login.php");
        }
    }else{
        header("Location: login.php");
    }

?>
