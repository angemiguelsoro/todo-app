<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<label for="title">Titre :</label>
<input type="text" name="title" id="title" value="{{ old('title', optional($task)->title) }}" required>

<br>

<label>
    <input type="checkbox" name="completed" {{ old('completed', optional($task)->completed) ? 'checked' : '' }}>
    Tâche terminée ?
</label>
