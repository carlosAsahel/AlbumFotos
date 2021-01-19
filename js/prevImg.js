// Obtener referencia al input y a la imagen

const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
  $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");



// Escuchar cuando cambie
$seleccionArchivos.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
   var fileInput = document.getElementById('seleccionArchivos');
    var filePath = fileInput.value;
  const archivos = $seleccionArchivos.files;
   var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;

    if(!allowedExtensions.exec(filePath)){
        alert('Por favor seleccione archivos de tipo .jpeg/.jpg/.png/.gif unicamente.');
        fileInput.value = '';
        return false;
    }
    
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;

});