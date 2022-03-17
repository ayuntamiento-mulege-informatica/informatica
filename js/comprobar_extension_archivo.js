function fileValidation(foto){
	// Se obtiene elemento por ID.
	var fileInput = document.getElementById(foto);
	// Obtención del valor del archivo.
	var filePath = fileInput.value;
	// Formatos admitidos en el formulario.
	var allowedExtensions = /(.jpg|.jpeg)$/i;

	// Si la extensión del archivo no coincide con las permitidas, se emite mensaje de error.
	if(!allowedExtensions.exec(filePath)){
		alert('Solo se admiten archivos en formato JPG (.jpg, .jpeg).');
		fileInput.value = '';
		return false;
	}
}
