<!DOCTYPE html>
<html>
<head>
    <title>Liste des tâches</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <h1>Mes Tâches</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('tasks.create') }}">+ Nouvelle tâche</a>

    <ul>
        @forelse ($tasks as $task)
            <li>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">🗑</button>
                </form>

                <strong>{{ $task->title }}</strong>
                @if ($task->completed) ✅ @endif

                <a href="{{ route('tasks.edit', $task) }}">✏️ Modifier</a>
            </li>
        @empty
            <li>Aucune tâche pour l’instant.</li>
        @endforelse
    </ul>
</body>
</html>
