<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User System (File Based)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">File User System</a>

        <?php if(isset($_SESSION['user'])): ?>
            <div>
                <span class="text-white me-3">
                    Welcome, <?php echo $_SESSION['user']['name']; ?>
                </span>
                <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
            </div>
        <?php endif; ?>
    </div>
</nav>

<div class="container d-flex justify-content-center align-items-center mt-5">