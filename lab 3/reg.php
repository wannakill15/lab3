<?php 
session_start();
include("db_conn.php");

function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

//passing the user input when the button is press
if(isset($_POST['reg_btn'])) 
{
    //variable the holds the input of the user before passing in the array
    $first_name = $_POST['fname'];
    $middle_name = $_POST['mname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['uname'];

    if (!is_valid_email($email)) {
        $_SESSION['status'] = "Invalid Email Format";
        header("Location: regform.php");
        exit();
    }


    //checks if the email that the user input exist or not in the database
    $check_email_query = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0){
        $_SESSION['status'] = "Email Already Exists";
        header("Location: regform.php");
    }else
    //storing the input of the user in the database
    {
        $query = "INSERT INTO user(First_name, Middle_name, Lastname, Email, password, username) VALUES('$first_name', '$middle_name', '$last_name', '$email', '$password', '$username')";
        $query_run = mysqli_query($conn, $query);

        //successful run indicator
        //passes to the success.php
        if($query_run)
        {
            $_SESSION['status'] = "Registration Successfull";
           header("Location: success.php");
           exit();
        }
        else //failed run indicator
        {
            $_SESSION['status'] = "Registration Failed";
            header("Location: regform.php");
        }
    }
    header("Location: regform.php");
    exit();
}
