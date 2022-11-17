<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mi viaje</title>
    <link href="./styles/style.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 
 <a class="navbar-brand" href="inicio.php">   
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
         <a class="nav-link" href="login.php">INICIAR SESION  <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="inicio.php">INICIO  <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item active">
              <a class="nav-link" href="Registrarse.php">REGISTRARSE  <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item active">
              <a class="nav-link" href="Reporte.php" target="_blank">MIS COMPRAS  <span class="sr-only">(current)</span></a>
       <li>
   </ul>
 </div>
</nav>


<table class="table table-hover" id="table" style="background-color:light-blue";>
  <thead>
    <tr>
      <th scope="col">ID-DESTINO</th>
      <th scope="col">DESTINO</th>
      <th scope="col">FECHA DE SALIDA</th>
      <th scope="col">PRECIO</th>
      <th scope="col">ACCIONES</th>

    </tr>
  </thead>
  <tbody>
<?php
$destino= $_POST["destino"];
$fecha_salida=$_POST["fecha-salida"];
?>


<?php
$conn = mysqli_connect("localhost:3306", "root", "river2001", "turismo");
$com = "select * from destinos where nombre_ciudad like '%".$destino."%' and fecha_salida like '%".$fecha_salida."%' ";
$result = $conn->query($com);

try{
    while($row = $result->Fetch_assoc()){
?>
   
<tr>
      <th ><?php echo $row["id"];?></th>
      <th ><?php echo $row["nombre_ciudad"];?></th>
      <td ><?php echo $row["fecha_salida"];?></td>
      <td ><?php echo $row["importe"];?>
      <td >
      <form action="Compra.php" method="POST">
         <input type="hidden"  name="id-destino" id="destino-id" value="<?php echo $row["id"];?>">
         <input type="hidden"  name="nombre-ciudad" id="ciudad-id" value="<?php echo $row["nombre_ciudad"];?>">
         <input type="hidden"  name="fecha" id="fecha" value="<?php echo $row["fecha_salida"];?>">
         <input type="hidden"  name="importe" id="importe" value="<?php echo $row["importe"];?>">
         <input type="submit" class="btn btn-primary" name="boton" id="boton" value="seleccionar">
      </form>
      <!----------------------------delete----------------------------------->
     <form action="delete.php" method="POST">
     <input type="hidden"  name="id-destino" id="destino-id" value="<?php echo $row["id"];?>">
     <input  type="submit" class="btn btn-danger ml-2 name"  boton id="boton" value="eliminar">
     </form>
     <!----------------------------update----------------------------------->
     <form action="actualizar.php" method="POST">
         <input type="hidden"  name="id-destino" id="destino-id" value="<?php echo $row["id"];?>">
         <input type="hidden"  name="nombre-ciudad" id="ciudad-id" value="<?php echo $row["nombre_ciudad"];?>">
         <input type="hidden"  name="fecha" id="fecha" value="<?php echo $row["fecha_salida"];?>">
         <input type="hidden"  name="importe" id="importe" value="<?php echo $row["importe"];?>">
         <input type="submit" class="btn btn-info" name="boton" id="boton" value="actualizar">
      </form>
    </td>
</tr>
    
<?php
    }
}
catch(PDOException $e){
    echo "Hubo un problema en la conexión: " . $e->getMessage();
}
?>
</tbody>
</table>
<a href="agregar.php"> <button type="submit" class="btn btn-success ml-2" style="float:right;">AGREGAR NUEVO DESTINO </button></a>

 <!------footer---->
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
            <li>© 2020 Copyright</li>
          </ul>
    </div>
  </footer>
</body>
</html>