<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="./css/main1.css" />  
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
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
        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-left">
                        <h2>Get in Touch</h2>
                        <form action="process_form.php" method="post">
                            <textarea placeholder="Enter Message"></textarea>
                            <input type="text" placeholder="Enter your name">
                            <input type="email" placeholder="Email">
                            <input type="text" placeholder="Enter Subject">
                            <button type="submit">SEND</button>
                        </form>
                    </div>
                    <div class="col-right">
                        <div class="contact-info">
                            <div class="info-item">
                                <i class="icon-home"></i>
                                <p>Buttonwood, California.<br>Rosemead, CA 91770</p>
                            </div>
                            <div class="info-item">
                                <i class="icon-phone"></i>
                                <p>+1 253 565 2365<br>Mon to Fri 9am to 6pm</p>
                            </div>
                            <div class="info-item">
                                <i class="icon-email"></i>
                                <p>support@colorlib.com<br>Send us your query anytime!</p>
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
