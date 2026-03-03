<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "DELETE FROM employees WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);

if(mysqli_stmt_execute($stmt)) {
    header("Location: index.php?status=success");
} else {
    header("Location: index.php?status=error");
}
exit();
?>