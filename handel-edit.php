<?php
    require_once 'config.php';

    if (isset($_GET["id"])) {
        $id=$_GET["id"];

        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            $body = $_POST["body"];
            $_FILES["image"] = "";

            
            $query="update posts set
            title = '$title',
            body = '$body'
            where id = $id";

            $result=mysqli_query($conn,$query);

            if ($result) {
                header("Location: viewPost.php?id=$id");
            }else{
                header("Location: editPost.php?id=$id");
            }

        }else{
            header("Location: index.php ");
        }
    }else{
        header("Location: editPost.php");
    }









?>