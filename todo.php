
<?php

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambiar por el nombre de usuario de la base de datos
$password = "";
$dbname = "Miagenda"; // Cambiar por el nombre de la base de datos

// Crear conexión
$con = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

// Consulta para obtener todos los datos de la tabla 'datosagenda'
$query = "SELECT * FROM datosagenda";
$result = $con->query($query);

// Generar HTML para mostrar los datos en una tabla con bordes
if ($result->num_rows > 0) {
    // Añade estilos CSS para la tabla
    echo "<style>
            table.data-table {
                border-collapse: collapse;
                width: 100%;
            }
            table.data-table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
          </style>";
    
    echo "<table class='data-table'>";
    echo "<tr><th>Nombre</th><th>Correo</th><th>Mensaje</th><th>Teléfono</th><th>Dirección</th><th>Fecha de Nacimiento</th></tr>";
    
    // Recorrer los resultados y construir las filas de la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mensaje']) . "</td>";
        echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
        echo "<td>" . htmlspecialchars($row['direccion']) . "</td>";
        echo "<td>" . htmlspecialchars($row['fechanacimiento']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron datos.</p>";
}

// Cerrar conexión
$con->close();
?>
  <P><a class="return-link" href="index.html"><font color='red'>Volver</font></a></P>