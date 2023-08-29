document.addEventListener("DOMContentLoaded", function () {
    // guarda todas las alertas en una variable
    const alertas = document.querySelectorAll("#alerta");

    alertas.forEach((alerta) => {
        // Le añade las clases para hacer la transición de entrada
        alerta.classList.add('slide-fade-enter-active');
        setTimeout(() => {
            alerta.classList.add('slide-fade-enter-to');
        }, 10);
        });
    setTimeout(() => {
        // Le añade las clases para hacer la transición de salida
        alertas.forEach(function (alerta) {
            alerta.classList.add('slide-fade-leave-active');
            alerta.classList.add('slide-fade-leave-to');
        });
    }, 3000);
});