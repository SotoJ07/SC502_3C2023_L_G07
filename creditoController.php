<?php
    require_once '../models/Credito.php';
    switch ($_GET["op"]) {
       
        case 'insertar':
              $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
              $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
              $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
              $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : "";
              $monto = isset($_POST["monto"]) ? trim($_POST["monto"]) : "";
              $estado = isset($_POST["estado"]) ? trim($_POST["estado"]) : 1;
              
              
                  $credito = new Credito();
                  $credito->setCedula($cedula);
                  $encontrado = $credito->verificarExistenciaDb();
                  if ($encontrado == false) {
                      $credito->setEmail($email);
                      $credito->setNombre($nombre);
                      $credito->setTelefono($telefono);
                      $credito->setCedula($cedula);
                      $credito->setMonto($monto);
                      $credito->setEstado($estado);
                      $credito->guardarEnDb();
                      if($credito->verificarExistenciaDb()){
                          //if(enviarCorreo($email,$clave,$nombre)){
                              echo 1; //credito registrado y envio de correo exitos
                          //}else{
                            //  echo 4; //credito registrado y envio de correo fallido
                          //}
                      }else{
                          echo 3; //Fallo al realizar el registro
                      }
                  } else {
                      echo 2; //el credito ya existe
                  }
        break;
        case 'existeUsuario':
            $credito = isset($_POST["credit"]) ? $_POST["credit"] : "";
            $user_login = new Credito();
            $user_login->setUsuario($credito);
            $encontrado = $user_login->verificarExistenciaDb();
            if ($encontrado != null) {
                echo 1;
            }else{
                echo 0;
            }
        break;
        case 'activar':
            $ul = new Credito();
            $ul->setId(trim($_POST['idUser']));
            $rspta = $ul->activar();
            echo $rspta;
        break;
        case 'desactivar':
            $ul = new Credito();
            $ul->setId(trim($_POST['idUser']));
            $rspta = $ul->desactivar();
            echo $rspta;
        break;
        case 'mostrar':
            $credito = isset($_POST["credit"]) ? $_POST["credit"] : "";
            $credit = new Credito();
            $credit->setUsuario($credito);
            $encontrado = $credit->mostrar($credito);
            if ($encontrado != null) {
                $arr = Array();
                $arr[] = [
                    "credito" => $encontrado->getUsuario(),
                    "nombre" => $encontrado->getNombre(),
                    "correo" => $encontrado->getCorreo()
                ];
    
                echo json_encode($arr);
            }else{
                echo 0;
            }
        break;
        case 'editar':
              $id = isset($_POST["id"]) ? trim($_POST["id"]) : "";
              $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
              $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
              $image = isset($_POST["imagen"]) ? trim($_POST["imagen"]) : "";
              $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
              $credito = new credito();
              $credito->setEmail($email);
              $encontrado = $credito->verificarExistenciaDb();
              if ($encontrado == 1) {
                $credito->llenarCampos($id);
                //$modulo->setNombre($nombreModif);
              $credito->setId($id);
              $credito->setEmail($email);
              $credito->setNombre($nombre);
              $credito->setImagen($image);
              $credito->setTelefono($telefono);
                $modificados = $credito->actualizarUsuario();
                if ($modificados > 0) {
                  echo 1;
                } else {
                  echo 0;
                }
              }else{
                echo 2;	
              }
        break;
      }
?>