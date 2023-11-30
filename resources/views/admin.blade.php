<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="{{ route('admin.users') }}">Usuarios</a></li>
        <li><a href="{{ route('admin.products') }}">Productos</a></li>
        <li><a href="{{ route('admin.orders') }}">Pedidos</a></li>
    </ul>
</body>
</html>
