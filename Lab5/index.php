<?php include 'db.php'; ?>

<?php
// Get employees
$result = mysqli_query($conn, "SELECT * FROM employees ORDER BY id DESC");

// Count employees
$countResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM employees");
$countRow = mysqli_fetch_assoc($countResult);
$totalEmployees = $countRow['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: linear-gradient(to right, #4e73df, #1cc88a);
            min-height: 100vh;
        }
        .card-custom {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Employee Management System</span>
        <a href="create.php" class="btn btn-success">Add Employee</a>
    </div>
</nav>

<div class="container mt-4">

    <!-- Dashboard Card -->
    <div class="card text-white bg-primary mb-4 card-custom">
        <div class="card-body">
            <h4>Total Employees</h4>
            <h2><?php echo $totalEmployees; ?></h2>
        </div>
    </div>

    <!-- Employee Table -->
    <div class="card card-custom shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th width="200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td>$<?= $row['salary']; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php if(isset($_GET['status'])): ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    <?php if($_GET['status'] == 'success'): ?>
        Swal.fire("Success!", "Operation completed successfully!", "success");
    <?php else: ?>
        Swal.fire("Error!", "Something went wrong!", "error");
    <?php endif; ?>
});
</script>
<?php endif; ?>

</body>
</html>