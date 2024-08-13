<?php
// Database connection
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "dashboard_db";

// $conn = new mysqli($servername, $username, $password, $dbname);

$servername = "bhtmwcfrbkzg6uviafdf-mysql.services.clever-cloud.com";
$username = "uihxtrpqjpai4akg";
$password = "Z3t4BwRQJQQh7cI7i107";
$dbname = "bhtmwcfrbkzg6uviafdf";
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT image, image_title, uploaded_date FROM portfolio ORDER BY uploaded_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portfolio</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="./css/main1.css">
    <link rel="stylesheet" href="./css/portfolio.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Rettro</div>
        <ul class="navbar-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="pricing.html">Pricing</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="navbar-toggle" id="navbar-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
    <main>
        <section id="head-image">
            <div class="text-overlay">
                <h1>Photography Portfolio</h1>
            </div>
            <img src="img/header.jpg" alt="Header">
        </section>

        <section id="gallery">
            <div class="gallery-topic">
                <p>Explore some of the best moments captured through my lens.</p>
            </div>
            <div class="gallery-container">
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='gallery-item' onclick='openModal(\"" . "./img/" . $row['image'] . "\", \"" . $row['image_title'] . "\")'>";
                            echo "<img src='" . "./img/" . $row['image'] . "' alt='" . $row['image_title'] . "'>";
                            echo "<div class='gallery-item-text'>";
                            echo "<p>" . $row['image_title'] . "</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No images found.</p>";
                    }
                ?>
            </div>
            <!-- Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <img class="modal-img" id="modalImg">
                    <div id="caption" class="modal-caption"></div>
                </div>
            </div>
        </section>



       
    </main>
    
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">Rettro</div>
            <ul class="footer-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="footer-social">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
            <div class="footer-copyright">
                This template is made
                <i class="fas fa-heart"></i> by team 33
            </div>
        </div>
    </footer>
</body>
</html>
