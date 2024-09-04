<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Iniciar la sesión
session_start();

// Conectar a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'laesmeralda');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Inicializar variables para los mensajes de error
$error_login = '';
$error_registro = '';

// Comprobar si el formulario de iniciar sesión ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT usuario_id, contrasena FROM usuarios WHERE email = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($contrasena, $user['contrasena'])) {
                $_SESSION['usuario_id'] = $user['usuario_id'];
                header('Location: index.php');
                exit;
            } else {
                $error_login = "Contraseña incorrecta";
            }
        } else {
            $error_login = "Usuario no encontrado";
        }

        $stmt->close();
    } else {
        $error_login = "Error en la preparación de la consulta: " . $mysqli->error;
    }
}

// Comprobar si el formulario de crear cuenta ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registro'])) {
    $email = $_POST['registro_email'];
    $contrasena = $_POST['registro_contrasena'];

    // Verificar si el email ya está registrado
    $query = "SELECT usuario_id FROM usuarios WHERE email = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error_registro = "El email ya está registrado";
        } else {
            $hashed_password = password_hash($contrasena, PASSWORD_BCRYPT);

            $query = "INSERT INTO usuarios (email, contrasena) VALUES (?, ?)";
            $stmt = $mysqli->prepare($query);

            if ($stmt) {
                $stmt->bind_param('ss', $email, $hashed_password);
                if ($stmt->execute()) {
                    header('Location: iniciarsesion.php');
                    exit;
                } else {
                    $error_registro = "Error al registrar el usuario: " . $stmt->error;
                }
            } else {
                $error_registro = "Error en la preparación de la consulta: " . $mysqli->error;
            }
        }

        $stmt->close();
    } else {
        $error_registro = "Error en la preparación de la consulta: " . $mysqli->error;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/cc4680d05c.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión / Crear Cuenta</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        .input-contenedor {
            position: relative;
            margin-bottom: 15px;
        }

        .input-contenedor input[type="password"] {
            padding-right: 80px; /* Espacio suficiente para el botón */
        }

        .input-contenedor button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background-color: transparent;
            cursor: pointer;
            color: #007bff; /* Color del texto del botón */
            font-size: 16px; /* Tamaño del texto del botón */
        }

        .input-contenedor button:hover {
            color: #0056b3; /* Color del texto del botón al pasar el ratón */
        }
    </style>
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
        <a href="iniciarsesion.php" class="active">Iniciar Sesión / Crear Cuenta</a>
    </div>

    <section>
        <div class="contenedor">
            <div class="formulario" id="form-login">
                <form action="iniciarsesion.php" method="POST">
                    <h2>Iniciar Sesión</h2>

                    <?php if ($error_login): ?>
                        <p class="error"><?php echo htmlspecialchars($error_login); ?></p>
                    <?php endif; ?>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    
                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="login_contrasena" name="contrasena" required>
                        <label for="contrasena">Contraseña</label>
                        <button type="button" id="toggle-login-password">Mostrar</button>
                    </div>
                    
                    <div class="olvidar">
                        <label for="recordar">
                            <input type="checkbox" id="recordar"> Recordar
                            <a href="#">Olvidé la contraseña</a>
                        </label>
                    </div>

                    <button type="submit" name="login" class="button">Acceder</button>
                    <p>¿No tienes una cuenta? <a href="#" id="show-register-form">Crear cuenta</a></p>
                </form>
            </div>

            <div class="formulario" id="form-register" style="display: none;">
                <form action="iniciarsesion.php" method="POST">
                    <h2>Crear Cuenta</h2>

                    <?php if ($error_registro): ?>
                        <p class="error"><?php echo htmlspecialchars($error_registro); ?></p>
                    <?php endif; ?>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="registro_email" required>
                        <label for="registro_email">Email</label>
                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="registro_contrasena" name="registro_contrasena" required>
                        <label for="registro_contrasena">Contraseña</label>
                        <button type="button" id="toggle-register-password">Mostrar</button>
                    </div>

                    <button type="submit" name="registro" class="button">Crear Cuenta</button>
                    <p>¿Ya tienes una cuenta? <a href="#" id="show-login-form">Iniciar sesión</a></p>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('toggle-login-password').addEventListener('click', function() {
            const passwordField = document.getElementById('login_contrasena');
            const button = this;
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                button.textContent = 'Ocultar';
            } else {
                passwordField.type = 'password';
                button.textContent = 'Mostrar';
            }
        });

        document.getElementById('toggle-register-password').addEventListener('click', function() {
            const passwordField = document.getElementById('registro_contrasena');
            const button = this;
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                button.textContent = 'Ocultar';
            } else {
                passwordField.type = 'password';
                button.textContent = 'Mostrar';
            }
        });

        document.getElementById('show-register-form').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('form-login').style.display = 'none';
            document.getElementById('form-register').style.display = 'block';
        });

        document.getElementById('show-login-form').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('form-register').style.display = 'none';
            document.getElementById('form-login').style.display = 'block';
        });
    </script>
</body>
</html>
