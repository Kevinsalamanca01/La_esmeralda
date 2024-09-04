<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Esmeralda</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="img/logo.png">
</head>
<body>

   <?php include 'php/conexion.php'; ?> <!-- Aquí se incluye la conexión a la base de datos -->

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
    <a href="index.php" class="active">Página Principal</a> <!-- Cambiado a .php -->
    <a href="productos.php">Catálogo</a> <!-- Cambiado a .php -->
    <a href="nosotros.php">Sobre Nosotros</a> <!-- Cambiado a .php -->
    <a href="iniciarsesion.php">Iniciar Sesión</a> <!-- Cambiado a .php -->
  </div>

 
  <h1 class="center">¡Consulta nuestro catálogo de productos!</h1>

  <div class="carousel">
    <div class="carousel-images">
        <img src="img/abarrotes.jpg" alt="Imagen 1">
        <img src="img/dulces.jpg" alt="Imagen 2">
        <img src="img/aseope.jpg" alt="Imagen 3">
        <img src="img/ropa.jpg" alt="Imagen 4">
    </div>
    <button class="carousel-arrow left">&#10094;</button>
    <button class="carousel-arrow right">&#10095;</button>
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

<script src="script.js"></script>

</body>
</html>
