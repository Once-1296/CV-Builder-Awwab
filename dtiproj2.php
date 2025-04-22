<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder Pro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --text-color: #333;
            --bg-color: #fff;
            --card-bg: #fff;
            --section-light-bg: #ecf0f1;
            --section-dark-bg: #fff;
        }
        
        .dark-mode {
            --primary-color: #1a1a2e;
            --secondary-color: #4cc9f0;
            --accent-color: #f72585;
            --light-color: #16213e;
            --dark-color: #0f3460;
            --text-color: #f1f1f1;
            --bg-color: #121212;
            --card-bg: #1e1e1e;
            --section-light-bg: #16213e;
            --section-dark-bg: #1a1a2e;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 70px;
            color: var(--text-color);
            background-color: var(--bg-color);
            scroll-behavior: smooth;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        h1, h2, h3 {
            font-family: 'Playfair+Display', serif;
            color: var(--text-color);
        }
        
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.8rem;
        }
        
        .nav-link {
            font-weight: 600;
            margin: 0 10px;
            transition: all 0.3s ease;
            color: white !important;
        }
        
        .nav-link:hover {
            color: var(--secondary-color) !important;
            transform: translateY(-2px);
        }
        
        .btn-custom {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-custom:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }
        
        section {
            padding: 80px 0;
            transition: background-color 0.3s ease;
        }
        
        #intro {
            background-color: var(--section-light-bg);
        }
        
        #guide {
            background-color: var(--section-dark-bg);
        }
        
        #contact {
            background-color: var(--section-light-bg);
        }
        
        .intro-img {
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
        }
        
        .intro-img:hover {
            transform: scale(1.03);
        }
        
        .guide-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            margin-bottom: 30px;
            background-color: var(--card-bg);
        }
        
        .guide-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .guide-img {
            height: 200px;
            object-fit: cover;
        }
        
        .do-item, .dont-item {
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            position: relative;
            padding-left: 40px;
        }
        
        .do-item {
            background-color: rgba(46, 204, 113, 0.1);
            border-left: 4px solid #2ecc71;
        }
        
        .dont-item {
            background-color: rgba(231, 76, 60, 0.1);
            border-left: 4px solid #e74c3c;
        }
        
        .do-item::before, .dont-item::before {
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
        }
        
        .do-item::before {
            content: "\f00c";
            color: #2ecc71;
        }
        
        .dont-item::before {
            content: "\f00d";
            color: #e74c3c;
        }
        
        .contact-info {
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }
        
        .contact-icon {
            font-size: 24px;
            color: var(--secondary-color);
            margin-right: 15px;
        }
        
        .form-control {
            border-radius: 5px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            background-color: var(--card-bg);
            color: var(--text-color);
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
            background-color: var(--card-bg);
            color: var(--text-color);
        }
        
        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        
        /* Dark mode toggle button */
        .dark-mode-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            margin-left: 15px;
            transition: all 0.3s ease;
        }
        
        .dark-mode-toggle:hover {
            color: var(--secondary-color);
            transform: scale(1.1);
        }
        
        /* Animation classes */
        .slide-in-left {
            animation: slideInLeft 1s ease-out;
        }
        
        .slide-in-right {
            animation: slideInRight 1s ease-out;
        }
        
        @keyframes slideInLeft {
            from {
                transform: translateX(-100px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .fade-in {
            animation: fadeIn 1.5s ease-in;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <!-- Fixed Navbar with Dark Mode Toggle -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">ResumePro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#intro">Introduction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#guide">Guide</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-custom ms-2" href="index.html" target="_blank">Custom CV</a>
                    </li>
                    <li class="nav-item">
                        <button class="dark-mode-toggle" id="darkModeToggle" title="Toggle Dark Mode">
                            <i class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

      <!-- Introduction Section -->
      <section id="intro" class="animate__animated animate__fadeIn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 slide-in-left">
                    <h1 class="mb-4">Build Your Perfect Resume</h1>
                    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?>!</h2>
                    <p class="lead">Your resume is your first impression with potential employers. A well-crafted resume can open doors to new opportunities and help you stand out from the competition. Our expert guidance will help you create a professional, impactful resume that highlights your skills and experience effectively.</p>
                    <p>Whether you're a recent graduate or an experienced professional, we have the tools and advice you need to create a resume that gets noticed.</p>
                    <a href="#guide" class="btn btn-custom mt-3">Get Started</a>
                </div>
                <div class="col-lg-6 slide-in-right">
                    <img src="https://images.unsplash.com/photo-1610563166150-b34df4f3bcd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Resume Building" class="img-fluid intro-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Guide Section -->
    <section id="guide" class="animate__animated animate__fadeIn">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Resume Building Guide</h2>
                <p class="lead">Follow these expert tips to create a resume that stands out</p>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="guide-card animate__animated animate__fadeInUp">
                        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="card-img-top guide-img" alt="Resume Structure">
                        <div class="card-body">
                            <h3 class="card-title">Structure Matters</h3>
                            <p class="card-text">A well-organized resume makes it easy for hiring managers to find the information they need.</p>
                            <ul class="list-unstyled">
                                <li class="do-item">Use clear section headings (Experience, Education, Skills)</li>
                                <li class="do-item">List items in reverse chronological order</li>
                                <li class="dont-item">Don't use overly creative layouts that might confuse ATS systems</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="guide-card animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="card-img-top guide-img" alt="Resume Content">
                        <div class="card-body">
                            <h3 class="card-title">Content is Key</h3>
                            <p class="card-text">What you include (and exclude) can make or break your resume's effectiveness.</p>
                            <ul class="list-unstyled">
                                <li class="do-item">Tailor your resume to each job application</li>
                                <li class="do-item">Use action verbs and quantify achievements</li>
                                <li class="dont-item">Don't include irrelevant personal information</li>
                                <li class="dont-item">Avoid generic phrases like "team player"</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="guide-card animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="card-img-top guide-img" alt="Resume Design">
                        <div class="card-body">
                            <h3 class="card-title">Design & Formatting</h3>
                            <p class="card-text">A professional appearance creates a positive first impression.</p>
                            <ul class="list-unstyled">
                                <li class="do-item">Use a clean, professional font (11-12pt size)</li>
                                <li class="do-item">Maintain consistent formatting throughout</li>
                                <li class="dont-item">Don't use multiple fonts or colors</li>
                                <li class="dont-item">Avoid graphics that might confuse ATS systems</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="guide-card animate__animated animate__fadeInUp" style="animation-delay: 0.6s;">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="card-img-top guide-img" alt="Resume Mistakes">
                        <div class="card-body">
                            <h3 class="card-title">Common Mistakes</h3>
                            <p class="card-text">Avoid these pitfalls that can hurt your chances.</p>
                            <ul class="list-unstyled">
                                <li class="dont-item">Spelling and grammar errors</li>
                                <li class="dont-item">Including every job you've ever had</li>
                                <li class="dont-item">Using an unprofessional email address</li>
                                <li class="do-item">Always proofread multiple times</li>
                                <li class="do-item">Have someone else review your resume</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="animate__animated animate__fadeIn">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Contact Us</h2>
                <p class="lead">Have questions? Get in touch with our resume experts</p>
            </div>
            
            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="contact-info animate__animated animate__fadeInLeft">
                        <h3 class="mb-4">Our Information</h3>
                        <div class="d-flex align-items-start mb-4">
                            <i class="fas fa-map-marker-alt contact-icon"></i>
                            <div>
                                <h5>Address</h5>
                                <p>Veermata Jijabai Technological Institute, HR Mahajani Road, Matunga East, Mumbai, 400019</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-4">
                            <i class="fas fa-phone-alt contact-icon"></i>
                            <div>
                                <h5>Phone</h5>
                                <p>+91 12345 98765</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-4">
                            <i class="fas fa-envelope contact-icon"></i>
                            <div>
                                <h5>Email</h5>
                                <p>aswadekar_b24@it.vjti.ac.in
                                </p>
                                <p>AHSHIMOGA_b24@it.vjti.ac.in</p>
                                <p>kvnasta_b24@it.vjti.ac.in</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="fas fa-clock contact-icon"></i>
                            <div>
                                <h5>Working Hours</h5>
                                <p>Monday - Friday: 9am - 6pm<br>Saturday: 10am - 4pm</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-7 animate__animated animate__fadeInRight">
                    <div class="card border-0 shadow">
                        <div class="card-body p-5">
                            <h3 class="mb-4">Get Back to Us</h3>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="questions" class="form-label">Your Questions</label>
                                    <textarea class="form-control" id="questions" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-custom">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; 2025 ResumePro. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- EmailJS for form submission -->
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script>
        // Dark mode functionality
        const darkModeToggle = document.getElementById('darkModeToggle');
        const body = document.body;
        
        // Check for saved user preference
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme === 'dark') {
            body.classList.add('dark-mode');
            darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        }
        
        // Toggle dark/light mode
        darkModeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            
            // Update icon and save preference
            if (body.classList.contains('dark-mode')) {
                darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
                localStorage.setItem('theme', 'dark');
            } else {
                darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
                localStorage.setItem('theme', 'light');
            }
        });
        
        // Rest of your existing JavaScript remains the same
        // Initialize EmailJS with your public key
        (function() {
            emailjs.init("_BnSI3jubYibJomIc"); // Replace with your actual EmailJS public key
        })();
        
        // Form submission handler
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Get form data
            const formData = {
                name: document.getElementById('name').value,
                phone: document.getElementById('phone').value,
                email: document.getElementById('email').value,
                questions: document.getElementById('questions').value
            };
            
            // Send email using EmailJS
            emailjs.send('service_m18cmlu', 'template_guu3mmc', formData)
                .then(function(response) {
                    alert('Thank you for your message! We will get back to you soon.');
                    document.getElementById('contactForm').reset();
                }, function(error) {
                    alert('Oops! Something went wrong. Please try again later.');
                    console.error('EmailJS error:', error);
                });
        });
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Animation on scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.slide-in-left, .slide-in-right, .fade-in');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if (elementPosition < screenPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateX(0)';
                }
            });
        }
        
        // Run animations when page loads and on scroll
        window.addEventListener('load', animateOnScroll);
        window.addEventListener('scroll', animateOnScroll);
    </script>
</body>
</html>
