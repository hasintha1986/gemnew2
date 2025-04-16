<?php
// මේ file එකේ නම: contact.php
?>
<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Precious Gems</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Original CSS from your aboutus.html file for consistency */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Arial', sans-serif; }
        body { line-height: 1.6; color: #333; background-color: #f4f4f4; }
        header { background-color: #1a1a1a; padding: 1rem 0; position: fixed; width: 100%; top: 0; z-index: 1000; }
        nav { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 2rem; }
        .logo h1 { color: #fff; font-size: 1.8rem; }
        .nav-links { display: flex; list-style: none; }
        .nav-links li { margin-left: 2rem; }
        .nav-links a { color: #fff; text-decoration: none; font-size: 1.1rem; transition: color 0.3s ease; }
        .nav-links a:hover { color: #c5a47e; }
        main { margin-top: 80px; /* Adjust if header height differs */ padding: 2rem; }
        footer { background-color: #1a1a1a; color: #fff; padding: 3rem 0 1rem; margin-top: 3rem; }
        .footer-content { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; padding: 0 2rem; }
        .footer-section h4 { margin-bottom: 1rem; color: #c5a47e; }
        .social-icons a { color: #fff; margin-right: 1rem; font-size: 1.5rem; transition: color 0.3s ease; }
        .social-icons a:hover { color: #c5a47e; }
        .footer-bottom { text-align: center; padding-top: 2rem; margin-top: 2rem; border-top: 1px solid #444; }
        /* Mobile Menu Toggle (Copied from aboutus.html) */
        .menu-toggle { color: #fff; font-size: 1.5rem; cursor: pointer; display: none; }
        @media (max-width: 768px) {
            .menu-toggle { display: block; }
            .nav-links { position: absolute; top: 100%; left: 0; right: 0; background: #1a1a1a; flex-direction: column; display: none; padding: 1rem; }
            .nav-links.active { display: flex; }
            .nav-links li { margin: 1rem 0; }
        }

        /* Form Specific Styles */
        .container { background-color: #fff; padding: 30px; border-radius: 5px; max-width: 600px; margin: 2rem auto; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        .container h2 { text-align: center; color: #333; margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; margin-top: 15px; font-weight: bold; color: #555; }
        input[type=text], input[type=email], textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        textarea { height: 150px; }
        button[type=submit] { background-color: #c5a47e; /* Match theme color */ color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; margin-top: 20px; transition: background-color 0.3s ease; }
        button[type=submit]:hover { background-color: #ad8b65; }
        .status-message { padding: 15px; margin-bottom: 20px; border-radius: 4px; text-align: center; font-size: 1.1em; }
        .success { background-color: #dff0d8; color: #3c763d; border: 1px solid #d6e9c6; }
        .error   { background-color: #f2dede; color: #a94442; border: 1px solid #ebccd1; }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Precious Gems</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="collection.html">Gems</a></li>
                <li><a href="aboutus.html">About</a></li>
                <li><a href="contact.php">Contact</a></li> </ul>
            <div class="menu-toggle"><i class="fas fa-bars"></i></div>
        </nav>
    </header>

    <main>
        <div class="container" id="form-anchor"> <h2>Contact Us</h2>
            <p style="text-align:center; margin-bottom:20px;">We'd love to hear from you. Please fill out the form below.</p>

            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'success') {
                    echo '<p class="status-message success">Thank you! Your message has been sent successfully.</p>';
                } elseif ($_GET['status'] == 'error') {
                    echo '<p class="status-message error">Sorry, there was an error sending your message. Please try again later.</p>';
                }
            }
            ?>

            <form action="send_email.php" method="post">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="user_name" required placeholder="Your Full Name">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="user_email" required placeholder="Your Email Address">
                </div>
                <div>
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="user_subject" required placeholder="Subject of your message">
                </div>
                <div>
                    <label for="message">Message:</label>
                    <textarea id="message" name="user_message" required placeholder="Write your message here..."></textarea>
                </div>
                <div>
                    <button type="submit" name="submit">Send Message</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Contact Us</h4>
                <p>Email: dhsdesilva@gmail.com</p> <p>Phone: +94772658261</p> <div class="social-icons"> <a href="https://web.facebook.com/hasinthas/" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/h_a_s_i._s/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://x.com/hasinth_s" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://wa.me/94772658261" target="_blank"><i class="fab fa-whatsapp"></i></a> </div>
            </div>
             </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> Precious Gems. All rights reserved.</p> </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navLinks = document.querySelector('.nav-links');
            if (menuToggle && navLinks) {
                menuToggle.addEventListener('click', function() {
                    navLinks.classList.toggle('active');
                });
            }
        });
         // Optional: Add sticky header script if used on other pages
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
             if (header) { // Check if header exists
                header.classList.toggle('scrolled', window.scrollY > 50); // Adjust scroll threshold if needed
            }
        });
    </script>

</body>
</html>