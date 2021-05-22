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

if (isset($_POST['login'])) {
    $lecturer_email = mysqli_real_escape_string($conn, $_POST['lecturer_email']);
    $lecturer_password = mysqli_real_escape_string($conn, $_POST['lecturer_password']);

    if (!empty($lecturer_email) || !empty($lecturer_password)) {
        $login_sql = "SELECT * FROM `users` WHERE `password`='$lecturer_password' AND `email`='$lecturer_email'";
        $result = $conn->query($login_sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["email"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE lastname='Doe'";
}
function getAllLectureHalls()
{
    global $conn;
    $all_lh_sql = "SELECT * FROM `lecture_rooms`";
    $lecturehalls = [];
    $result = $conn->query($all_lh_sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($lecturehalls, $row);
        }
    } else {
        echo "0 results";
    }
    return $lecturehalls;
}
function getSingleHall($id)
{
    global $conn;
    $all_lh_sql = "SELECT * FROM `lecture_rooms` WHERE id='$id'";
    $lecturehalls = [];
    $result = $conn->query($all_lh_sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($lecturehalls, $row);
        }
    } else {
        echo "0 results";
    }
    return $lecturehalls;
}
print_r(
    getSingleHall(1)
);
