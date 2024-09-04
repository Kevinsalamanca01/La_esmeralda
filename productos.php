<?php
// Incluye el archivo de configuración PHP si es necesario para la conexión a la base de datos o sesiones
// include 'php/config.php'; // Descomenta esta línea si tienes un archivo de configuración
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
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
     <a href="productos.php" class="active">Catálogo</a>
     <a href="nosotros.php">Sobre Nosotros</a>
     <a href="iniciarsesion.php">Iniciar Sesión</a>
   </div>

   <h1 class="center">Productos disponibles:</h1>
   <div class="container">
      <div class="box">
         <h2>Abarrotes</h2>
         <p>Productos necesarios en el hogar como frutas, verduras, granos, aceite, lácteos, etc.</p>
         <a href="abarrotes.php"><img src="img/abarr.jpg" alt="Abarrotes"></a>
      </div>
      <div class="box">
         <h2>Dulces</h2>
         <p>Productos para niños y adultos comestibles como gaseosas, gomitas, caramelos, etc.</p>
         <a href="dulces.php"><img src="img/dulc.jpg" alt="Dulces"></a>
      </div>
      <div class="box">
         <h2>Aseo</h2>
         <p>Productos para el aseo personal y de toda la familia.</p>
         <a href="aseo.php"><img src="img/aseo.jpg" alt="Aseo"></a>
      </div>
      <div class="box">
         <h2>Ropa</h2>
         <p>Prendas para ti y para tu familia.</p>
         <a href="ropa.php"><img src="img/rop.jpg" alt="Ropa"></a>
      </div>
   </div>

   <br>
   <h2 class="center">Elige la sección que necesites</h2>

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
</body>
</html>
