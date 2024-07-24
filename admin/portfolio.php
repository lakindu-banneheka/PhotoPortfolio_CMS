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
        $upload_dir = '../img/portfolio/';
        $uploaded_file = $upload_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaded_file)) {
            $sql = "INSERT INTO portfolio (image, image_title, uploaded_date) VALUES ('$uploaded_file', '$image_title', NOW())";
            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page to avoid resubmission on refresh
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM portfolio WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page after deletion
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$sql = "SELECT * FROM portfolio";
$result = $conn->query($sql);
$current_page = basename($_SERVER['PHP_SELF']);
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
                <!-- <img src="logo.png" alt="Logo" class="logo"> -->
                <div class="logo-text">Rettro</div> 
            </div>
            <ul>
                <li><a href="messages.php">Messages</a></li>
                <li class="<?php echo ($current_page == 'portfolio.php') ? 'active' : ''; ?>"><a href="portfolio.php">Portfolio</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="main-content">
            
                <h2>Portfolio Management</h2>

                <form class="img-form" action="portfolio.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="image_title" placeholder="Image Title" required>
                    <input type="file" name="image" required>
                    <button class="img-submit-btn" type="submit" name="add">Add Image</button>
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
                                        <button class='btn-delete' type='submit' name='delete'>Delete</button>
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
