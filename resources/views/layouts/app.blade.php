<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('images/EventLogo.png') }}">
    <title>EventMaster Pro | {{ $title ?? 'Premium Event Management' }}</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }
        
        body {
            font-family: 'Figtree', sans-serif;
            overflow-x: hidden;
            color: var(--dark);
        }
        
        /* Modern Navbar */
        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            padding: 15px 0;
            transition: all 0.3s ease;
        }
        
        .navbar.scrolled {
            padding: 10px 0;
            box-shadow: 0 4px 30px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 12px;
            position: relative;
            color: var(--dark) !important;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: var(--gradient);
            transition: width 0.3s;
        }
        
        .nav-link:hover:after,
        .nav-link.active:after {
            width: 100%;
        }
        
        /* Hero Section */
        .hero {
            min-height: 90vh;
            display: flex;
            align-items: center;
            background: var(--gradient);
            position: relative;
            overflow: hidden;
            color: white;
        }
        
        .hero:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=2070&auto=format&fit=crop') no-repeat center/cover;
            opacity: 0.15;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto 2.5rem;
            opacity: 0.9;
        }
        
        /* Buttons */
        .btn-primary {
            background: white;
            color: var(--primary);
            border: none;
            padding: 12px 32px;
            font-weight: 600;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            color: var(--secondary);
        }
        
        /* Floating Elements */
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        /* Scroll Indicator */
        .scroll-down {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 1.5rem;
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-20px);}
            60% {transform: translateY(-10px);}
        }
        
        /* Section Styling */
        .section {
            padding: 100px 0;
            position: relative;
        }
        
        .section-title {
            font-weight: 700;
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            bottom: -10px;
            left: 0;
            background: var(--gradient);
            border-radius: 2px;
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/home">
                <i class="fas fa-calendar-star me-2"></i>EventMaster
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/events">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/venues">Venues</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tickets">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/registrations">Registrations</a>
                    </li>
                </li>
                <li class="nav-item ms-lg-3">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    @else
                        <a class="btn btn-primary" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    @endauth
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container text-center hero-content" data-aos="fade-up">
            <h1 class="hero-title">Elevate Your Event Experience</h1>
            <p class="hero-subtitle">Streamline the planning and coordination of all your events with our premium management platform</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-rocket me-2"></i>Register Now!
                </a>
                <a href="{{route('events.calendar')}}" class="btn btn-outline-light btn-lg" >
                    <i class="fas fa-calendar-alt me-2"></i>Explore Events
                </a>
            </div><br><br><br>
            <br><a href="#events" class="scroll-down">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </section>

    <!-- Events Section -->
    <section class="section bg-light" id="events">
        <div class="container">
            <div class="row g-4">
                <!-- Event cards would go here -->
                {{ $slot }}
            </div>
        </div>
    </section>
    

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h3 class="h5 mb-4">
                        <i class="fas fa-calendar-star me-2"></i>EventMaster Pro
                    </h3>
                    <p>Your complete solution for professional event management and planning.</p>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h4 class="h6 mb-4">Quick Links</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/home" class="text-white-50">Home</a></li>
                        <li class="mb-2"><a href="/events" class="text-white-50">Events</a></li>
                        <li class="mb-2"><a href="/venues" class="text-white-50">Venues</a></li>
                        <li class="mb-2"><a href="/registrations" class="text-white-50">Registrations</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 mb-4">
                    <h4 class="h6 mb-4">Contact Us</h4>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@eventmaster.com</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> +1 (555) 123-4567</li>
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Event St, Event City</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 mb-4">
                    <h4 class="h6 mb-4">Follow Us</h4>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="text-center text-white-50">
                <small>&copy; {{ date('Y') }} EventMaster Pro. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialize AOS animation
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <script>
        document.getElementById('logout-form').addEventListener('submit', function(e) {
            e.preventDefault();
            fetch(this.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: new URLSearchParams(new FormData(this))
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "{{ route('home') }}";
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>