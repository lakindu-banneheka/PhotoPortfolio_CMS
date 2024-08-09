<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['title'], $_POST['message'])) {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $title = $conn->real_escape_string($_POST['title']);
        $message_content = $conn->real_escape_string($_POST['message']);
        
        $sql = "INSERT INTO messages (name, email, phone, title, message) VALUES ('$name', '$email', '$phone', '$title', '$message_content')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Message sent successfully!');</script>";
            
            // Optionally redirect or clear the form fields after showing the alert
            echo "<script>window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
        } else {
            // Properly escape and concatenate the error message in JavaScript
            $error_message = "Error: " . $sql . "\\n" . $conn->error;
            echo "<script>alert('{$error_message}');</script>";
        }
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="./css/main1.css" />  
    <link rel="stylesheet" href="./css/contact1.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <script>
        function showAlert(message, type) {
            alert(message);
        }
    </script>
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
                <h1>Contact Me</h1>
            </div>
            <img src="img/header.jpg" alt="Header">
        </section>

        <section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-left">
                <h2>Get in Touch</h2>
                <form action="contact.php" method="post">
                    <input type="text" name="name" placeholder="Enter your name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="phone" placeholder="Phone Number" required>
                    <input type="text" name="title" placeholder="Title" required>
                    <textarea name="message" placeholder="Enter your message" required></textarea>
                    <button type="submit">SEND</button>
                </form>
            </div>
            <div class="col-right">
                <h2>Contact Information</h2>
                <div class="contact-info">
                    <div class="info-item">
                        <i class="icon-home"></i>
                        <div class="info-text">
                            <h3>&#127968;Address</h3>
                            <p>Buttonwood, California.<br>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="icon-phone"></i>
                        <div class="info-text">
                            <h3>&#128222;Phone</h3>
                            <p>+1 253 565 2365<br>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="icon-email"></i>
                        <div class="info-text">
                            <h3>&#128231;Email</h3>
                            <p>support@colorlib.com<br>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
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
    <!-- Font Awesome for Social Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <script src="./js/main.js"></script>
</body>
</html>
