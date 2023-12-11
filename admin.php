<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page fgets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monifai | Administrador</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.css"> 
  <style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>
<style>
    button[type='submit'] {
      padding: 5px 10px;;
      background-color: #28a745; /* Color de fondo verde (puedes cambiarlo según tu preferencia) */
      color: #fff; /* Color del texto blanco */
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease; /* Agrega una transición suave al color de fondo */
    }

    button[type='submit']:hover {
      background-color: #218838; /* Cambia el color de fondo al pasar el ratón sobre el botón */
    }
  </style>
<style>
  select {
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: #fff;
    cursor: pointer;
  }

  /* Estilos para los íconos de las opciones */
  select::after {
    content: '\25BC'; /* Carácter de flecha hacia abajo */
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    pointer-events: none;
  }

  /* Estilo para las opciones al desplegarse */
  select:hover,
  select:focus {
    border-color: #5cb3fd; /* Cambia el color del borde cuando se interactúa con el elemento */
  }

  /* Cambia el color del borde de la opción seleccionada */
  option:checked {
    border-color: #5cb3fd;
  }
</style>
  

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
        <a href="index_admi.php" class="nav-link">Home</a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
       
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index_admi.php" class="brand-link">
      <img src="logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Monifai Administrador</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Perfil</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
            <i class="fas fa-th-list"></i>
              <p>
                Menú
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-wallet"></i>
                  <p>Administrar créditos</p>
                </a>

                <a href="enviaremail.php" class="nav-link">
                  <i class="fas fa-wallet"></i>
                  <p>Enviar Email</p>
                </a>

                <a href="index_login.php" class="nav-link">
                <i class="fas fa-times"></i>
                  <p>Cerrar sesión</p>
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
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <br>
        <br>
        <br>
        <div class="row justify-content-center">
          
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
           
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Solicitudes de prestamos</h5>
              </div>

              

              <!-- form de solicitud de prestamo-->
              <div class="card-body" >
     
                          <?php

                          if (!empty($mensaje)) {
                              // Mostrar mensaje si está presente
                              echo "<p>$mensaje</p>";
                          }

                          // Conexión a la base de datos (actualiza con tus propios valores)
                          $servername = "localhost";
                          $username = "root";
                          $password = '';
                          $dbname = "proyecto_db";

                          $conn = new mysqli($servername, $username, $password, $dbname);

                          // Verificar la conexión
                          if ($conn->connect_error) {
                              die("Error de conexión: " . $conn->connect_error);
                          }


                          // Consulta SQL para obtener los datos
                          $sql = "SELECT * FROM credito";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {

               
                            // Mostrar los datos en una tabla HTML
                            echo "<div style='overflow-x: auto;'>";
                            echo "<table style='width: 100%; border-collapse: collapse;'>";
                            echo "<tr>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Cédula</th>
                            <th>Monto</th>
                            <th>Estado</th>
                            <th>Fecha de Creación</th>
                            <th>Estado Solicitud</th>
                            </tr>";

                            // Mostrar datos de cada fila
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["nombre"] . "</td>";
                                echo "<td>" . $row["telefono"] . "</td>";
                                echo "<td>" . $row["cedula"] . "</td>";
                                echo "<td>" . $row["monto"] . "</td>";
                                echo "<td>" . ($row["estado"] == 1 ? 'Asalariado' : 'Independiente') . "</td>";
                                echo "<td>" . $row["created_at"] . "</td>";
                                echo "<td>";

                                // Formulario para editar el estadoSoli
                                echo "<form method='post' action='actualizar_estado.php'>";
                                echo "<input type='hidden' name='credito_id' value='" . $row["id"] . "'>";
                                echo "<select name='nuevo_estado'>";
                                echo "<option value='pendiente' " . ($row["estadoSoli"] == 'pendiente' ? 'selected' : '') . ">Pendiente</option>";
                                echo "<option value='aceptado' " . ($row["estadoSoli"] == 'aceptado' ? 'selected' : '') . ">Aceptado</option>";
                                echo "<option value='rechazado' " . ($row["estadoSoli"] == 'rechazado' ? 'selected' : '') . ">Rechazado</option>";
                                echo "</select>";
                                
                                echo "<button type='submit'>Confirmar</button>";
                                echo "</form>";

                                echo "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                            echo "</div>";  // Cierre de la etiqueta <div>
                          } else {
                            echo "No se encontraron resultados.";
                          }

                          // Cerrar la conexión
                          $conn->close();
                          ?>

               </div>



            </div>

            

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>¿Quienes somos?</h5>
      <br>
      <br>
      <p>Somos una entidad financiera con el respaldo internacional del YNV Group 
        y un equipo con profesionales de gran trayectoria en el sector financiero 
        rabajando para diseñar formas 
        de financiamiento sin trabas, complicaciones ni largos tiempos de espera.</p>
        <br>
        <br>

        <img src="https://monifai.com/wp-content/uploads/2023/01/burbuja.png" height="150px" width="100%" alt="moni">
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="assets/js/credito.js"></script>
<script src="plugins/toastr/toastr.js"></script>

</body>
</html>
