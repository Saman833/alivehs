<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs</title>
</head>
<body>
<h1>Clubs</h1>
<a href="{{ route('clubs.create') }}">Create New Club</a>
<ul>
    @foreach ($clubs as $club)
        <li>
            <a href="{{ route('clubs.show', $club->id) }}">{{ $club->name }}</a>
            ({{ $club->number_of_members }} members)
            <a href="{{ route('clubs.edit', $club->id) }}">Edit</a>
            <form action="{{ route('clubs.destroy', $club->id) }}" method="post" style="display: inline;">
                @method('delete')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
