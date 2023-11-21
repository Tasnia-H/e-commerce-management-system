<?php
session_start();
include "test_conn.php";

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re_password']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $address = validate($_POST['address']);

    $user_data = 'uname=' . $uname . '&name=' . $name;

    if (empty($name) || empty($uname) || empty($pass) || empty($re_pass) || empty($email) || empty($phone) || empty($address)) {
        header("Location: signup.php?error=All fields are required&$user_data");
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {

        $pass = md5($pass);

        $sql_username = "SELECT * FROM customer WHERE user_name='$uname'";
        $sql_email = "SELECT * FROM customer WHERE email='$email'";

        $result_username = mysqli_query($conn, $sql_username);
        $result_email = mysqli_query($conn, $sql_email);

        if (mysqli_num_rows($result_username) > 0) {
            header("Location: signup.php?error=The username is taken. Please try another.&$user_data");
            exit();
        } elseif (mysqli_num_rows($result_email) > 0) {
            header("Location: signup.php?error=The email is already registered. Please use another email.&$user_data");
            exit();
        } else {
            $sql_insert = "INSERT INTO customer(user_name, password, name, email, phone, address) VALUES('$uname', '$pass', '$name', '$email', '$phone', '$address')";
            $result_insert = mysqli_query($conn, $sql_insert);

            if ($result_insert) {
                header("Location: signup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: signup.php?error=Unknown error occurred. Please try again.&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: signup.php");
    exit();
}
?>
