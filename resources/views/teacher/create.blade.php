{{-- resources/views/teachers/index.blade.php --}}
    <!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teachers</title>
</head>
<body>
<h1>Teachers</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<p><a href="{{ route('teacher.create') }}">Create teacher</a></p>

<table border="1" cellpadding="6">
    <thead>
    <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Created at</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($teachers as $teacher)
        <tr>
            <td>{{ $teacher->id }}</td>
            <td>{{ $teacher->first_name }}</td>
            <td>{{ $teacher->last_name }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->created_at }}</td>
            <td>
                <a href="{{ route('teacher.show', $teacher) }}">Show</a>
                |
                <a href="{{ route('teacher.edit', $teacher) }}">Edit</a>
                |
                <form action="{{ route('teacher.destroy', $teacher) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No teachers found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
