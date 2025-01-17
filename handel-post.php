<?php 

require_once 'config.php';
if (isset($_POST["submit"])) {
    $title=$_POST["title"];
    $body=$_POST["body"];
    $image = $_FILES["image"];
    $image_error = $image['error'];
    $image_name = $image['name'];
    $image_size = $image['size'];
    $image_tmp_name = $image['tmp_name'];
    $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $image_new_name = uniqid().".".$image_ext;

    $query = "INSERT INTO `posts` (title, body, image,user_id) values('$title', '$body', '$image_new_name',1)";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        move_uploaded_file($image_tmp_name, "assets/images/postImage/$image_new_name");
        header("Location: index.php");
    }
    else{
        header("Location: addPost.php");
    }

    
}else{
    header("Location:addPost.php");
}


?>