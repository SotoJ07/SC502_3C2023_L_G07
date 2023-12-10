document.addEventListener('DOMContentLoaded', function () {
  // Obtener referencia al elemento de selección de filtro y al botón de aplicar filtro
  var filtroSelect = document.getElementById('filtro');
  var aplicarFiltroBtn = document.getElementById('aplicarFiltro');

  // Obtener referencia al elemento de lienzo (canvas) para el gráfico
  var miGraficoCanvas = document.getElementById('miGrafico').getContext('2d');

  // Variable para almacenar la referencia al gráfico actual
  var graficoActual = null;

  // Función para mostrar el gráfico según los datos proporcionados
  function mostrarGrafico(datos) {
      // Destruir el gráfico existente si existe
      if (graficoActual) {
          graficoActual.destroy();
      }

      // Crear y devolver el nuevo gráfico
      return new Chart(miGraficoCanvas, {
          type: 'bar',
          data: {
              labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
              datasets: [{
                  label: 'Datos',
                  data: datos,
                  backgroundColor: 'rgba(0, 123, 255, 0.7)',
                  borderColor: 'rgba(0, 123, 255, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
  }

  // Función para cargar y mostrar los datos desde la base de datos
  function cargarDatosDesdeDB() {
      // Realizar una solicitud AJAX para obtener los datos desde vercredito.php
      fetch('vercredito.php')
          .then(response => response.json())
          .then(datos => {
              // Obtener los datos de la respuesta y actualizar el gráfico
              graficoActual = mostrarGrafico(datos);
          })
          .catch(error => console.error('Error al obtener los datos:', error));
  }

  // Cargar y mostrar datos al cargar la página
  cargarDatosDesdeDB();

  // Evento al hacer clic en el botón de aplicar filtro
  aplicarFiltroBtn.addEventListener('click', function () {
      // Actualizar el gráfico con los nuevos datos filtrados
      cargarDatosDesdeDB(); // Esto recargará todos los datos y aplicará el filtro en el backend si es necesario
  });
});
