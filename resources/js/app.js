import './bootstrap';
import {Dropzone} from "dropzone";

//Configuracion de Dropzone
Dropzone.autoDiscover = false;
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false
});

dropzone.on('sending', function (file, xhr, formData) {
    console.log(file)
});

dropzone.on("success", function (file, response) {
    console.log(response)
})

dropzone.on("error", function (file, message) {
    console.log(message)
})
