
        <?php
        // Código PHP para buscar y mostrar resultados
        // Verificar si se ha enviado la solicitud de búsqueda
        if (isset($_GET['enviar'])) {
            // Datos de conexión a la base de datos
            $servername = "localhost";
            $username = "root"; // Cambiar por el nombre de usuario de la base de datos
            $password = "";
            $dbname = "Miagenda"; // Cambiar por el nombre de la base de datos

            // Crear conexión
            $con = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($con->connect_error) {
                die("<div class='error-message'>Conexión fallida: " . $con->connect_error . "</div>");
            }

            // Obtener el término de búsqueda
            $busqueda = $con->real_escape_string($_GET['busqueda']);

            // Realizar la consulta de búsqueda
            $consulta = $con->query("SELECT * FROM datosagenda WHERE nombre LIKE '%" . $busqueda . "%'");

            // Verificar si la consulta fue exitosa
            if ($consulta) {
                if ($consulta->num_rows > 0) {
                    while ($row = $consulta->fetch_assoc()) {
                        echo "<div class='result-item'>";
                        echo "<p><strong><font color='blue'>NOMBRE:</font></strong> " . htmlspecialchars($row['nombre']) . "</p>";
                        echo "<p><strong><font color='blue'>CORREO ELECTRONICO:</font></strong> " . htmlspecialchars($row['email']) . "</p>";
                        echo "<p><strong><font color='blue'>MENSAJE:</font></strong> " . htmlspecialchars($row['mensaje']) . "</p>";
                        echo "<p><strong><font color='blue'>TELEFONO:</font></strong> " . htmlspecialchars($row['telefono']) . "</p>";
                        echo "<p><strong><font color='blue'>DIRECCIÓN:</font></strong> " . htmlspecialchars($row['direccion']) . "</p>";
                        echo "<p><strong><font color='blue'>FECHA DE NACIMIENTO:</font></strong> " . htmlspecialchars($row['fechanacimiento']) . "<br><br>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='error-message'>No se encontraron resultados para '$busqueda'.</div>";
                }
            } else {
                echo "<div class='error-message'>Error en la consulta: " . $con->error . "</div>";
            }

            // Cerrar conexión
            $con->close();
        }
        ?>
        <P><a class="return-link" href="index.html"><font color='red'>Volver</font></a></P>
   
