window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

window.onbeforeunload = function() {
    // Puedes retornar un string que se mostrará en una ventana de confirmación.
    return "¿Estás seguro de que quieres salir de esta página?";
};

window.onpopstate = function(event) {
    // Tu código aquí. Por ejemplo, puedes mostrar una alerta o cambiar el contenido de la página.
    alert("El usuario ha pulsado el botón de volver atrás.");
};
window.addEventListener('popstate', function(event) {
    // Tu código aquí. Por ejemplo, puedes mostrar una alerta o cambiar el contenido de la página.
    window.location.href="<?php echo ('Noticias/deshacerCambios') ?>";
});
