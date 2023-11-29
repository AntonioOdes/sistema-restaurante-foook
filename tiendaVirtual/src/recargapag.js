window.addEventListener('hashchange', (event) => {
    if (event.oldURL !== event.newURL) {
        // La página se ha recargado
        console.log("fo")
        if (confirm('¿Desea actualizar?')) {
            location.href = "https://w3c-test.org/navigation-timing/test_navigation_type_reload.html";
        } else {
            alert('Correcto');
        }
    }
});
