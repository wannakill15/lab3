<?php 
session_start();
include("db_conn.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';


function sendEmail_verify($username,$email,$verify_token) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'ken.ae26@gmail.com';                     //SMTP username
    $mail->Password   = 'lmed fzvu ztef bkf';                               //SMTP password
    $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('ken.ae26@gmail.com', 'Admin');
    $mail->addAddress($email);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification';
    $mail->Body    = "Your Verification code: $verify_token" ;
}

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
    $verify_token = md5(rand());

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
        $query = "INSERT INTO user(First_name, Middle_name, Lastname, Email, password, username, validate_code) VALUES('$first_name', '$middle_name', '$last_name', '$email', '$password', '$username', '$verify_token')";
        $query_run = mysqli_query($conn, $query);

        //successful run indicator
        //passes to the success.php
        if($query_run)
        {
            sendEmail_verify("$username","$email","$verify_token");
            $_SESSION['status'] = "Registration Successfull. Check your Email to Verify.";
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
