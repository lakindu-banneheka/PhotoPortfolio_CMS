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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $package_name = $_POST['package_name'];
        $price = $_POST['price'];
        $details = $_POST['details'];
        $sql = "INSERT INTO packages (package_name, price, details) VALUES ('$package_name', '$price', '$details')";
        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM packages WHERE id=$id";
        $conn->query($sql);
    }
}

$sql = "SELECT * FROM packages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Management</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="logo-container">
                <img src="logo.png" alt="Logo" class="logo">
            </div>
            <ul>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="packages.php">Packages</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <h2>Package Management</h2>
            <form action="packages.php" method="post">
                <div>
                    <label for="package_name">Package Name:</label>
                    <input type="text" name="package_name" id="package_name" required>
                </div>
                <div>
                    <label for="price">Price:</label>
                    <input type="number" name="price" id="price" required>
                </div>
                <div>
                    <label for="details">Details:</label>
                    <textarea name="details" id="details" required></textarea>
                </div>
                <button type="submit" name="add">Add Package</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Package Name</th>
                        <th>Price</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['package_name'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['details'] . "</td>";
                            echo "<td>
                                    <form action='packages.php' method='post'>
                                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                                        <button type='submit' name='delete'>Delete</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No packages found</td></tr>";
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
