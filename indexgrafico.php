<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Monifai | Panel de Administrador</title>
            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Font Awesome Icons -->
            <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="dist/css/adminlte.min.css">
            <!-- Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                            <a href="#" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link">Graficos</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link">Casos</a>
                        </li>
                    </ul>
        
                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-bell"></i>
                                <span class="badge badge-warning navbar-badge">15</span>
                            </a>
                            <!-- Resto del código para notificaciones -->
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
        
                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="#" class="brand-link">
                        <img src="dist/img/AdminLTELogo.png" alt="Monifai Logo" class="brand-image img-circle elevation-3"
                            style="opacity: .8">
                        <span class="brand-text font-weight-light">Monifai</span>
                    </a>
        
                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">Ronal Delgado</a>
                            </div>
                        </div>
                        <!-- Resto del código de la sidebar -->
                    </div>
                    <!-- /.sidebar -->
                </aside>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <div class="content">
                        <div class="container-fluid">
                            <!-- Sección del filtro -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="fechaInicio">Fecha de Inicio:</label>
                                    <input type="date" id="fechaInicio" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="fechaFin">Fecha de Fin:</label>
                                    <input type="date" id="fechaFin" class="form-control">
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tipoPrestamo">Tipo de Préstamo:</label>
                                    <!-- Aquí podrías agregar un select con opciones de tipo de préstamo -->
                                    <select id="tipoPrestamo" class="form-control">
                                        <option value="todos">Todos</option>
                                        <option value="personales">Personales</option>
                                        <option value="estudio">Estudio</option>
                                        <option value="hipotecarios">Hipotecarios</option>
                                        <!-- Otras opciones aquí -->
                                    </select>
                                </div>
                                <!-- Agregamos un nuevo control de filtro para el estado -->
                                <div class="col-md-6">
                                    <label for="estadoPrestamo">Estado del Préstamo:</label>
                                    <select id="estadoPrestamo" class="form-control">
                                        <option value="todos">Todos</option>
                                        <option value="aceptados">Aceptados</option>
                                        <option value="rechazados">Rechazados</option>
                                        <!-- Agrega más estados si es necesario -->
                                    </select>
                                </div>
                            </div>
        
                            <!-- Nuevo filtro para el género -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="genero">Género:</label>
                                    <select id="genero" class="form-control">
                                        <option value="todos">Todos</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                        <option value="Prefiero no decir">Prefiero no decir</option>
                                        <!-- Otras opciones si es necesario -->
                                    </select>
                                </div>
                            </div>
        
                            <!-- Contenedor del gráfico -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <canvas id="graficoMuestra"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    // Datos de muestra
                                    var dataMuestra = {
                                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                                        datasets: [{
                                            label: 'Ejemplo de Préstamos',
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1,
                                            data: [30, 40, 35, 50, 65],
                                        }]
                                    };
        
                                    var optionsMuestra = {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    };
        
                                    var ctxMuestra = document.getElementById('graficoMuestra').getContext('2d');
        
                                    var myChartMuestra = new Chart(ctxMuestra, {
                                        type: 'bar',
                                        data: dataMuestra,
                                        options: optionsMuestra
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
        
                <!-- REQUIRED SCRIPTS -->
                <!-- Resto del código de scripts -->
            </body>
        
            </html>
        