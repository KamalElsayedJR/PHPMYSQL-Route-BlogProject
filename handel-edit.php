<?php
    require_once 'config.php';
    session_start();

    if (isset($_GET["id"])) {
        $id=$_GET["id"];
        $oldimage = $_GET["image"];
        if (isset($_POST["submit"])) {
            if (isset($_SESSION["logged_in"])&&isset($_SESSION["id"])) {
                $userid = $_SESSION["id"];

                $title = htmlspecialchars(trim($_POST["title"]));
                $body = htmlspecialchars(trim($_POST["body"]));
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
            // not logged in not user logged
            header("Location: login.php");
        }
    }else{
        // not from submit
        header("Location: editPost.php?id=$id");
    }
}else{
    // not id submitted
    header("Location: index.php");
    }

?>