<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            color: #111827;
        }

        header {
            background-color: #1d4ed8;
            padding: 2rem 4rem;
            color: white;
        }

        header h1 {
            font-size: 2rem;
            font-weight: 700;
        }

        nav {
            margin-top: 1rem;
        }

        nav a {
            color: white;
            margin-right: 2rem;
            text-decoration: none;
            font-weight: 500;
        }

        .hero {
            background-color: #e0f2fe;
            padding: 4rem;
            text-align: center;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #1e3a8a;
        }

        .hero p {
            font-size: 1.2rem;
            color: #334155;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            padding: 3rem 4rem;
        }

        .card {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            padding: 2rem;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin-bottom: 1rem;
            font-size: 1.25rem;
            color: #1e40af;
        }

        .card p {
            font-size: 1rem;
            color: #4b5563;
        }

        footer {
            background-color: #1e293b;
            color: #cbd5e1;
            text-align: center;
            padding: 2rem;
            margin-top: 3rem;
        }

    </style>
</head>
<body>
    <header>
        <h1>🎉 Event Management</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">Events</a>
            <a href="#">Venues</a>
            <a href="#">Registrations</a>
            <a href="#">Profile</a>
        </nav>
    </header>

    <section class="hero">
        <h2>Plan. Organize. Celebrate.</h2>
        <p>Your all-in-one platform for creating and managing amazing events!</p>
    </section>

    <section class="cards">
        <div class="card">
            <h3>📅 Manage Events</h3>
            <p>Create, update and schedule your events in just a few clicks.</p>
        </div>
        <div class="card">
            <h3>📍 Venues</h3>
            <p>Set up venue details, room layouts, and capacities with ease.</p>
        </div>
        <div class="card">
            <h3>✅ Registrations</h3>
            <p>Handle participant registrations and status effortlessly.</p>
        </div>
        <div class="card">
            <h3>📬 Confirmation Emails</h3>
            <p>Send automated confirmation mails with QR check-ins.</p>
        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} Event Management System — All rights reserved.
    </footer>
</body>
</html>
