
<form action="/register" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nombre completo"><br>
    <input type="email" name="email" placeholder="Correo electrónico"><br>
    <input type="password" name="password" placeholder="Conraseña"><br>
    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña"><br>
    <button type="submit">Registrar</button>
</form>
