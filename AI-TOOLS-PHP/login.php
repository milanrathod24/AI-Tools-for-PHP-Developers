<?php
session_start();
require_once 'middleware/auth.php';
// Prevent logged-in users from seeing the login page
checkGuest();

$error = '';

// Session 2 Example: Handling Login Submission & Debugging PHP Warnings
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Best practice to prevent warnings: use isset() instead of @ suppression
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (!empty($email) && !empty($password)) {
        // Mock Login functionality for beginner simplicity (without real DB validation)
        if ($email === 'student@aitools.com' && $password === 'password123') {
            $_SESSION['user_id'] = 1;
            $_SESSION['user_name'] = "PHP Student";
            header("Location: profile.php");
            exit();
        } else {
            $error = "Invalid credentials. Use student@aitools.com / password123";
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | AI Tools PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0">Student Login</h4>
                    </div>
                    <div class="card-body p-4">
                        <?php if($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        
                        <!-- AI Generated Form -->
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                        </form>
                        
                        <div class="text-center mt-3">
                            <p class="text-muted">Don't have an account? <a href="register.php">Register here</a></p>
                            <p class="small text-muted mb-0">Test Credentials: student@aitools.com / password123</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>