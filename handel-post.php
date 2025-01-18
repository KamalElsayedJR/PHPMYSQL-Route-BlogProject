<?php 

require_once 'config.php';
session_start();
if (isset($_POST["submit"])) {
    if (isset($_SESSION["id"])) {
        $userid = $_SESSION["id"];

        $title=htmlspecialchars(trim($_POST["title"]));
        $body=htmlspecialchars(trim($_POST["body"]));
        $image = $_FILES["image"];
        $image_error = $image['error'];
        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $image_new_name = uniqid().".".$image_ext;
        $query = "INSERT INTO `posts` (title, body, image,user_id) values('$title', '$body', '$image_new_name','$userid')";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            move_uploaded_file($image_tmp_name, "assets/images/postImage/$image_new_name");
            header("Location: index.php");
        }
        else{
            header("Location: addPost.php");
        }
    }else{
        header("Location: login.php");
    }

    
}else{
    header("Location:addPost.php");
}


?>