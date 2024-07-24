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
        $image_title = $_POST['image_title'];
        $upload_dir = 'images/portfolio/';
        $uploaded_file = $upload_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaded_file)) {
            $sql = "INSERT INTO portfolio (image, image_title, uploaded_date) VALUES ('$uploaded_file', '$image_title', NOW())";
            $conn->query($sql);
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM portfolio WHERE id=$id";
        $conn->query($sql);
    }
}

$sql = "SELECT * FROM portfolio";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Management</title>
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
            <h2>Portfolio Management</h2>
            <form action="portfolio.php" method="post" enctype="multipart/form-data">
                <input type="text" name="image_title" placeholder="Image Title" required>
                <input type="file" name="image" required>
                <button type="submit" name="add">Add Image</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img src='" . $row['image'] . "' alt='" . $row['image_title'] . "' style='width: 100px;'></td>";
                            echo "<td>" . $row['image_title'] . "</td>";
                            echo "<td>" . $row['uploaded_date'] . "</td>";
                            echo "<td>
                                    <form action='portfolio.php' method='post'>
                                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                                        <button type='submit' name='delete'>Delete</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No images found</td></tr>";
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
