<form method="POST" action="/users/{{ $user->id }}">
    @csrf
    @method('PUT')

    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" value="{{ $user->name }}" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" value="{{ $user->email }}" required>

    <label for="date_of_birth">Fecha de nacimiento:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth }}" required>

    <button type="submit">Guardar cambios</button>
</form>