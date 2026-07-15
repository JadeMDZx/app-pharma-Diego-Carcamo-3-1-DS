<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>
<body>
    <div class="registro-container">
        <h1>Registro de Cliente</h1>
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej: María Pérez" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="cliente@ejemplo.com" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="+503 7000-0000">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <textarea id="direccion" name="direccion" rows="3" placeholder="Colonia, calle, número..."></textarea>
            </div>
            <button type="submit" class="btn-registrar">Registrar Cliente</button>
        </form>
        <p class="footer-text">Todos los campos son obligatorios</p>
    </div>
</body>
</html>