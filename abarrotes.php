<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/vender.css">
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
        <a href="productos.php" class="active">Catálogo</a>
        <a href="nosotros.php">Sobre Nosotros</a>
        <a href="iniciarsesion.php">Iniciar Sesión</a>
    </div>

    <a href="productos.php" class="no-underline"><h1>← Volver</h1></a>
    <h2 class="center">Abarrotes</h2>

    <div class="product-container">
        <div class="product-card">
            <img src="img/arroz.png" alt="Producto 1">
            <div class="content">
                <h3>Arroz 1lb</h3>
                <div class="price">$2000</div>
                <button onclick="addToCart(2000)">Añadir al Carrito</button>
            </div>
        </div>
        <div class="product-card">
            <img src="img/aceite.jpg" alt="Producto 2">
            <div class="content">
                <h3>Aceite</h3>
                <div class="price">$29.99</div>
                <button onclick="addToCart(29.99)">Añadir al Carrito</button>
            </div>
        </div>
        <!-- Repite el bloque de product-card para otros productos -->
        <!-- Asegúrate de ajustar los precios y las imágenes adecuadamente -->
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
