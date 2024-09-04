document.addEventListener('DOMContentLoaded', function() {
    // Recuperar el total del carrito desde localStorage o inicializarlo a 0
    let total = parseFloat(localStorage.getItem('cartTotal')) || 0;

    // Asegúrate de que el elemento cart-total existe antes de tratar de modificar su contenido
    const cartTotalElement = document.getElementById('cart-total');
    if (cartTotalElement) {
        cartTotalElement.textContent = total.toFixed(2);
    }

    // Define la función addToCart globalmente para ser accesible desde los botones
    window.addToCart = function(price) {
        // Sumar el precio al total
        total += price;

        // Actualizar la visualización del total en la página
        if (cartTotalElement) {
            cartTotalElement.textContent = total.toFixed(2);
        }

        // Guardar el nuevo total en localStorage
        localStorage.setItem('cartTotal', total);
    };
});
