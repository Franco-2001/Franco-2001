<!DOCTYPE html>
<head>
    <title>LOGIN</title>
    <link href="./styles/estilosLogin.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
                        <!---------BODY-------->
<body class="bg-secondary"> 

                          <!---------HEADER-------->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 
  <a class="navbar-brand" href="index.php">   
        <img src="./resources/descarga (3).png" height="50" width="50"  class="foto" style="border-radius: 50%;">
  </a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" 
   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
   aria-expanded="false" aria-label="Toggle navigation">
</button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
         <a class="nav-link" href="#">NOSOTROS <span class="sr-only">(current)</span></a>
       </li>
         <li class="nav-item active">
         <a class="nav-link" href="index.php">INICIAR SESION <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="inicio.php">INICIO  <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item active">
              <a class="nav-link" href="Registrarse.php">REGISTRARSE  <span class="sr-only">(current)</span></a>
       </li>
   </ul>
 </div>
</nav>
</header>

<div class="login-page">
  <div class="form">
    <form method="POST"class="login-form">
      <input type="number" name="dni" placeholder="INGRESE SU DNI"/>
      <input type="text" name="nombre" placeholder="INGRESE SU NOMBRE"/>
      <input type="submit" name="btningresar" placeholder="nombre" value="INGRESAR"/>
      <a href="Registrarse.php"> <input type="button" name="btnregistrarse" placeholder="registrarse" value="REGISTRARSE"/></a>
    
    </form>
  </div>
</div>
<?php
    $conn = new mysqli("localhost:3306", "root", "river2001", "turismo");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
      
    if(!empty($_POST ["btningresar"])){
        if(empty($dni=$_POST['dni']) and empty($nombre=$_POST['nombre'])){
         echo "complete los campos";
        } else {
          $dni=$_POST['dni'];
          $nombre=$_POST['nombre'];
          $sql=$conn->query("SELECT * FROM clientes where dni='$dni' and nombre='$nombre' ");
        } 
        if ($datos = $sql->fetch_object()){
          header("location:inicio.php");
        } else{
          //echo "acceso denegado";
          
          echo '<script language="javascript"> alert("su dni o nombre es incorrecto"); </script>';
        
        }

    }
   ?>  




                         <!---------FOOTER-------->
                         
     <footer class="text-center text-lg-start" style="background-color: black; margin-top: 50%;">
    <div class="container d-flex justify-content-center py-5">
    </div>
    <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2); " style="bottom:0;">
    <div class="contactos"></div>
            <h3> CONTACTOS:</h3>
          <ul>
            <li>Miviaje@gmail.com</li>
            <li> @Miviaje</li>  
            <li> +03416154567</li>  
            <li>?? 2020 Copyright</li>
          </ul>
    </div>
  </footer>

</body>   
<html>