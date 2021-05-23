<?php
session_start();

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
                $last_id = $conn->insert_id;
                $_SESSION['id'] = $last_id;
                $_SESSION['username'] = $lecturer_name;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } else {
                header('location:../register.php');
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
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['name'];
                header('Location: ../index.php');
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

function bookHall($lecture_date, $lh_id, $lecture_period, $lecturer_id)
{
    global $conn;
    $book_status = true;
    $reserve_sql = "INSERT INTO `reservations`(`lecturehall_id`, `lecturer_id`, `date`, `period`)
     VALUES ('$lh_id','$lecturer_id','$lecture_date','$lecture_period')";
    if ($conn->query($reserve_sql) === TRUE) {
        $book_status = true;
    } else {
        $book_status = false;
    }
}

function ifBooked($lecture_date, $lh_id, $lecture_period)
{
    global $conn;
    $status = true;
    $check_sql = "SELECT * FROM `reservations` WHERE `lecturehall_id`='$lh_id' AND `date`= '$lecture_date'AND `period`='$lecture_period'";
    $result = $conn->query($check_sql);
    if ($result->num_rows > 0) {
        $status = true;
    } else {
        $status = false;
    }
    return $status;
}
function getHalls($students)
{
    global $conn;
    $capacity_sql = "SELECT * FROM `lecture_rooms` WHERE `lh_capacity`<='$students'";
    $halls = [];
    $result_set = $conn->query($capacity_sql);
    if ($result_set->num_rows > 0) {
        while ($row = $result_set->fetch_assoc()) {
            array_push($halls, $row);
        }
    }
    return $halls;
}

// ifBooked();

if (isset($_POST['book_lh'])) {
    unset($response_message);
    $lh_id = $_POST['hall_id'];
    $lecture_period = $_POST['lh_periods'];
    $lecture_date = $_POST['l_date'];
    $response_message = '';
    $response = ifBooked($lecture_date, $lh_id, $lecture_period);
    if ($response) {
        $response_message = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        if (bookHall($lecture_date, $lh_id, $lecture_period, '1')) {
            $response_message = 'correct';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $response_message = 'error';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}

function searchHalls()
{
    global $conn;
    $lecture_date = $_POST['lecture_date'];
    $lecture_periods = $_POST['lecture_periods'];
    $no_of_students = (int) $_POST['no_of_students'];
    $lecturehalls = [];

    $sql = "SELECT * FROM `lecture_rooms` WHERE `lh_capacity` < '$no_of_students' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $room_id = $row['id'];
            array_push($lecturehalls, $row);
        }
    } else {
        echo "0 results";
    }
    return $lecturehalls;
}

if (isset($_POST['check'])) {
    $students = $_POST['no_of_students'];
    header('Location:../halls.php?students=' . $students . '');
}
