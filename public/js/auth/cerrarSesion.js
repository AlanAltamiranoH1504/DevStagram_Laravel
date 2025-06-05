document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector("#formCerrarSesion")){
        console.log("Existe")
        const formCerrarSesion = document.querySelector("#formCerrarSesion");
        formCerrarSesion.addEventListener("submit", cerrarSesion);

        async function cerrarSesion(e) {
            e.preventDefault();
            try {
                const response = await axios.post("/cerrar-sesion");
                if (response.status === 200){
                    window.location.href = "/iniciar-sesion";
                }
            }catch (e) {
                console.log("Error")
            }
        }
    }
})
