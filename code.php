<?php 
session_start();
$connection = mysqli_connect("localhost","root"," ","adminpanel");

if(isset($_POST['registerbtn'])){

    $usuarioname = $_POST['usuarioname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmepassword = $_POST['confirmepassword'];

    if($password===confirmepassword){

    

    $query = "INSERT INTO register (usuarioname, email, password) VALUES ('$usuarioname', '$email', '$password')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
//        echo "Fue Salvada";
        $_SESSION['success'] = "Admin Agregado";
        header('Location: register.php');

    }else{
  
//echo "NO Fue Salvada";
        $_SESSION['Estatus'] = "Admin No Agregado";
        header('Location: register.php');

}
}
else{
    $_SESSION['Estatus'] = "Contraseña no es igual";
    header('Location: register.php');
}
}
?>