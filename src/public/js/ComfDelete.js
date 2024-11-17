document.querySelectorAll('delete-button').forEach(button => {
    button.addEventListener('click', function(e) {
        if (!confirm('¿Estás seguro de que deseas eliminar este producto?')) {
            e.preventDefault(); // Cancela el enlace si el usuario presiona "Cancelar"
        }
    });
});
