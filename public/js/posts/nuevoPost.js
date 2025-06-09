document.addEventListener("DOMContentLoaded", () => {
    const formNuevaPublicacion = document.querySelector("#formNuevaPublicacion");

    formNuevaPublicacion.addEventListener("submit", savePublicacion);

    function savePublicacion(e) {
        e.preventDefault();
        console.log("Guardando");
    }
});
