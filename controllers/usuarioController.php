<?php
    require_once '../models/Usuario.php';
    switch ($_GET["op"]) {
        case 'insertar':
            $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
            $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
            $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";

              //$clave=randomPassword();
              $clavehash = hash('SHA256', trim($password));
                  $usuario = new Usuario();
                  $usuario->setEmail($email);
                  $encontrado = $usuario->verificarExistenciaDb();
                  if ($encontrado == false) {
                      $usuario->setEmail($email);
                      $usuario->setNombre($nombre);
                      $usuario->setClave($clavehash);
                      $usuario->guardarEnDb();
                      if($usuario->verificarExistenciaDb()){
                          //if(enviarCorreo($email,$clave,$nombre)){
                              echo 1; //usuario registrado y envio de correo exitos
                          //}else{
                            //  echo 4; //usuario registrado y envio de correo fallido
                          //}
                      }else{
                          echo 3; //Fallo al realizar el registro
                      }
                  } else {
                      echo 2; //el usuario ya existe
                  }
        break;
        case 'existeUsuario':
            $usuario = isset($_POST["user"]) ? $_POST["user"] : "";
            $user_login = new Usuario();
            $user_login->setUsuario($usuario);
            $encontrado = $user_login->verificarExistenciaDb();
            if ($encontrado != null) {
                echo 1;
            }else{
                echo 0;
            }
        break;
        case 'mostrar':
            $usuario = isset($_POST["user"]) ? $_POST["user"] : "";
            $user = new Usuario();
            $user->setUsuario($usuario);
            $encontrado = $user->mostrar($usuario);
            if ($encontrado != null) {
                $arr = Array();
                $arr[] = [
                    "usuario" => $encontrado->getUsuario(),
                    "nombre" => $encontrado->getNombre(),
                    "correo" => $encontrado->getCorreo()
                ];
    
                echo json_encode($arr);
            }else{
                echo 0;
            }
        break;
       
      }
?>