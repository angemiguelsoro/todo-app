<!DOCTYPE html>
<html>
<head>
    <title>Créer une tâche</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <h1>Nouvelle Tâche</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        @include('tasks._form', ['task' => null])
        <button type="submit">Enregistrer</button>
    </form>

    <a href="{{ route('tasks.index') }}">← Retour</a>
</body>
</html>
