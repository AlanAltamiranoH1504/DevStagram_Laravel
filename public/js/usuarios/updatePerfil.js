import {peticionesPOST, peticionesPUT} from "../index.js";

document.addEventListener("DOMContentLoaded", () => {
    const formUpdatePerfil = document.querySelector("#formUpdatePerfil");

    //Eventos
    formUpdatePerfil.addEventListener("submit", actualizarPerfilUsuario);

    //Funciones
    function actualizarPerfilUsuario(e) {
        e.preventDefault();
        const inputNombre = document.querySelector("#nombre").value;
        const inputUsername = document.querySelector("#userName").value;
        const inputEmail = document.querySelector("#email").value;
        const inputPassword = document.querySelector("#password").value;
        const inputPassword2 = document.querySelector("#password2").value;
        const token = document.querySelector("#csrf").value;
        const divErrores = document.querySelector("#divErrores");

        if (inputPassword !== inputPassword2) {
            const errorPassword = document.createElement("p");
            errorPassword.classList.add("bg-red-600", "text-white", "p-2", "text-center", "font-semibold", "text-lg", "rounded-lg");
            errorPassword.textContent = "Las passwords no coinciden";
            divErrores.appendChild(errorPassword);
            setTimeout(() => {
                divErrores.innerHTML = "";
            }, 3000);
        }


        const formData = new FormData();
        formData.append("_method", "PUT");
        formData.append("name", inputNombre);
        formData.append("username", inputUsername);
        formData.append("email", inputEmail);
        formData.append("password", inputPassword);
        const inputImagen = document.querySelector("#imagen");
        if (inputImagen.files.length > 0) {
            formData.append("imagen", document.querySelector("#imagen").files[0]);
        }
        peticionActualizacion(formData, token);
    }

    async function peticionActualizacion(request, token) {
        try {
            const response = await peticionesPOST("/user/update", request, token);
            if (response.message === "Usuario actualizado correctamente") {
                Swal.fire({
                    title: response.message,
                    text: "Operación exitosa.",
                    icon: "success",
                    textConfirmButton: "Aceptar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/muro"
                    }
                });
            }
        } catch (e) {
            console.log(e.message);
        }
    }
})
