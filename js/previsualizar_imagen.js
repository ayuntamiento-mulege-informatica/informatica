function archivo1(evt) {
  var files = evt.target.files;
  for (var i = 0, f; f = files[i]; i++) {
    if (!f.type.match('image.*')) {
      continue;
    }
    var reader = new FileReader();
    reader.onload = (function(theFile) {
      return function(e) {
        document.getElementById("list1").innerHTML = ['<img class="imagen-formulario" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
      };
    })(f);
    reader.readAsDataURL(f);
  }
}
document.getElementById('evidencia').addEventListener('change', archivo1, false);
