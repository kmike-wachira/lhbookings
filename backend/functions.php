<?php

include 'serve.php';

// Register User
if (isset($_POST['register'])) {
    $lecturer_name = mysqli_real_escape_string($conn, $_POST['lecturer_name']);
    $lecturer_email = mysqli_real_escape_string($conn, $_POST['lecturer_email']);
    $lecturer_phone = mysqli_real_escape_string($conn, $_POST['lecturer_phone']);
    $lecturer_password = mysqli_real_escape_string($conn, $_POST['lecturer_password']);
    $lecturer_c_password = mysqli_real_escape_string($conn, $_POST['lecturer_c_password']);

    if (!empty($lecturer_c_password) || !empty($lecturer_email) || !empty($lecturer_name) || !empty($lecturer_phone) || !empty($lecturer_password)) {
        if ($lecturer_password == $lecturer_c_password) {
            $register_sql = "INSERT INTO `users`(`name`, `email`, `phone`, `password`) 
            VALUES ('$lecturer_name','$lecturer_email','$lecturer_phone','$lecturer_password')";
            if ($conn->query($register_sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $register_sql . "<br>" . $conn->error;
            }
        } else {
            $error = "Password mismatch";
        }
    } else {
        $error = "You have empty fields";
    }
}
