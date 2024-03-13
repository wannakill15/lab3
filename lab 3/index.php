<?php
session_start();
include "db_conn.php";

//passing the user input to validate
if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //validate data from the user input
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    //checking when user input a data
    if (empty($uname)) {
        header("Location: LoginForm.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: LoginForm.php?error=Password is required");
        exit(); 
        //checking the user input on the database if exist
    } else {
        $sql = "SELECT * FROM user_profile WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if ($row['Status'] == 'Verified'){
            header("Location: LoginForm.php?error=Please verified your account  ");
            exit();
        
            } else if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] === $uname && $row['password'] === $pass) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['name'] = $row['name']; 
                    $_SESSION['user_id'] = $row['user_id'];
                    header("Location: home.php");
                    exit();

            }else{
                header("Location: LoginForm.php?error=Incorrect User name or password");
                exit();
            }
        } else {
            header("Location: LoginForm.php?error=Incorrect User name or password");
            exit();
        }
    }
} else {
    header("Location: LoginForm.php");
    exit();
}

