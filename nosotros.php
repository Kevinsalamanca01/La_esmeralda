<?php
// Incluye el archivo de configuración PHP si es necesario para la conexión a la base de datos o sesiones
// include 'php/config.php'; // Descomenta esta línea si tienes un archivo de configuración
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/nosotros.css">
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
        <a href="nosotros.php" class="active">Sobre Nosotros</a>
        <a href="iniciarsesion.php">Iniciar Sesión</a>
    </div>

    <h1 class="center">Sobre Nosotros</h1>
    <br>

    <div class="flex-container">
        <h2>Misión</h2>
        <p>Hacer que las personas puedan obtener todos sus productos muy fácilmente, de manera virtual y en segundos poder hacer pedidos a domicilio.</p>
        <img src="img/domicilio.png" alt="domicilio" width="400px" height="300px">
    </div>
    <br>

    <div class="flex-container">
        <h2>Visión</h2>
        <p>Queremos llegar a ser los líderes en ventas, cubrir la mayor extensión de la población posible, ayudando en la protección y cuidado ambiental, efectividad y manejo de calidad.</p>
        <img src="img/ambiental.jpg" alt="ambiental" width="400px" height="250px">
    </div>

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
