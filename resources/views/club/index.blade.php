<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS for styling -->
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-8 px-8">
    <h1 class="text-3xl font-bold text-center mb-8">All Clubs</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
        @foreach ($clubs as $club)
            <x-club-card
                :club-id="$club->id"
                :image="$club->image"
                :name="$club->name"
                :description="Str::limit($club->description, 100)"
                :number-of-members="$club->number_of_members"
                :owner-name="$club->owner->name"
            />
        @endforeach
    </div>
</div>
</body>
</html>
