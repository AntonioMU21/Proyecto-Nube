<?php
session_start();
?>
<html>
<head>
<style>
/* --- Fondo general --- */
body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    background-color: #eef2f3; /* Gris muy clarito y moderno */
    margin: 0;
    padding: 20px;
    text-align: center;
}

/* --- El Banner (Tu tabla con id="banner") --- */
#banner {
    background: linear-gradient(to right, #0078d7, #005a9e); /* Degradado azul */
    width: 80%; /* Un poco menos ancho para que se vea elegante */
    margin: 0 auto; /* Centrado */
    padding: 20px;
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 4px 8px rgba(0,0,0,0.2); /* Sombra */
    color: white;
    font-size: 24px;
    font-weight: bold;
    border: none; /* Quitar bordes feos de tabla */
}

/* --- El Formulario --- */
/* Aunque no tengas un ID en el form, lo estilizamos por la etiqueta */
form {
    background-color: white;
    width: 50%; /* Que no ocupe toda la pantalla */
    margin: 30px auto; /* Centrado vertical y horizontal */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1); /* Efecto tarjeta flotante */
    text-align: left; /* Para que los labels se lean bien */
}

/* --- Los textos (De, Para, Asunto...) --- */
label {
    font-weight: bold;
    color: #555;
    display: block; /* Para que se ponga encima del input */
    margin-top: 10px;
}

/* --- Las cajas de texto y fecha --- */
input[type="text"], 
input[type="date"] {
    width: 100%; /* Que ocupen todo el ancho del formulario */
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; /* Para que el padding no rompa el ancho */
    font-size: 14px;
}

input[type="text"]:focus,
input[type="date"]:focus {
    border-color: #0078d7;
    outline: none;
    background-color: #f0f8ff;
}

/* --- El botón de Enviar --- */
input[type="submit"] {
    background-color: #28a745; /* Verde bonito */
    color: white;
    border: none;
    padding: 12px 20px;
    margin-top: 20px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    font-weight: bold;
    transition: background 0.3s;
}

input[type="submit"]:hover {
    background-color: #218838;
}

/* --- La Tabla de Mensajes (generada por PHP) --- */
/* Usamos un selector para afectar a la tabla de abajo pero no al banner */
table:not(#banner) {
    width: 80%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

/* Cabecera de la tabla de mensajes */
th {
    background-color: #343a40; /* Gris oscuro */
    color: white;
    padding: 15px;
    text-transform: uppercase;
    font-size: 14px;
}

/* Celdas de la tabla */
td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    color: #333;
    text-align: center; /* Texto centrado en la tabla */
}

/* Efecto cebra (una fila gris, una blanca) */
tr:nth-child(even) {
    background-color: #f8f9fa;
}

/* Efecto al pasar el ratón por encima de un mensaje */
tr:hover {
    background-color: #e2e6ea;
}

/* --- Botón Cerrar Sesión --- */
button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 30px;
}
button:hover {
    background-color: #c82333;
}
</style>
</head>
<body>
<center><table id="banner"><tr><td>WEB MAIL DEL DEPARTAMENTO</td></tr></table>
<br><br>
<form method="post" action="insertar.php">
  <label for="de">De</label>
  <input type="text" id="de" name="de" required>
  <label for="para">Para</label>
  <input type="text" id="para" name="para" required><br><br>
  <label for="asunto">Asunto</label>
  <input type="text" id="asunto" name="asunto" required><br><br>

  <label for="cuerpo">Cuerpo del mensaje</label>
  <input type="text" id="cuerpo" name="cuerpo" required><br><br>
  <label for="fecha">Fecha</label>
  <input type="date" id="fecha" name="fecha">

  <input type="submit" value="Enviar">
  
  
  </form>
<?php
$u=$_SESSION['usu'];

$host = "localhost";     // Servidor (por ejemplo, 127.0.0.1)
$usuario = "root";       // Usuario de MySQL
$contrasena = "";        // Contraseña del usuario
$base_datos = "email"; // Nombre de la base de datos

// Crear la conexión
$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "select * from mensajes where para='$u'";
$resultado = $conexion->query($sql);

$l=mysqli_affected_rows($conexion);
echo "<table width='60%'>";
echo "<tr><th>De</th><th>Asunto</th><th>Fecha</th><th>Leer</th><th>Borrar</tr>";
while ($fila = $resultado->fetch_array()) {
        echo "<tr>";
        echo "<td>" . $fila[0] . "</td>";
        echo "<td>" . $fila[2] . "</td>";
        echo "<td>" . $fila[4] . "</td>";
        echo "<td><a href='leer.php?ID=$fila[5]'><img src='leer.png' width='25'></a></td>";
        echo "<td><a href='borrar.php?ID=$fila[5]'><img src='borrar.png' width='25'></a></td>";
        echo "</tr>";
    }
    echo "<table>";





?>
<a href="salir.php"><button>Cerrar sesión</button> </a>
</body>
</html>