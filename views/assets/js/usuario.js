
/*
CRUD
*/
/*
CRUD
*/
$('#usuario_add').on('submit', function (event) {
  event.preventDefault();
  $('#btnRegistar').prop('disabled', true);
  var formData = new FormData($('#usuario_add')[0]);
  $.ajax({
    url: '../controllers/usuarioController.php?op=insertar',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      switch (datos) {
        case '1':
          toastr.success(
            'Usuario registrado'
          );
          $('#usuario_add')[0].reset();
          
          break;

        case '2':
         toastr.error(
            'El correo ya existe... Corrija e inténtelo nuevamente...'
          );
          break;

        case '3':
          toastr.error('Hubo un error al tratar de ingresar los datos.');
          break;
        /*
        case '4':
          toastr.success('Usuario registrado exitosamente.');
          $('#usuario_add')[0].reset();
          tabla.api().ajax.reload();
          toastr.error('Error al enviar el correo.');
          break;*/

        default:
          toastr.error(datos);
          break;
      }
      $('#btnRegistar').removeAttr('disabled');
    },
  });
});

