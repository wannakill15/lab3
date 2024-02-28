<?php
session_start();
include("db_conn.php");

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Stylesheet.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center h-100">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Welcome</h1>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">Hello, <?php echo $_SESSION['username']; ?></h2>
                        <div class="text-center">
                            <a href="logout.php" class="btn btn-primary">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
} else {
    header("Location: Loginform.php");
    exit();
}
?>
