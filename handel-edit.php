<?php
    require_once 'config.php';

    if (isset($_GET["id"])) {
        $id=$_GET["id"];
        $oldimage = $_GET["image"];
        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            $body = $_POST["body"];
            $image = $_FILES["image"];
            $image_error = $image['error'];
            $image_name = $image['name'];
            $image_size = $image['size'];
            $image_tmp_name = $image['tmp_name'];
            $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            $image_new_name = uniqid().".".$image_ext;

            if (!empty($image_name)) {
                unlink("assets/images/postImage/$oldimage");
                move_uploaded_file($image_tmp_name, "assets/images/postImage/$image_new_name");
            }else{
                $image_new_name = $oldimage;
            }

            $query="update posts set
            title = '$title',
            body = '$body',
            image='$image_new_name'
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