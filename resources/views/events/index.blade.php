<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS for styling -->
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-8 px-8">
    <h1 class="text-3xl font-bold text-center mb-8">All Events</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
        @foreach ($events as $event)
            <x-event-card
                :event_id="$event->id"
                :image="$event->image"
                :name="$event->name"
                :description="Str::limit($event->description, 100)"
                :happening_time="$event->happening_time"
            />
        @endforeach
    </div>
</div>
</body>
</html>

