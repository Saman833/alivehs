<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Club</title>
</head>
<body>
<h1>Create New Club</h1>
<form action="{{ route('clubs.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    <br>

    <label for="number_of_members">Number of Members:</label>
    <input type="number" id="number_of_members" name="number_of_members" required>
    <br>

    <label for="owner_id">Owner ID:</label>
    <input type="number" id="owner_id" name="owner_id" required>
    <br>

    <button type="submit">Create Club</button>
</form>
</body>
</html>
