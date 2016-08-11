<html>
<html>
<head>
  <title>Problema</title>
</head>
<body>
    <?php
      $conexion=mysqli_connect("mysql.hostinger.com.ar","u837072465_hotel","hotelcity","u837072465_enc") or
          die("Problemas con la conexión");

      mysqli_query($conexion,"select * from 'Encuesta'")
        or die("Problemas en el select".mysqli_error($conexion));

      mysqli_close($conexion);
      if( $conexion ) {
           echo "Conexión establecida.";
      }else{
           echo "Conexión no se pudo establecer.";
           die( print_r( sqlsrv_errors(), true));
      }
      echo "Se probo todo bien!";
    ?>
    <script type="text/javascript">
        /*window.location = "index.html"*/
    </script>
</body>
</html>
