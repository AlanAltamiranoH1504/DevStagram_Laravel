import {peticionesPOST, mostrarErrores} from "../index.js";
document.addEventListener("DOMContentLoaded", () => {
    const formNuevaPublicacion = document.querySelector("#formNuevaPublicacion");

    formNuevaPublicacion.addEventListener("submit", savePublicacion);

    async function savePublicacion(e) {
        e.preventDefault();
        const titulo = document.querySelector("#titulo").value;
        const descripcion = document.querySelector("#descripcion").value;
        const idImagen = document.querySelector("#idImagen").value;
        const csrf = document.querySelector("#csrf").value;

        const requestBody = {
            titulo,
            descripcion,
            idImagen
        }
        try {
            const response = await peticionesPOST("/posts/save", requestBody, csrf);
            if (response.status === 201) {
                Swal.fire({
                    title: "Post creado correctamente",
                    text: "Operación exitosa",
                    icon: "success",
                    textConfirmButton: "Aceptar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/muro"
                    }
                });
            }else {
                const erroresArray = Object.values(response.response.data.errors);
                mostrarErrores("erroresCreate", erroresArray, "error");
            }
        }catch (e) {
            Swal.fire({
                title: "Error en publicacion de post",
                text: "Reintalo más tarde",
                icon: "error",
                textConfirmButton: "Aceptar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/muro"
                }
            });
        }
    }
});
