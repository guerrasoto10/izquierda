<?php
include "database.php";

$datos = $con->query("SELECT Factura, Cliente, Fecha, RIF_Cliente, Cod_Cliente, GROUP_CONCAT(Descripcion SEPARATOR '<br>') AS Descripcion, sum(Base) as Base, sum(Importe) as Importe, sum(Costo) as Costo, COUNT(Factura) as Numero 
FROM person  
where Factura<>'' and Fecha<>''
GROUP BY Factura, Cliente, Fecha, RIF_Cliente, Cod_Cliente");
//$borrado = $con->query("delete from person where 1"); 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>



  <body>

    <nav>
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="sass.html">Importar Facturas</a></li>
          <li><a href="badges.html">Consultar Izq</a></li>
        </ul>
      </div>
    </nav>
  <!-- div para buscar excel-->
    <form action="#">
      <div class="file-field input-field">
        <div class="btn waves-effect waves-light">
          <span>Buscar Reporte</span>
          <input type="file">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div>
    </form>

    <div>
      <button class="btn waves-effect waves-light" type="submit" name="action">Importar Archivo
      </button>
    </div>     


    <ul class="sidenav" id="mobile-demo">
      <li><a href="sass.html">Importar Facturas</a></li>
      <li><a href="badges.html">Consultar Izq</a></li>
    </ul>


    <table class="responsive-table">
      <thead>
        <tr>
            <th>Izq</th>
            <th>Nombre</th>
            <th>Producto</th>
            <th>Precio</th>
        </tr>
      </thead>
      
      <tbody>
        <tr>
          <td><label><input type="checkbox"/><span></span></label></td>
          <td>Gustavo</td>
          <td class="btn-flat tooltipped" data-position="right" data-tooltip="I am a tooltip">Pintura</td>
          <td>100</td>
        </tr>

        <tr>
          <td><label><input type="checkbox"/><span></span></label></td>
          <td>Pedro</td>
          <td>Cemento</td>
          <td>200</td>
        </tr>
        <tr>
          <td><label><input type="checkbox"/><span></span></label></td>
          <td>Juan</td>
          <td>Llave</td>
          <td>300</td>
        </tr>
      </tbody>
    </table>
</br>
<!-- div para alinear el boton de Generar -->
<div style="text-align: right">
  <button class="btn waves-effect waves-light" type="submit" name="action">Generar Izq
    <i class="material-icons right">send</i>
  </button>
</div>     
        <!-- Compiled and minified JavaScript -->
        <script src="js/materialize.js"></script>
    </body>

</html>