import {peticionesDELETE, peticionesGET, peticionesGETWithID, peticionesPOST} from "../index.js";

document.addEventListener("DOMContentLoaded", () => {
    peticionBusqueda();
    const btnLikePost = document.querySelector("#btnLikePost");

    btnLikePost.addEventListener("click", saveLike);

    async function peticionBusqueda() {
        const path = window.location.pathname;
        const pathParts = path.split("/");
        const id = pathParts[2];

        const informacionPost = await peticionesGETWithID(`/posts/${id}`);
        llenadoVista(informacionPost);
    }

    async function llenadoVista(infoPost) {
        const fechaCreacion = infoPost.created_at;
        const fechaConFormato = moment(fechaCreacion).format("DD/MM/YYYY");
        const {user_id, user, comentarios, likes} = infoPost;
        const totalLikes = likes.length ? likes.length : 0;

        renderCometarios(comentarios);

        document.querySelector("#imgPublicacion").setAttribute("src", `/storage/${infoPost.imagen}`);
        document.querySelector("#nombreUsuario").innerHTML = `
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
            </svg>
            </div>
            ${infoPost.user.name}
        `;
        document.querySelector("#fechaCreacion").innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
              <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
              <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
            </svg>
            ${fechaConFormato}
        `;
        document.querySelector("#descripcion").textContent = infoPost.description;
        const likesHmtl = document.querySelector("#countLikes");
        likesHmtl.textContent = `${totalLikes} likes`
        const usuarioEnSesion = await peticionesGET("/user/in/sesion");
        if (user_id == usuarioEnSesion.usuario.id) {
            document.querySelector("#btnEliminarPost").classList.remove("hidden");
            const btnEliminarPost = document.querySelector("#btnEliminarPost");
            btnEliminarPost.addEventListener("click", () => {
                eliminarPost(infoPost.id);
            });
        }
    }

    function renderCometarios(comentarios) {
        const comentariosDiv = document.querySelector("#comentarios");
        if (comentarios.length > 0) {
            comentarios.forEach((comentario) => {
                const divComentario = document.createElement("div");
                divComentario.classList.add("p-5", "border-gray-300", "border-b");
                divComentario.innerHTML = `
                    <p class="font-bold">${comentario.user.name}</p>
                    <p>
                        ${comentario.comentario}
                    </p>
                    <p class="text-sm text-gray-500">${moment(comentario.created_at).format("DD/MM/YYYY")}</p>
                `;
                comentariosDiv.appendChild(divComentario);
            });
        } else {
            document.querySelector("#noComentarios").classList.remove("hidden");
        }
    }

    if (document.querySelector("#formNuevoComentario")) {
        const formNuevoComentario = document.querySelector("#formNuevoComentario");
        formNuevoComentario.addEventListener("submit", saveComentario);
    }

    async function saveComentario(e) {
        e.preventDefault();
        const path = window.location.pathname;
        const pathParts = path.split("/");
        const id = pathParts[2];
        const token = document.querySelector("#csrf").value;
        const inputComemtario = document.querySelector("#comentario").value

        const requestBody = {
            comentario: inputComemtario,
            post_id: Number(id)
        }

        const response = await peticionesPOST("/comentarios/save", requestBody, token);
        if (response.status === 201) {
            Swal.fire({
                title: "Comentario guardado.",
                text: "Operacion exitosa",
                icon: "success",
                textConfirmButton: "Aceptar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/muro";
                }
            })
        }
    }

    async function eliminarPost(idPost) {
        const token = document.querySelector("#csrfDelete").value;
        const response = await peticionesDELETE(`/posts/${idPost}`, token);
        Swal.fire({
            title: response.message,
            text: "Operción existosa",
            icon: "success",
            textConfirmButton: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/muro"
            }
        });
    }

    async function saveLike() {
        const path = window.location.pathname;
        const pathParts = path.split("/");
        const id = pathParts[2];
        const csrfLike = document.querySelector("#csrfLike").value;
        const requestBody = {
            post_id: id
        }

        const response = await peticionesPOST("/likes/save", requestBody, csrfLike);
        console.log(response);
    }
})

