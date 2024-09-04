<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conectar a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'laesmeralda');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
    echo "Conexión exitosa";
}

$mysqli->close();
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conectar a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'laesmeralda');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Inicializar una variable para los mensajes de error
$error = '';

// Comprobar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores enviados desde el formulario
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Verificar si el email ya está registrado
    $query = "SELECT usuario_id FROM usuarios WHERE email = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "El email ya está registrado";
        } else {
            // Cifrar la contraseña
            $hashed_password = password_hash($contrasena, PASSWORD_BCRYPT);

            // Insertar el nuevo usuario en la base de datos
            $query = "INSERT INTO usuarios (email, contrasena) VALUES (?, ?)";
            $stmt = $mysqli->prepare($query);

            if ($stmt) {
                $stmt->bind_param('ss', $email, $hashed_password);
                if ($stmt->execute()) {
                    // Redirigir al usuario a la página de inicio de sesión
                    header('Location: iniciarsesion.php');
                    exit;
                } else {
                    $error = "Error al registrar el usuario: " . $stmt->error;
                }
            } else {
                $error = "Error en la preparación de la consulta: " . $mysqli->error;
            }
        }

        $stmt->close();
    } else {
        $error = "Error en la preparación de la consulta: " . $mysqli->error;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="img/logo.png">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="Logo de la empresa">
        </div>
        <div class="company-name">
            <h2>La Esmeralda</h2>
            <p>Tienda de variedades, productos frescos y de la mejor calidad para tu hogar</p>
        </div>
        <div class="cart">
            <a href="carrito.php" class="cart-icon"><img src="img/carrito.png" alt="carrito" width="50px"></a>
        </div>

    </header>

    <div class="navbar">
        <a href="index.php">Página Principal</a>
        <a href="productos.php">Catálogo</a>
        <a href="nosotros.php">Sobre Nosotros</a>
        <a href="crearcuenta.php" class="active">Crear Cuenta</a>
    </div>

    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="crearcuenta.php" method="POST">
                    <h2>Crear Cuenta</h2>

                    <?php if ($error): ?>
                        <p class="error"><?php echo htmlspecialchars($error); ?></p>
                    <?php endif; ?>

                    <div class="input-contenedor">
                        <input type="email" name="email" required>
                        <label for="email">Email</label>
                    </div>

                    <div class="input-contenedor">
                        <input type="password" name="contrasena" required>
                        <label for="contrasena">Contraseña</label>
                    </div>

                    <button type="submit">Crear Cuenta</button>

                    <div class="iniciar-sesion">
                        <p>Ya tengo una cuenta <a href="iniciarsesion.php">Iniciar sesión</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer">
            <div class="reserved-rights">
                &copy; 2024 Derechos reservados de <strong>La Esmeralda</strong>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com" target="_blank">
                    <img src="img/facebook.png" alt="Facebook">
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <img src="img/instagram.png" alt="Instagram">
                </a>
                <a href="https://wa.me" target="_blank">
                    <img src="img/whatsapp.png" alt="WhatsApp">
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
