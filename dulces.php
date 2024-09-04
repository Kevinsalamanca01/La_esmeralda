<?php
// Incluye el archivo de configuración PHP si es necesario para la conexión a la base de datos o sesiones
// include 'php/config.php'; // Descomenta esta línea si tienes un archivo de configuración
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dulces</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/vender.css">
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
        <a href="productos.php" class="active">Catálogo</a>
        <a href="nosotros.php">Sobre Nosotros</a>
        <a href="iniciarsesion.php">Iniciar Sesión</a>
    </div>

    <a href="productos.php" class="no-underline"><h1>← Volver</h1></a>
    <h2 class="center">Dulces</h2>

    <div class="product-container">
    <div class="product-card">
        <img src="img/chocolatina.jpg" alt="Producto 1">
        <div class="content">
            <h3>Chocolatina</h3>
            <div class="price">$2000</div>
            <button onclick="addToCart(2000)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="product-card">
        <img src="img/bonbonbum.jpg" alt="Producto 2">
        <div class="content">
            <h3>Bonbonbum</h3>
            <div class="price">$29.99</div>
            <button onclick="addToCart(29.99)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="product-card">
        <img src="img/gomitas.jpg" alt="Producto 3">
        <div class="content">
            <h3>Bolsa de Gomitas</h3>
            <div class="price">$29.99</div>
            <button onclick="addToCart(29.99)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="product-card">
        <img src="img/chocoramo.jpg" alt="Producto 4">
        <div class="content">
            <h3>Chocoramo</h3>
            <div class="price">$29.99</div>
            <button onclick="addToCart(29.99)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="product-card">
        <img src="img/brownie.jpg" alt="Producto 5">
        <div class="content">
            <h3>Brownie</h3>
            <div class="price">$29.99</div>
            <button onclick="addToCart(29.99)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="product-card">
        <img src="img/almendras.jpg" alt="Producto 6">
        <div class="content">
            <h3>Almendras</h3>
            <div class="price">$29.99</div>
            <button onclick="addToCart(29.99)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="product-card">
        <img src="img/galletas.jpg" alt="Producto 7">
        <div class="content">
            <h3>Galletas</h3>
            <div class="price">$29.99</div>
            <button onclick="addToCart(29.99)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="product-card">
        <img src="img/myms.jpg" alt="Producto 8">
        <div class="content">
            <h3>M y M's</h3>
            <div class="price">$29.99</div>
            <button onclick="addToCart(29.99)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="product-card">
        <img src="img/chicles.jpg" alt="Producto 9">
        <div class="content">
            <h3>Chicles</h3>
            <div class="price">$29.99</div>
            <button onclick="addToCart(29.99)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="product-card">
        <img src="img/mentas.jpg" alt="Producto 10">
        <div class="content">
            <h3>Mentas</h3>
            <div class="price">$29.99</div>
            <button onclick="addToCart(29.99)">Añadir al Carrito</button>
        </div>
    </div>
    <div class="product-card">
        <img src="img/quipitos.jpg" alt="Producto 11">
        <div class="content">
            <h3>Quipitos</h3>
            <div class="price">$29.99</div>
            <button onclick="addToCart(29.99)">Añadir al Carrito</button>
        </div>
    </div>
</div>
<div class="cart-container">
    <div class="cart-total">
        Total en Carrito: $<span id="cart-total">0.00</span>
    </div>
</div>

    <br><br>

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
    <script src="carrito.js"></script>
</body>
</html>
