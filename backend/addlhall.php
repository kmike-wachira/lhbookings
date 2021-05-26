<?php
include 'serve.php';
$target_dir = "../uploadimages/";
$target_file = $target_dir . basename($_FILES["lh_cover_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["add_lecture_hall"])) {
    $lh_name = mysqli_real_escape_string($conn, $_POST['lh_name']);
    $lh_capacity = mysqli_real_escape_string($conn, $_POST['lh_capacity']);
    $lh_description = mysqli_real_escape_string($conn, $_POST['lh_description']);

    $check = getimagesize($_FILES["lh_cover_image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["lh_cover_image"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {

    if (move_uploaded_file($_FILES["lh_cover_image"]["tmp_name"], $target_file)) {
        $lh_c_image = htmlspecialchars(basename($_FILES["lh_cover_image"]["name"]));
        $upload_sql = "INSERT INTO `lecture_rooms`(`lh_name`, `lh_capacity`, `lh_cover_image`, `lh_desc`)
        VALUES ('$lh_name','$lh_capacity','$lh_c_image','$lh_description')";
        if ($conn->query($upload_sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $upload_sql . "<br>" . $conn->error;
        }
       header("Location:../addlectureroom.php");
    } else {
        // echo "Sorry, there was an error uploading your file.";
       header("Location:../addlectureroom.php");

    }
}

