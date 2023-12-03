<?php
require_once '../config/Conexion.php';

class Credito extends Conexion
{
    /*=============================================
	=            Atributos de la Clase            =
	=============================================*/
        protected static $cnx;
		private $id=null;
		private $email=null;
		private $nombre= null;
		private $telefono=null;
        private $cedula=null;
        private $monto=null;
		private $estado= null;
		
	/*=====  End of Atributos de la Clase  ======*/

    /*=============================================
	=            Contructores de la Clase          =
	=============================================*/
        public function __construct(){}
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
	=            Encapsuladores de la Clase       =
	=============================================*/
        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }

        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getNombre()
        {
            return $this->nombre;
        }
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getTelefono()
        {
            return $this->telefono;
        }
        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }

        public function getCedula()
        {
            return $this->cedula;
        }
        public function setCedula($cedula)
        {
            $this->cedula = $cedula;
        }
        
        public function getMonto()
        {
            return $this->monto;
        }
        public function setMonto($monto)
        {
            $this->monto = $monto;
        }

        public function getEstado()
        {
            return $this->estado;
        }
        public function setEstado($estado)
        {
            $this->estado = $estado;
        }

       
    /*=====  End of Encapsuladores de la Clase  ======*/

    /*=============================================
	=            Metodos de la Clase              =
	=============================================*/
        public static function getConexion(){
            self::$cnx = Conexion::conectar();
        }

        public static function desconectar(){
            self::$cnx = null;
        }

        public function listarTodosDb(){
            $query = "SELECT * FROM credito";
            $arr = array();
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->execute();
                self::desconectar();
                foreach ($resultado->fetchAll() as $encontrado) {
                    $credit = new Credito();
                    $credit->setId($encontrado['id']);
                    $credit->setEmail($encontrado['email']);
                    $credit->setNombre($encontrado['nombre']);
                    $credit->setTelefono($encontrado['telefono']);
                    $credit->setCedula($encontrado['cedula']);
                    $credit->setMonto($encontrado['monto']);
                    $credit->setEstado($encontrado['estado']);
                    $arr[] = $credit;
                }
                return $arr;
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
                return json_encode($error);
            }
        }

        public function verificarExistenciaDb(){
            $query = "SELECT * FROM credito where cedula=:cedula";
         try {
             self::getConexion();
                $resultado = self::$cnx->prepare($query);		
                $cedula= $this->getCedula();	
                $resultado->bindParam(":cedula",$cedula,PDO::PARAM_STR);
                $resultado->execute();
                self::desconectar();
                $encontrado = false;
                foreach ($resultado->fetchAll() as $reg) {
                    $encontrado = true;
                }
                return $encontrado;
               } catch (PDOException $Exception) {
                   self::desconectar();
                   $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                 return $error;
               }
        }

        public function guardarEnDb(){
            $query = "INSERT INTO `credito`(`email`, `nombre`, `telefono`, `cedula`, `monto`, `estado`, `created_at`) VALUES (:email,:nombre,:telefono,:cedula,:monto,:estado,now())";
         try {
             self::getConexion();
             $email=$this->getEmail();
             $nombre=strtoupper($this->getNombre());
             $telefono=$this->getTelefono();
             $cedula=$this->getCedula();
             $monto=$this->getMonto();
             $estado=$this->getEstado();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":email",$email,PDO::PARAM_STR);
            $resultado->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $resultado->bindParam(":telefono",$telefono,PDO::PARAM_STR);
            $resultado->bindParam(":cedula",$cedula,PDO::PARAM_STR);
            $resultado->bindParam(":monto",$monto,PDO::PARAM_STR);
            $resultado->bindParam(":estado",$estado,PDO::PARAM_INT);
          
                $resultado->execute();
                self::desconectar();
               } catch (PDOException $Exception) {
                   self::desconectar();
                   $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
                 return json_encode($error);
               }
        }

        public function activar(){
            $id = $this->getId();
            $query = "UPDATE credito SET estado='1' WHERE id=:id";
           try {
             self::getConexion();
              $resultado = self::$cnx->prepare($query);
              $resultado->bindParam(":id",$id,PDO::PARAM_INT);
              self::$cnx->beginTransaction();//desactiva el autocommit
              $resultado->execute();
              self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
              self::desconectar();
              return $resultado->rowCount();
             } catch (PDOException $Exception) {
               self::$cnx->rollBack();
               self::desconectar();
               $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
               return $error;
             }
        }

        public function desactivar(){
            $id = $this->getId();
            $query = "UPDATE credito SET estado='0' WHERE id=:id";
            try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id",$id,PDO::PARAM_INT);
            self::$cnx->beginTransaction();//desactiva el autocommit
            $resultado->execute();
            self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
            self::desconectar();
            return $resultado->rowCount();
            } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
            }
        }

        public static function mostrar($correo){
            $query = "SELECT * FROM credito where email=:id";
            $id = $correo;
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":id",$id,PDO::PARAM_STR);
                $resultado->execute();
                self::desconectar();
                return $resultado->fetch();
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                return $error;
            }
    
        }

        public function llenarCampos($id){
            $query = "SELECT * FROM credito where id=:id";
            try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);		 	
            $resultado->bindParam(":id",$id,PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setId($encontrado['id']);
                $this->setNombre($encontrado['nombre']);
                $this->setEstado($encontrado['estado']);
            }
            } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();;
            return json_encode($error);
            }
        }

        public function actualizarCredito(){
            $query = "update credito set nombre=:nombre,telefono=:telefono where id=:id and email=:email";
            try {
                self::getConexion();
                $id=$this->getId();
                $email=$this->getEmail();
                $nombre=$this->getNombre();
                $telefono=$this->getTelefono();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":email",$email,PDO::PARAM_STR);
                $resultado->bindParam(":nombre",$nombre,PDO::PARAM_STR);
                $resultado->bindParam(":telefono",$telefono,PDO::PARAM_STR);
                $resultado->bindParam(":id",$id,PDO::PARAM_INT);
                self::$cnx->beginTransaction();//desactiva el autocommit
                $resultado->execute();
                self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
                self::desconectar();
                return $resultado->rowCount();
            } catch (PDOException $Exception) {
                self::$cnx->rollBack();
                self::desconectar();
                $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                return $error;
            }
        }

        public function verificarExistenciaCedula(){
            $query = "SELECT email,id,nombre,telefono FROM credito where cedula=:cedula";
            try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);		
            $cedula= $this->getCedula();		
            $resultado->bindParam(":cedula",$cedula,PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            $encontrado = false;
            $arr=array();
            foreach ($resultado->fetchAll() as $reg) {
                $arr[]=$reg['id'];
                $arr[]=$reg['email'];   
                $arr[]=$reg['nombre'];  
                $arr[]=$reg['telefono'];  
            }
            return $arr;
            return $encontrado;
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
            }
        }
    /*=====  End of Metodos de la Clase  ======*/  
}
?>