<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../views/assets/css/styleLogin.css" />  
    <link rel="stylesheet" href="plugins/toastr/toastr.css">   
   
    
  </head>
  <body>
    <div class="container">
      <div class="info"></div>

      <form  id="usuario_add" method="POST" class= "form">
        <h2>Crear cuenta</h2>

        <div class="inputs">
         <input type="text" class="box" id="email" name="email" placeholder="Email" required>
         <input type="text" class="box" id="nombre" name="nombre" placeholder="Nombre Completo" required>
         <input type="password" class="box" id="password" name="password" placeholder="Contraseña" required>
         
          <br>
          <br>


          <input type="submit" id="btnRegistar" class="submit" value="CREAR CUENTA"/>
        </div>
      </form>
      
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/toastr/toastr.js"></script>
    <script src="assets/js/usuario.js"></script>

  </body>

  
</html>
