<x-app-layout>
    <div class="container mt-4">
        <h2 class="mb-4 fw-bold text-primary">📅 Event Calendar</h2>
        <div id="calendar"></div>
    </div>

    <!-- FullCalendar CSS + JS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 'auto',
                events: @json($events),
                eventClick: function(info) {
                    alert('Event: ' + info.event.title);
                    // Je kunt hier ook redirecten naar een detailpagina als je wilt
                }
            });

            calendar.render();
        });
    </script>
</x-app-layout>
