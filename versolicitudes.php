<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monifai | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.css"> 
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="indexgrafico.php" class="brand-link">
      <img src="logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Monifai Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fas fa-treasure-chest"></i>
              <p>
                Menú
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="vercredito.php" class="nav-link">
                  <i class="fas fa-chart-bar"></i>
                  <p>Ver Gráficos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="versolicitudes.php" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p>Ver Solicitudes</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Solicitudes de Crédito</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Filtros y Tabla de Solicitudes -->
        <div class="row mb-3">
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Monto</th>
                  <th>Fecha</th>
                  <th>Tipo</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
  <?php
  // Aquí debes agregar el código PHP para recuperar las solicitudes desde la base de datos
  // Puedes usar una consulta SQL y un bucle para mostrar cada solicitud en una fila de la tabla
  // Ejemplo:
  
  /*
  $solicitudes = obtenerSolicitudes(); // Debes implementar esta función

  foreach ($solicitudes as $solicitud) {
    echo '<tr>';
    echo '<td>' . $solicitud['id'] . '</td>';
    echo '<td>' . $solicitud['nombre'] . '</td>';
    echo '<td>' . $solicitud['monto'] . '</td>';
    echo '<td>' . $solicitud['fecha'] . '</td>';
    echo '<td>' . $solicitud['tipo'] . '</td>';
    echo '<td>';
    echo '<button class="btn btn-success" onclick="aceptarSolicitud(' . $solicitud['id'] . ')">Aceptar</button>';
    echo '<button class="btn btn-danger" onclick="rechazarSolicitud(' . $solicitud['id'] . ')">Rechazar</button>';
    echo '</td>';
    echo '</tr>';
  }
  */
  ?>
</tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="#">Monifai</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/toastr/toastr.js"></script>

<!-- Script para manejar las acciones de aceptar y rechazar -->
<script>
  function aceptarSolicitud(id) {
    // Aquí debes agregar el código JavaScript/Ajax para enviar la solicitud al servidor y marcarla como aceptada
    // Puedes usar $.ajax de jQuery o fetch API de JavaScript para hacer la petición al servidor
    // Ejemplo con $.ajax:
    
    $.ajax({
      url: 'procesar_solicitud.php',
      type: 'POST',
      data: { id: id, accion: 'aceptar' },
      success: function (response) {
        // Manejar la respuesta del servidor, por ejemplo, mostrar un mensaje de éxito
        toastr.success('Solicitud aceptada con éxito');
        // Actualizar la tabla de solicitudes si es necesario
        // Puedes recargar la página o actualizar la tabla de forma dinámica sin recargar
        // ActualizarTablaSolicitudes();
      },
      error: function (error) {
        // Manejar errores, por ejemplo, mostrar un mensaje de error
        toastr.error('Error al procesar la solicitud');
      }
    });
    
  }

  function rechazarSolicitud(id) {
    // Aquí debes agregar el código JavaScript/Ajax para enviar la solicitud al servidor y marcarla como rechazada
    // Puedes usar $.ajax de jQuery o fetch API de JavaScript para hacer la petición al servidor
    // Ejemplo con $.ajax:
    
    $.ajax({
      url: 'procesar_solicitud.php',
      type: 'POST',
      data: { id: id, accion: 'rechazar' },
      success: function (response) {
        // Manejar la respuesta del servidor, por ejemplo, mostrar un mensaje de éxito
        toastr.success('Solicitud rechazada con éxito');
        // Actualizar la tabla de solicitudes si es necesario
        // Puedes recargar la página o actualizar la tabla de forma dinámica sin recargar
        // ActualizarTablaSolicitudes();
      },
      error: function (error) {
        // Manejar errores, por ejemplo, mostrar un mensaje de error
        toastr.error('Error al procesar la solicitud');
      }
    });
    
  }

  // Puedes agregar funciones adicionales según tus necesidades, por ejemplo, para actualizar la tabla de solicitudes dinámicamente
  
  function ActualizarTablaSolicitudes() {
    // Aquí puedes recargar la tabla de solicitudes con datos actualizados
    // Puedes usar $.ajax o fetch API para obtener las nuevas solicitudes desde el servidor
  }
  
</script>

</body>
</html>
