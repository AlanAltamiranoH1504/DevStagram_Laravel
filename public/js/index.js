export async function peticionesGET(endPoint) {
    try {
        const response = await axios.get(endPoint);
        if (response.status === 200) {
            return response.data;
        }
    } catch (e) {
        return e;
    }
}

export async function peticionesGETWithID(endPoint) {
    try {
        const response = await axios.get(endPoint);
        if (response.status === 200) {
            return response.data;
        }
    } catch (e) {
        return e;
    }
}

export async function peticionesPOST(endPoint, request, csrf) {
    try {
        const response = await axios.post(endPoint, request, {
            headers: {
                "X-CSRF-TOKEN": csrf
            }
        });
        if (response.status === 200) {
            return response.data;
        }
    } catch (e) {
        return e;
    }
}

export function mostrarErrores(lugar, erroresArray, tipo) {
    const divErrores = document.querySelector(`#${lugar}`);
    erroresArray.forEach((error) => {
        const pError = document.createElement("p");
        pError.classList.add("text-center", "border", "rounded-lg", "font-semibold", "p-1", "my-2", "bg-red-600", "text-white");
        pError.textContent = error;

        divErrores.appendChild(pError);
        setTimeout(() => {
            divErrores.innerHTML = ""
        }, 4000);
    });
}
