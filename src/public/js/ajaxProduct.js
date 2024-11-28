/*Ajax para mostrar mostrar y clonar 
los porductos de la base de datos
*/
async function solicitarCatalogo(categoria = null) {
    try {
        // Construir la URL con o sin el parámetro de categoría
        let url = '/Tienda/src/server/controllers/ajaxController.php';
        if (categoria) {
            url += `?categoria=${encodeURIComponent(categoria)}`;
        }

        const response = await fetch(url);
        if (!response.ok) throw new Error('Error al obtener el catálogo de productos.');

        const productos = await response.json();
        mostrarCatalogo(productos);
    } catch (error) {
        console.error('Error:', error);
    }
}

function mostrarCatalogo(productos) {
    const catalogoContainer = document.getElementById('catalogo-container');

    // Limpiar el contenedor antes de renderizar nuevos productos
    catalogoContainer.innerHTML = '';

    productos.forEach(producto => {
        const card = document.createElement('div');
        card.classList.add(
            'group',
            'relative',
            'bg-white',
            'rounded-lg',
            'shadow-lg',
            'hover:shadow-2xl',
            'overflow-hidden',
            'transform',
            'hover:-translate-y-1',
            'transition',
            'duration-300',
            'ease-in-out'
        );

        card.innerHTML = `
            <!-- Contenedor de la imagen -->
            <div class="relative">
                <div class="aspect-w-4 aspect-h-3">
                    <img src="${producto.image_path}" alt="${producto.name}" 
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <!-- Información del producto -->
            <div class="p-4">
                <!-- Nombre del producto -->
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 truncate">
                    <a href="product.php?id=${producto.id}" class="hover:underline">
                        ${producto.name}
                    </a>
                </h3>
                
                <!-- Categoría -->
                <p class="mt-2 text-sm text-gray-500">${producto.category}</p>

                <!-- Precio -->
                <p class="mt-4 text-lg font-semibold text-indigo-600">€${producto.price}</p>
            </div>
            
            <!-- Botón de detalles -->
            <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100">
                <a href="product.php?id=${producto.id}" 
                    class="block text-center text-sm font-medium text-white bg-indigo-600 py-2 px-4 rounded-md hover:bg-indigo-700 transition">
                    Ver detalles
                </a>
            </div>
        `;

        catalogoContainer.appendChild(card);
    });
}

// Evento para cargar todos los productos al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    solicitarCatalogo(); // Carga todos los productos inicialmente
});

// Ejemplo: Lógica para filtrar por categoría (puedes conectar esto a botones o un selector)
document.getElementById('category-filter').addEventListener('change', (event) => {
    const categoriaSeleccionada = event.target.value;
    solicitarCatalogo(categoriaSeleccionada);
});
