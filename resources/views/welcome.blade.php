<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Links</title>
</head>
<body>
    <h1>Navigatie</h1>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('profile.edit') }}">Profiel Bewerken</a></li>

        <h2>Events</h2>
        <li><a href="{{ route('events.index') }}">Overzicht Events</a></li>
        <li><a href="{{ route('events.create') }}">Event Aanmaken</a></li>

        <h2>Tickets</h2>
        <li><a href="{{ route('tickets.index') }}">Overzicht Tickets</a></li>
        <li><a href="{{ route('tickets.create') }}">Ticket Aanmaken</a></li>

        <h2>Ticket Types</h2>
        <li><a href="{{ route('ticket_types.index') }}">Overzicht Ticket Types</a></li>
        <li><a href="{{ route('ticket_types.create') }}">Ticket Type Aanmaken</a></li>

        <h2>Venues</h2>
        <li><a href="{{ route('venues.index') }}">Overzicht Locaties</a></li>
        <li><a href="{{ route('venues.create') }}">Locatie Aanmaken</a></li>

        <h2>Registrations</h2>
        <li><a href="{{ route('registrations.index') }}">Overzicht Registraties</a></li>
        <li><a href="#">Registratie Aanmaken (Event ID nodig)</a></li>
    </ul>
</body>
</html>
