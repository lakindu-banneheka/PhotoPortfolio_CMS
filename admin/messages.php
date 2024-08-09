<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages";
$result = $conn->query($sql);
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="../css/styles1.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
</head>
<body>
    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="logo-container">
                <!-- <img src="logo.png" alt="Logo" class="logo"> -->
                <div class="logo-text">Rettro</div> 
            </div>
            <ul>
                <li class="<?php echo ($current_page == 'messages.php') ? 'active' : ''; ?>"><a href="messages.php">Messages</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <h2>Messages</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Title</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['message'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No messages found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
