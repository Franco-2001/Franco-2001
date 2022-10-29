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
 
 <a class="navbar-brand" href="#">   
   <img src="./resources/descarga (3).png" height="50" width="50"  class="foto" style="border-radius: 50%;">
 </a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" 
 data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
 aria-expanded="false" aria-label="Toggle navigation">
 </button>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
         <a class="nav-link" href="#">Nosotros <span class="sr-only">(current)</span></a>
       </li>
         <li class="nav-item active">
         <a class="nav-link" href="">CONTACTO <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="Index.php">INICIO  <span class="sr-only">(current)</span></a>
       </li>
   </ul>
 </div>
</nav>


<table class="table table-hover" id="table" style="background-color:light-blue";>
  <thead>
    <tr>
      <th scope="col">DESTINO</th>
      <th scope="col">FECHA DE SALIDA</th>
      <th scope="col">PRECIO</th>
    </tr>
  </thead>
  <tbody>

<?php
$conn = mysqli_connect("localhost:3306", "root", "river2001", "turismo");
$com = "select * from destinos";
$result = $conn->query($com);
try{
    while($row = $result->Fetch_assoc()){
?>
   
    <tr>
      <th ><?php echo $row["nombre_ciudad"];?></th>
      <td ><?php echo $row["fecha"];?></td>
      <td ><?php echo $row["importe"];?><a href="Compra.php"><button type="button" class="btn btn-primary" style="float:right;" style="text-align:right"; >Seleccionar</button></a></td>
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

</body>
</html>