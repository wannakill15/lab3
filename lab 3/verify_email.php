<?php
session_start();
include('db_conn.php');


if(isset($_GET['token'])) {
    $token = $_GET['token'];
    $query = "SELECT verify_token, Status FROM user WHERE verify_token = '$token' LIMIT 1";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0) 
    {
        $row = mysqli_fetch_array($query_run);
        if($row['Status'] == 'Not Verified') 
        {
            $click_token = $row['verify_token'];
            $update_query = "UPDATE user SET Status = 'Verified' WHERE verify_token = '$click_token' LIMIT 1";
            $update_query_run = mysqli_query($conn, $update_query);

            if($update_query_run){

                $_SESSION['status'] = "Your Account has been Verified Successfully.!";
                header("Location: Loginform.php");
                exit(0);  

            }else{

                $_SESSION['status'] = "Verification Failed!";
                header("Location: Loginform.php");
                exit(0);  

            }
        }
        else 
        {
            $_SESSION['status'] = "This Email Already Verified. Please login.";
            header("Location: Loginform.php");
            exit(0);    
        }
    } 
    else 
    {
        $_SESSION['status'] = "This token doesnt exist";
        header("Location: Loginform.php");
    }
}
else
{
    $_SESSION['status'] = "Not Allowed";
    header("Location: Loginform.php");
}
?>