import {peticionesGET} from "../index.js";
document.addEventListener("DOMContentLoaded", () => {
    findAllPosts();

    async function findAllPosts() {
        try {
            const response = await axios.get("/posts");
            renderPosts(response.data);
        } catch (e) {
            console.log(e.message);
        }
    }

    function renderPosts(posts) {
        const seccionPosts = document.querySelector("#seccionPosts");
        if (posts.length > 0) {
            const numeroPosts = document.querySelector("#numeroPosts");
            numeroPosts.innerHTML = `
                ${posts.length} <span class="font-normal">Posts</span>
            `;
            posts.forEach((post) => {
                const divPost = document.createElement("div");
                divPost.classList.add("bg-white", "shadow", "p-4", "rounded", "border")
                divPost.innerHTML = `
                <a href="/posts/${post.id}/${post.title}">
                    <img src="/storage/${post.imagen}" alt="Imagen del Post ${post.title}">
                </a>
            `;
                seccionPosts.appendChild(divPost);
            });
        } else {
            document.querySelector("#noPublicaciones").classList.remove("hidden");
        }
    }
});
