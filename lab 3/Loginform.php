<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
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
                        ?>
                        <div class="alert alert-success">
                            <h4><?= $_SESSION['status'] ?></h4>               
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                        <h2>LOGIN</h2>
                        </div>
                        <div class="card-body">
                            <form action="index.php" method="post">

                                <?php
                                if (isset($_GET['error'])) {?>
                                <p class="error"> <?php echo $_GET['error']; ?></p>
                                <?php }?>

                                <div class="form-group">
                                    <label for="username"> User Name</label>
                                    <input type="text" id="username" class="form-control" name="uname" placeholder="User Name"><br>
                                </div>
                                <div class="form-group">
                                    <label for="password"> Password</label>
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Password"><br>
                                </div>
                                
                                <button type="submit" class="btn btn-primary w-100">LOGIN</button>
                            
                            </form>
                            
                            <p>Dont have a account? <a href="regform.php">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>