<form action="/login" method="POST">
    @csrf
    <input name="email" type="email" placeholder="Correo electrónico">
    <input name="password" type="password" placeholder="Contraseña">

    <label for="remember">
        <input type="checkbox" name="remember">
        Recordar contraseña
    </label>
    <button>Iniciar sesión</button>
    
    <a href="{{route('password.request')}}">Olvistaste tu contraseña?</a>

</form>
