<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Details</title>
</head>
<body>
<h1>{{ $club->name }}</h1>
<p><strong>Description:</strong> {{ $club->description }}</p>
<p><strong>Number of Members:</strong> {{ $club->number_of_members }}</p>
<p><strong>Owner ID:</strong> {{ $club->owner_id }}</p>
<a href="{{ route('clubs.index') }}">Back to Clubs</a>
</body>
</html>
