<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT image, image_title, uploaded_date FROM portfolio ORDER BY uploaded_date DESC Limit 6";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="./css/main1.css">
    <link rel="stylesheet" href="./css/index1.css">
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
                <h1>I'm Ready to Exceed Expectations</h1>
                <p>Great photography is about depth of feeling, not depth of field.</p>
                <button class="contact-me-btn" onclick="location.href='contact.html'">Contact Me</button>
            </div>
            <img src="img/header.jpg" alt="Header">
        </section>        
        
        <section id="gallery">
            <div class="gallery-topic">
                <h1>Photography Portfolio</h1>
                <p>Explore some of the best moments captured through my lens.</p>
            </div>
            <div class="gallery-container">
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='gallery-item'>";
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
            <div class="gallery-button">
                <a href="portfolio.html"><button>More Images</button></a>
            </div>
        </section>

        <?php $conn->close(); ?>
            
            

        <section id="about-me">
            <div class="about-content">
                <h1>About Me</h1>
                <p>
                Hello! I’m Dinesh Chameera, a passionate photographer with a love for capturing moments that tell compelling stories. My journey into photography began with a simple fascination for the play of light and shadow. What started as a hobby quickly transformed into a lifelong pursuit, as I discovered the power of a well-timed shot to evoke emotions and preserve memories. Each click of the shutter is an opportunity to capture the essence of a moment, and I approach every project with a blend of creativity and technical precision.
                </p>
                <a href="./about.html" class="btn">About Me</a>
            </div>
            <div class="about-image">
                <img src="img/about-me.jpeg" alt="About Me">
            </div>
        </section>

        <section id="pricing">
            <div class="pricing-heading">
                <h2>Choose Your Package</h2>
                <p>Find the perfect plan that fits your photography needs. Whether it's a single shoot or a full package, we've got you covered.</p>
            </div>
            <div class="pricing-table">
                <div class="pricing-card">
                    <div class="card-content">
                        <h3>Silver</h3>
                        <p class="price">Rs.3,500.00</p>
                        <ul>
                            <li>2 Hours of Shooting</li>
                            <li>50 Edited Photos</li>
                            <li>Online Gallery</li>
                            <li>Free Consultation</li>
                        </ul>
                    </div>
                    <a href="contact.html" class="btn">Get Started</a>
                </div>
                <div class="pricing-card">
                    <div class="card-content">
                        <h3>Gold</h3>
                        <p class="price">Rs.7,500.00</p>
                        <ul>
                            <li>4 Hours of Shooting</li>
                            <li>100 Edited Photos</li>
                            <li>Online Gallery</li>
                            <li>Free Consultation</li>
                            <li>1 Photo Album</li>
                        </ul>
                    </div>
                    <a href="contact.html" class="btn"  >Get Started</a>
                </div>
                <div class="pricing-card">
                    <div class="card-content">
                        <h3>Premium</h3>
                        <p class="price">Rs.15,000.00</p>
                        <ul>
                            <li>Full Day Shooting</li>
                            <li>200 Edited Photos</li>
                            <li>Online Gallery</li>
                            <li>Free Consultation</li>
                            <li>2 Photo Albums</li>
                            <li>Custom Print Options</li>
                        </ul>
                    </div>
                    <a href="contact.html" class="btn">Get Started</a>
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
                <i class="fas fa-heart"></i> by team xx
            </div>
        </div>
    </footer>
</body>
</html>
