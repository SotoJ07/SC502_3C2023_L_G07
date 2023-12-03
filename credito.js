/*Funcion para limpieza de los formularios*/
function limpiarForms() {
    $('#modulos_add').trigger('reset');
    $('#modulos_update').trigger('reset');
  }
  
  /*Funcion para cancelacion del uso de formulario de modificación*/
  function cancelarForm() {
    limpiarForms();
    $('#formulario_add').show();
    $('#formulario_update').hide();
  }
  
  

 

  /*
  CRUD
  */
  $('#credito_add').on('submit', function (event) {
    event.preventDefault();
    $('#btnEnviar').prop('disabled', true);
    var formData = new FormData($('#credito_add')[0]);
    $.ajax({
      url: '../controllers/creditoController.php?op=insertar',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        switch (datos) {
          case '1':
            toastr.success(
              'Solicitud enviada'
            );
            $('#credito_add')[0].reset();
            
            break;
  
          case '2':
            toastr.error(
              'Sus datos ya están registrados en la Base de Datos. Espere su respuesta'
            );
            break;
  
          case '3':
            toastr.error('Hubo un error al tratar de ingresar los datos.');
            break;
          /*
          case '4':
            toastr.success('Usuario registrado exitosamente.');
            $('#credito_add')[0].reset();
            tabla.api().ajax.reload();
            toastr.error('Error al enviar el correo.');
            break;*/
  
          default:
            toastr.error(datos);
            break;
        }
        $('#btnEnviar').removeAttr('disabled');
      },
    });
  });
  
  /*Funcion para activacion de usuarios*/
  function activar(id) {
    bootbox.confirm('¿Esta seguro de activar el usuario?', function (result) {
      if (result) {
        $.post(
          '../controllers/usuarioController.php?op=activar',
          { idUser: id },
          function (data, textStatus, xhr) {
            switch (data) {
              case '1':
                toastr.success('Usuario activado');
                tabla.api().ajax.reload();
                break;
  
              case '0':
                toastr.error(
                  'Error: El usuario no puede activarse. Consulte con el administrador...'
                );
                break;
  
              default:
                toastr.error(data);
                break;
            }
          }
        );
      }
    });
  }
  
  /*Funcion para desactivacion de usuarios*/
  function desactivar(id) {
    bootbox.confirm('¿Esta seguro de desactivar el usuario?', function (result) {
      if (result) {
        $.post(
          '../controllers/usuarioController.php?op=desactivar',
          { idUser: id },
          function (data, textStatus, xhr) {
            switch (data) {
              case '1':
                toastr.success('Usario desactivado');
                tabla.api().ajax.reload();
                break;
  
              case '0':
                toastr.error(
                  'Error: El modulo no puede desactivarse. Consulte con el administrador...'
                );
                break;
  
              default:
                toastr.error(data);
                break;
            }
          }
        );
      }
    });
  }
  
 
  
  /*Funcion para modificacion de datos de usuario*/
  $('#usuario_update').on('submit', function (event) {
    event.preventDefault();
    bootbox.confirm('¿Desea modificar los datos?', function (result) {
      if (result) {
        var formData = new FormData($('#usuario_update')[0]);
        $.ajax({
          url: '../controllers/creditoController.php?op=editar',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (datos) {
            //alert(datos);
            switch (datos) {
              case '0':
                toastr.error('Error: No se pudieron actualizar los datos');
                break;
              case '1':
                toastr.success('Usuario actualizado exitosamente');
                tabla.api().ajax.reload();
                limpiarForms();
                $('#formulario_update').hide();
                $('#formulario_add').show();
                break;
              case '2':
                toastr.error('Error: Correo no pertenece al usuario.');
                break;
            }
          },
        });
      }
    });
  });