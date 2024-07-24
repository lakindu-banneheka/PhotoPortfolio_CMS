<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_dashboard";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$adminUsername = 'admin';
$adminPassword = password_hash('admin123', PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password) VALUES ('$adminUsername', '$adminPassword')";

if ($conn->query($sql) === TRUE) {
    echo "Admin user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
