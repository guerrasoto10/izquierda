<?php
include "database.php";

$datos = $con->query("SELECT Factura, Cliente, Fecha, RIF_Cliente, Cod_Cliente, COUNT(Descripcion) AS Descripcion, sum(Base) as Base, sum(Importe) as Importe, sum(Costo) as Costo, COUNT(Factura) as Numero 
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


    <?php if($datos->num_rows>0):?>
	<h3>Datos</h3>
    <p>Facturas Encontradas: <?php echo $datos->num_rows; ?></p>
    
    <table class="responsive-table">
      <thead>
        <tr>
    <th>Izq</th>
		<th>Factura</th>
		<th>Fecha</th>
		<th>Cliente</th>
		<th>RIF Cliente</th>
		<th>Cod. Cliente</th>
		<th>Cant. Prod</th>
		<th>Base</th>
		<th>Importe</th>
		<th>Costo</th>
        </tr>
      </thead>
      
      <tbody>
      <?php while($d= $datos->fetch_object()):?>
      <tr>
      <td><label><input type="checkbox"/><span></span></label></td>
		<td><?php echo $d->Factura; ?></td>
		<td><?php echo $d->Fecha; ?></td>
		<td><?php echo $d->Cliente; ?></td>
		<td><?php echo $d->RIF_Cliente; ?></td>
		<td><?php echo $d->Cod_Cliente; ?></td>
		<td style="margin-top: 13px" class="btn tooltipped" data-position="right" data-tooltip="I am a tooltip"><?php echo $d->Descripcion; ?></td>
    <td><?php echo $d->Base; ?></td>
		<td><?php echo $d->Importe; ?></td>
		<td><?php echo $d->Costo; ?></td>
		</tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php else:?>
	<h3>No hay Datos</h3>
<?php endif; ?>

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