<?php
$productos = [
    [
        'img' => 'img/cremacuerpo.png',
        'nombre' => 'crema para el cuerpo',
        'precio' => 2000
    ],
    [
        'img' => 'img/papel.jpg',
        'nombre' => 'papel higienico',
        'precio' => 29.99
    ],
    [
        'img' => 'img/jabonmanos.jpg',
        'nombre' => 'jabon liquido para manos',
        'precio' => 29.99
    ],
    // Resto de productos...
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aseo</title>
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
    <h2 class="center">Aseo</h2>
    <div class="product-container">
        <?php foreach ($productos as $producto): ?>
            <div class="product-card">
                <img src="<?php echo $producto['img']; ?>" alt="<?php echo $producto['nombre']; ?>">
                <div class="content">
                    <h3><?php echo $producto['nombre']; ?></h3>
                    <div class="price">$<?php echo number_format($producto['precio'], 2); ?></div>
                    <!-- Botón con funcionalidad JavaScript para añadir al carrito -->
                    <button onclick="addToCart(<?php echo $producto['precio']; ?>)">Añadir al Carrito</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="cart-container">
        <div class="cart-total">
            Total en Carrito: $<span id="cart-total">0.00</span>
        </div>
    </div>
    <br>
    <br>

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

    <!-- Incluye el archivo JavaScript externo -->
    <script src="carrito.js"></script>
</body>
</html>
