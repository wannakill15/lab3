<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>REGISTRATION FORM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Stylesheet.css">
</head>
<body>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert text-center">
                    <?php 
                    if(isset($_SESSION['status']))
                    {
                        echo "<h4>".$_SESSION['status']."</h4>";                      
                        unset($_SESSION['status']);
                    }
                    ?>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <h5>Registration Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="reg.php" method="post">
                                
                                <div class="form-group mb-3">
                                    <label for="fname">First Name</label>
                                    <input type="text" id="fname" name="fname" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="mname">Middle Name</label>
                                    <input type="text" id="mname" name="mname" class="form-control"required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="lname">Last Name</label>
                                    <input type="text" id="lname" name="lname" class="form-control"required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control"required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="text" id="password" name="password" class="form-control"required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="uname">UserName</label>
                                    <input type="text" id="uname" name="uname" class="form-control"required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="reg_btn" class="btn btn-primary" >Register</button>
                                </div>
                                <div>
                                    <p>You have an account? <a href="Loginform.php">Sign up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
