<!DOCTYPE html>
<html lang="en">

<?php
if( isset($_POST['importe'])){

  $fecha=$_POST["fecha"];
  $importe=$_POST["importe"];
  $id_destino=$_POST["id-destino"];
  $nombre_ciudad=$_POST["nombre-ciudad"];
}
?>


<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Mi Viaje</title>
    <link href="./styles/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript">
    //alert("PARA CONFIRMAR LA COMPRA DEBE ESTAR REGISTRADO");
    </script> 
</head> 

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <a class="navbar-brand" href="inicio.php">   <img src="./resources/descarga (3).png" height="50" width="50"  class="foto" style="border-radius: 50%;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
<header>                                                     
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
<form action="compra.php" method="POST">
  <div class="form-row">
  </div>
    <div class="form-group col-md-4">
      <label for="inputDni">Dni </label>
      <input type="number" name="dni" class="form-control" id="inputDni" placeholder="Dni">
    </div>
  </div>
  <div class="form-group col-md-4 ">
    <label for="inputDestino">Destino</label>
    <input type="text" name="destino"  value="<?php echo $nombre_ciudad;?>" class="form-control" id="inputDestino" >
  </div>
  <div class="form-row">
  <div class="form-group col-md-2">
      <label for="text">Fecha</label>
      <input type="text" name="fecha" class="form-control" value="<?php echo $fecha;?>" id="inputfecha"  >
   </div>
   <div class="form-group col-md-2">
      <label for="number">Forma de pago</label>
      <input type="number" name="forma_pago" id="inputformapago" class="form-control" placeholder="Forma de pago">
      </div>
   <div class="form-group col-md-2">
      <label for="text">ID-DESTINO</label>
      <input type="number" name="id" id="id-destino" class="form-control" value="<?php echo $id_destino;?>">
    </div>
   <div class="form-group col-md-2">
      <label for="text">IMPORTE</label>
      <input type="number" name="Importe" id="inputImporte" class="form-control" value="<?php echo $importe;?>">
      <input type="submit"   class="btn btn-primary" value="CONFIRMAR" onclick="miFunc()"></a>
 </div>
  <div>

  <script>
  function miFunc() {
    alert('COMPRA REALIZADA EXITOSAMENTE');
    window.open("inicio.php");
   
  }
</script>
</form>

                               
                                  <!--------INSERT-------->
<div> 
    <?php
    $conn = new mysqli("localhost:3306", "root", "river2001", "turismo");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
      
    if(isset($_POST ['dni'])){
        $dni=$_POST['dni'];
        $fecha=$_POST['fecha'];
        $forma_pago=$_POST['forma_pago'];
        $id_destino=$_POST['id'];

        
        $sql="INSERT INTO ventas( `dni`, `destino`, `fecha`, `forma_pago`) 
        VALUES ('". $dni ."','". $id_destino ."','". $fecha ."','". $forma_pago ."')";
        if ($conn->query($sql) === TRUE) {
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
   ?> 
</div>    

</body>
</html>