document.addEventListener("DOMContentLoaded", () => {

    const formIniciarSesion = document.querySelector("#formIniciarSesion");
    formIniciarSesion.addEventListener("submit", iniciarSesion);

    async function iniciarSesion(e){
        e.preventDefault();
        const inputEmail = document.querySelector("#email").value;
        const inputPassword = document.querySelector("#password").value;
        const token = document.querySelector("#csrf").value;

        const requestBody = {
            email: inputEmail,
            password: inputPassword
        }

        try {
            const response = await axios.post("/iniciar-sesion", requestBody, {
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                }
            });
            if (response.status === 200){
                window.location.href = "/muro";
            }
        }catch (e) {
            console.log("Error en la peticion");
        }
    }
})
