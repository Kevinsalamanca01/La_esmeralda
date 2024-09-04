<?php
// carrito.php
include 'php/conexion.php'; // Incluye la conexión a la base de datos
session_start();

// Supongamos que los productos se almacenan en una sesión llamada 'carrito'
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];

// Calcula el total
$total = 0;
foreach ($carrito as $producto) {
    $total += $producto['precio'] * $producto['cantidad'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - La Esmeralda</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="img/logo.png">
</head>
<body>

   <!-- Incluye la conexión a la base de datos -->
   <?php include 'php/conexion.php'; ?>

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

   <!-- Barra de navegación -->
   <div class="navbar">
      <a href="index.php" class="active">Página Principal</a>
      <a href="productos.php">Catálogo</a>
      <a href="nosotros.php">Sobre Nosotros</a>
      <a href="iniciarsesion.php">Iniciar Sesión</a>
   </div>

   <!-- Sección del carrito -->
   <section class="cart-details">
       <header>
           <h1>Carrito de Compras</h1>
       </header>

       <?php if (empty($carrito)): ?>
           <p>Tu carrito está vacío.</p>
       <?php else: ?>
           <table>
               <thead>
                   <tr>
                       <th>Producto</th>
                       <th>Precio</th>
                       <th>Cantidad</th>
                       <th>Subtotal</th>
                   </tr>
               </thead>
               <tbody>
                   <?php foreach ($carrito as $producto): ?>
                       <tr>
                           <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                           <td><?php echo number_format($producto['precio'], 2); ?>€</td>
                           <td><?php echo $producto['cantidad']; ?></td>
                           <td><?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?>€</td>
                       </tr>
                   <?php endforeach; ?>
               </tbody>
           </table>
           <p>Total: <span id="cart-total">0.00</span>€</p>
       <?php endif; ?>
   </section>

   <!-- Script para sincronizar el total del carrito -->
   <script>
       document.addEventListener('DOMContentLoaded', function() {
           // Recuperar el total del carrito desde localStorage
           let cartTotal = localStorage.getItem('cartTotal') || '0.00';

           // Asegúrate de que el elemento cart-total existe antes de tratar de modificar su contenido
           const cartTotalElement = document.getElementById('cart-total');
           if (cartTotalElement) {
               cartTotalElement.textContent = parseFloat(cartTotal).toFixed(2);
           }
       });
   </script>

</body>
</html>
