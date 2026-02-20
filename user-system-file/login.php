<?php
include 'includes/header.php';

$message = "";

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $file = "data/users.txt";
    $users = file($file, FILE_IGNORE_NEW_LINES);

    foreach($users as $user){
        list($name, $savedEmail, $savedPassword) = explode("|", $user);

        if($savedEmail === $email && password_verify($password, $savedPassword)){
            
            $_SESSION['user'] = [
                "name" => $name,
                "email" => $savedEmail
            ];

            $log = "User: ".$savedEmail." | Time: ".date("Y-m-d H:i:s").PHP_EOL;
            file_put_contents("data/login_logs.txt", $log, FILE_APPEND);

            header("Location: dashboard.php");
            exit();
        }
    }

    $message = "<div class='alert alert-danger'>Invalid email or password!</div>";
}
?>

<div class="col-md-6">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Login</h3>

        <?php
        if(isset($_GET['success'])){
            echo "<div class='alert alert-success'>Account created successfully!</div>";
        }
        echo $message;
        ?>

        <form method="POST">
            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>

        <p class="text-center mt-3">
            Don't have account? <a href="signup.php">Signup</a>
        </p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>