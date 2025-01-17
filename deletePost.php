<?php


    require_once 'config.php';

    if (isset($_GET["id"])) {
        $id=$_GET["id"];
        $image=$_GET["image"];
            $query="delete from posts where id=$id";

            $result=mysqli_query($conn,$query);

            if ($result) {
                header("Location: index.php");
                unlink("assets/images/postImage/$image");
            }else{
                header("Location: index.php");
            }

        }else{
            header("Location: index.php ");
        }

?>