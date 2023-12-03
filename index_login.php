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
  <div class="head">
      <div class="logo">
        <img src="logo.png" height="65px" width="100%" alt="logo"></img>
      </div>


      <nav class="navbar">
        <a href="index_principal.php">Inicio</a>
        <a href="#">Nosotros</a>
        <a href="usuario.php">Registrate</a>
        <a href="index_login.php">Tu cuenta</a>
      </nav>
    </div>
    

    <div class="container">
      <div class="info"></div>

      <form  id="login_form" class= "form" method="POST" >
        <h2>Login</h2>

        <p>Bienvenido de nuevo</p>

        <div class="inputs">
        <input type="text" class="box" id="login_usuario" name="usuario" placeholder="Ingresa tu usuario" />
        <input type="password" class="box" id="login_password" name="password" placeholder="Ingresa tu contraseña" />

          <a href="usuario.php">CREAR CUENTA</a>
          <input type="submit" value="Login" class="submit" />
        </div>
      </form>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/toastr/toastr.js"></script>
    <script src="assets/js/usuario.js"></script>
  </body>
</html>
