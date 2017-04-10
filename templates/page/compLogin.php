<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro Empresa</title>
    <link rel="stylesheet" type="text/css" href="/public/css/compForm.css">
</head>
<body>
    <h2>Registro Empresa</h2>
    <form action="POST">
        <label>Empresa</label>
        <input type="text" name="user" placeholder="nombre de la empresa" required><br><br>
        <label>Correo electrónico</label>
        <input type="email" name="mail" placeholder="correo electrónico" required><br><br>
        <label>Password</label>
        <input type="password" name="pass" placeholder="introduzca contraseña" requires><br><br>
        <input type="submit" name="" value="Enviar" id="button">
    </form>
</body>
</html>