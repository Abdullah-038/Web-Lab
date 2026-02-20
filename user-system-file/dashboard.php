<?php
include 'includes/header.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<div class="col-md-8">
    <div class="card shadow p-4">
        <h3 class="mb-4">Dashboard</h3>

        <p><strong>Name:</strong> <?php echo $_SESSION['user']['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $_SESSION['user']['email']; ?></p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>