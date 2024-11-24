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

    catalogoContainer.innerHTML = '';

    productos.forEach(producto => {
        const card = document.createElement('div');
        card.classList.add('group', 'relative');

        const imagePath = producto.image_path;

        card.innerHTML = `
            <div class="aspect-h-1 aspect-w-1 w-full rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                <img src="${producto.image_path}" alt="${producto.name}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
            </div>
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="product.php?id=${producto.id}">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            ${producto.name}
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">${producto.category}</p>
                </div>
                <p class="text-sm font-medium text-gray-900">€${producto.price}</p>
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
