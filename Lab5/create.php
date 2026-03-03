<?php include 'db.php'; ?>

<?php
if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];

    $stmt = mysqli_prepare($conn, "INSERT INTO employees (name, email, salary) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssd", $name, $email, $salary);

    if(mysqli_stmt_execute($stmt)) {
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
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3>Add Employee</h3>
        <form method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Salary</label>
                <input type="number" step="0.01" name="salary" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

</body>
</html>