<!DOCTYPE html>
<html>
<head>
    <title>Modifier la tâche</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <h1>Modifier Tâche</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        @include('tasks._form', ['task' => $task])
        <button type="submit">Mettre à jour</button>
    </form>

    <a href="{{ route('tasks.index') }}">← Retour</a>
</body>
</html>
