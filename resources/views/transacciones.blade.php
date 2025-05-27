<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Transacciones</title>
    <style>
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Listado de Transacciones</h1>
    <table>
        <thead>
        <tr>
            <th>Id Usuario</th>
            <th>Descripción</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Creado en</th>
            <th>Actualizado en</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($datos as $dato): ?>
        <tr>
            <td><?= $dato['user_id']; ?></td>
            <td><?= $dato['descripcion']; ?></td>
            <td><?= $dato['amount']; ?></td>
            <td><?= $dato['transaccion_date']; ?></td>
            <td><?= $dato['create_at']; ?></td>
            <td><?= $dato['update_at']; ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("Cargó la página");
    });
</script>
</body>
</html>
