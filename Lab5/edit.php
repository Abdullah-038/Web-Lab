<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM employees WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];

    $updateStmt = mysqli_prepare($conn, 
        "UPDATE employees SET name=?, email=?, salary=? WHERE id=?");
    mysqli_stmt_bind_param($updateStmt, "ssdi", $name, $email, $salary, $id);

    if(mysqli_stmt_execute($updateStmt)) {
        header("Location: index.php?status=success");
    } else {
        header("Location: index.php?status=error");
    }
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3>Edit Employee</h3>
        <form method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="<?= $row['name']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="<?= $row['email']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Salary</label>
                <input type="number" step="0.01" name="salary" value="<?= $row['salary']; ?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

</body>
</html>