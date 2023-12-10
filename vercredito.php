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
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Include the script for handling the charts -->
  <script src="assets/js/graficos.js"></script>
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
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Gráficos y Estadísticas</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row mb-3">
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Filtros y Gráfico de ejemplo</h3>
              </div>
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="filtro">Filtrar por:</label>
                    <select id="filtro" class="form-control">
                      <option value="ventas">Ventas</option>
                      <option value="usuarios">Usuarios</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <button id="aplicarFiltro" class="btn btn-primary">Aplicar Filtro</button>
                  </div>
                </div>

                <canvas id="miGrafico" style="height: 230px; max-height: 230px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  </aside>

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="#">Monifai</a>.</strong> All rights reserved.
  </footer>
</div>

<!-- REQUIRED SCRIPTS -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/toastr/toastr.js"></script>
<script src="assets/js/graficos.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var chartOptions = {
      scales: {
        x: {
          type: 'linear',
          position: 'bottom'
        },
        y: {
          min: 0,
          max: 2000000
        }
      }
    };

    var myChart = initializeChart('miGrafico', chartOptions);

    function fetchData() {
      fetch('Conexion.php')
        .then(response => response.json())
        .then(data => {
          const newData = Array.from({ length: 10 }, () => Math.floor(Math.random() * 2000000));
          updateChartData(myChart, newData);
        })
        .catch(error => console.error('Error fetching data:', error));
    }

    fetchData();
    setInterval(fetchData, 5000);
  });
</script>
</body>
</html>
