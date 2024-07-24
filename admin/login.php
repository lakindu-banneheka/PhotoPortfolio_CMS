<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling the login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // md5 encryption for simplicity, consider using stronger encryption in production

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        header('Location: messages.php');
    } else {
        $error = "Invalid username or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="../css/adminLogin.css">
    </head>
    <body>
        <div class="login-container">
            <div class="logo-container">
                <!-- <img src="logo.png" alt="Logo" class="logo"> -->
                <div class="login-form-brand">Rettro</div>
            </div>
            <form id="loginForm" action="login.php" method="POST">
                <h2>Admin Login</h2>
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                    <span id="usernameError" class="error-message"></span>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <span id="passwordError" class="error-message"></span>
                </div>
                <div id="serverError" class="error-message"></div>
                <button type="submit">Login</button>
            </form>
        </div>
        <script src="../js/adminLogin.js"></script>
    </body>
</html>
