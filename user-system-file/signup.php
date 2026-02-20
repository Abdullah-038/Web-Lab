<?php
include 'includes/header.php';

$message = "";

if(isset($_POST['signup'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $file = "data/users.txt";
    $users = file($file, FILE_IGNORE_NEW_LINES);

    foreach($users as $user){
        list($savedName, $savedEmail, $savedPassword) = explode("|", $user);
        if($savedEmail === $email){
            $message = "<div class='alert alert-danger'>Email already exists!</div>";
        }
    }

    if(empty($message)){
        $data = $name . "|" . $email . "|" . $password . PHP_EOL;
        file_put_contents($file, $data, FILE_APPEND);
        header("Location: login.php?success=1");
        exit();
    }
}
?>

<div class="col-md-6">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Create Account</h3>
        <?php echo $message; ?>

        <form method="POST">
            <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <button type="submit" name="signup" class="btn btn-primary w-100">Signup</button>
        </form>

        <p class="text-center mt-3">
            Already have account? <a href="login.php">Login</a>
        </p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>