<form method="POST" action="/users">
    @csrf
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required>

    <label for="date_of_birth">Fecha de nacimiento:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" required>

    <button type="submit">Guardar</button>
</form>