<!DOCTYPE html>
<html>
<head>
    <title>Atracciones</title>
</head>
<body>
    <h1>Lista de Atracciones</h1>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Especie</th>
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atracciones as $atraccion)
                <tr>
                    <td>{{ $atraccion->titulo }}</td>
                    <td>{{ $atraccion->descripcion }}</td>
                    <td>{{ $atraccion->especie->nombre }}</td>
                    <td>{{ $atraccion->calificacionPromedio() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>