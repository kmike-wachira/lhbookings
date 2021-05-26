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

function bookHall($lecture_date, $lh_id, $lecture_period, $lecturer_id, $unit_name)
{
    global $conn;
    $book_status = true;
    $reserve_sql = "INSERT INTO `reservations`(`lecturehall_id`, `lecturer_id`, `date`, `period`,`unit_name`)
     VALUES ('$lh_id','$lecturer_id','$lecture_date','$lecture_period','$unit_name')";
    if ($conn->query($reserve_sql) === TRUE) {
        $book_status = true;
    } else {
        $book_status = false;
    }
    return $book_status;
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

function ifBookedOriginal($lecture_date, $lh_id, $lecture_period)
{
    global $conn;
    $status = true;
    $check_sql = "SELECT * FROM `time_table` WHERE `hall_id`='$lh_id' AND `date`= '$lecture_date'AND `period`='$lecture_period'";
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

if (isset($_POST['book_lh'])) {
    unset($_SESSION['response_message']);
    $lh_id = $_POST['hall_id'];
    $lecture_period = $_POST['lh_periods'];
    $lecture_date = $_POST['l_date'];
    $unit_name = $_POST['unit_name'];
    $response = true;
    if (ifBooked($lecture_date, $lh_id, $lecture_period)) {
        if (!ifBookedOriginal($lecture_date, $lh_id, $lecture_period)) {
            $response = true;
        } else {
            $response = false;
        }
    } else {
        $response = false;
    }





    if ($response) {
        $_SESSION['response_message'] = 'trouble';
        header('Location:../reservation.php?id=' . $lh_id . '');
    } else {
        if (isset($_SESSION['id'])) {
            if (bookHall($lecture_date, $lh_id, $lecture_period, $_SESSION['id'], $unit_name)) {
                $_SESSION['response_message'] = 'correct';
                header('Location:../reservation.php?id=' . $lh_id . '');
                exit;
            } else {
                $_SESSION['response_message'] = 'error';
                header('Location:../reservation.php?id=' . $lh_id . '');
                exit;
            }
        } else {
            header('Location:../login.php ');
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

function getBookings()
{
    global $conn;
    $lectures = [];
    $sql = "SELECT *,`reservations`.id AS gid FROM `reservations` INNER JOIN lecture_rooms ON `reservations`.`lecturehall_id`=`lecture_rooms`.`id` ORDER by`date` ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($lectures, $row);
        }
    } else {
        echo "0 results";
    }
    return $lectures;;
}

function getOriginalBookings()
{
    global $conn;
    $lectures = [];
    $sql = "SELECT *,`time_table`.id AS gid FROM `time_table` INNER JOIN lecture_rooms ON `time_table`.`hall_id`=`lecture_rooms`.`id` ORDER by`date` ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($lectures, $row);
        }
    } else {
        echo "0 results";
    }
    return $lectures;;
}

function period($categ)
{
    $time = '';
    switch ($categ) {
        case 1:
            $time = "8 am - 11 am";
            break;
        case 2:
            $time = "11 am - 2 pm";
            break;
        case 3:
            $time = "2 pm - 5 pm";
            break;
    }
    return $time;
}

if (isset($_GET['deleteid'])) {
    deleteReserve($_GET['deleteid']);
}

function deleteReserve($reserveid)
{
    global $conn;
    $sql = "DELETE FROM `reservations` WHERE `id`='$reserveid'";

    if ($conn->query($sql) === TRUE) {
        header('Location:../schedules.php');
    } else {
        header('Location:../schedules.php');
    }
}

// print_r(getBookings());