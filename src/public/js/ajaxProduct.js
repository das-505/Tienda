function solicitarCatalogo() {
    // Obtener el valor de búsqueda
    var busquedaElem = document.getElementById("busqueda-producto");
    var nombre = busquedaElem.value;

    // Obtener el contenedor y la tarjeta de ejemplo
    var catalogoContainer = document.getElementById("catalogo-container-row");
    var cardEjemplo = document.querySelector(".group.relative");

    // Crear la solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/MEDAC_DAW_ENTORNO_SERVIDOR_2024-2025/Clases/2024-10-29/server/controllers/ajaxController.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Limpiar el contenedor antes de agregar nuevos resultados
            catalogoContainer.innerHTML = '';

            // Parsear la respuesta JSON
            var respuesta = JSON.parse(xhr.responseText);
            
            // Iterar sobre cada producto en la respuesta
            respuesta.forEach(producto => {
                // Clonar la tarjeta de ejemplo
                var nuevaCard = cardEjemplo.cloneNode(true);

                // Actualizar la imagen
                var imagen = nuevaCard.querySelector("img");
                imagen.src = producto.imagen; // Asegúrate de que la URL de imagen esté en los datos del producto
                
                // Actualizar el título del producto
                var titulo = nuevaCard.querySelector(".text-sm.text-gray-700 a");
                titulo.innerText = producto.nombre;
                titulo.href = "product.php?product_id=" + producto.id; // Enlace a la página de producto

                // Actualizar el precio del producto
                var precio = nuevaCard.querySelector(".text-sm.text-gray-500");
                precio.innerText = "€" + producto.precio;

                // Agregar la tarjeta clonada al contenedor del catálogo
                catalogoContainer.appendChild(nuevaCard);
            });
        }
    };

    // Enviar la solicitud al servidor con los datos de búsqueda
    xhr.send('busqueda-producto=' + encodeURIComponent(nombre) + '&action=filtroCatalogo');
}