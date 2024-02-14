
<h1>Detalles del usuario</h1>
<p><strong>ID:</strong> {{ $user->id }}</p>
<p><strong>Nombre:</strong> {{ $user->name }}</p>
<p><strong>Correo electrónico:</strong> {{ $user->email }}</p>
<p><strong>Fecha de nacimiento:</strong> {{ $user->date_of_birth }}</p>

<form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
</form>
