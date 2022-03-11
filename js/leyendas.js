document.querySelector('#id_leyenda').addEventListener('change', event => {
  console.log(event.target.value);

  fetch('/lib/lista_leyendas.php?id_leyenda='+event.target.value)
  .then(respuesta => {
    if(!respuesta.ok) {
      throw new Error('Hubo un error en la respuesta');
    }
    return respuesta.json();
  })
  .then(datos => {
    let html = '';
    if(datos.data.length > 0) {
      for (var i = 0; i < datos.data.length; i++) {
        html = `${datos.data[i].leyenda}`;
      }
    }
    document.querySelector('#leyenda_texto').innerHTML = html;
  })
  .catch(error => {
    console.error('Ocurrió un error '+error);
  });
});
