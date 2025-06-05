document.addEventListener("DOMContentLoaded", () => {
    const formCrearCuenta = document.querySelector("#formCrearCuenta");
    //Eventos
    formCrearCuenta.addEventListener("submit", registrarCuenta);

    //Funciones
    async function registrarCuenta(e) {
        e.preventDefault();
        const csrf = document.querySelector("#csrf").value;
        const inputNombre = document.querySelector("#nombre").value;
        const inputUserName = document.querySelector("#userName").value;
        const inputEmail = document.querySelector("#email").value;
        const inputPassword = document.querySelector("#password").value;
        const passwordDos = document.querySelector("#password2").value;

        if (inputPassword !== passwordDos){
            Swal.fire({
                title: "Contraseñas diferentes",
                text: "Las contraseñas son diferentes",
                icon: "error",
                timer: 3000
            });
            return;
        }

        const requestBody = {
            name: inputNombre,
            username: inputUserName,
            email: inputEmail,
            password: inputPassword
        }

        try {
            const response = await axios.post("/crear-cuenta", requestBody, {
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN":csrf
                }
            });
            if (response.status === 200){
                Swal.fire({
                    title: "¡Usuario Registrado Correctamente!",
                    text: "Confirma tu cuenta en tu e-mail",
                    icon: "success",
                    confirmButtonText: "Aceptar"
                }).then((result) => {
                    if (result.isConfirmed){
                        window.location.href = "/iniciar-sesion";
                    }
                });
            }
            console.log(response)
        }catch (e) {
            Swal.fire({
                title: "¡Error en el Registro de Usuario!",
                text: "Consulta los errores",
                icon: "error",
                timer: 3000
            });
            const divErrores = document.querySelector("#errores");
            const erroresArray = Object.values(e.response.data.errors);
            erroresArray.forEach((error) => {
                const errorMensaje = error[0];
                const pError = document.createElement("p");
                pError.textContent = errorMensaje;
                pError.classList.add("bg-red-200", "text-center", "font-bold", "p-2", "border", "mb-2", "text-black", "rounded-lg")
                divErrores.appendChild(pError);

                setTimeout(() => {
                    divErrores.textContent = "";
                }, 5000);
            })
        }
    }
});
