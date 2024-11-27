<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Club</title>
</head>
<body>
<h1>Edit Club</h1>
<form action="{{ route('clubs.update', $club->id) }}" method="post">
    @method('PUT')
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{$club->name }}" required>
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required>{{ $club->description }}</textarea>
    <br>

    <label for="number_of_members">Number of Members:</label>
    <input type="number" id="number_of_members" name="number_of_members" value="{{ $club->number_of_members }}" required>
    <br>

    <label for="owner_id">Owner ID:</label>
    <input type="number" id="owner_id" name="owner_id" value="{{ $club->owner_id }}" required>
    <br>

    <button type="submit">Update Club</button>
</form>
</body>
</html>
{{--<x-site-layout title="Edit article">--}}
{{--    <form action="{{route('user.articles.update', $club)}}" method="post" class="w-2/3 border border-gray-300 p-4" enctype="multipart/form-data">--}}
{{--        @method('PUT')--}}
{{--        @csrf--}}
{{--        <x-form-text name="clubName" label="club name" value="{{$article->name}}"/>--}}
{{--        <x-form-textarea name="content" label="dec" value="{{$article->content}}" placeholder="Make sure to have more than 1 paragraph"/>--}}
{{--        <x-form-select name="author_id" label="Author" value="{{$article->author_id}}" :options="\App\Models\User::pluck('name', 'id')->toArray()" />--}}
{{--        <x-form-checkboxes name="categories" label="Categories" :options="\App\Models\Category::orderBy('title')->pluck('title', 'id')->toArray()" :values="$article->categories->pluck('id')->toArray()" />--}}

{{--        <input type="file" name="image">--}}
{{--        @php $name='image'; @endphp--}}
{{--        @include('components.form._form-error-handling');--}}


{{--        <div class="w-full flex justify-end gap-x-8">--}}
{{--            <a href="{{route('user.articles.index')}}" class="text-xs text-gray-700 bg-gray-300 hover:bg-gray-200 px-4 py-2 rounded uppercase">Undo</a>--}}
{{--            <button type="submit" class="text-xs text-green-700 bg-green-300 hover:bg-green-200 px-4 py-2 rounded uppercase">Save changes</button>--}}
{{--        </div>--}}
{{--    </form>--}}

{{--</x-site-layout>--}}
