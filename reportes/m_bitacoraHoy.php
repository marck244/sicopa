<?php
require("../conexion/conexion.php");
?>
      <table class="table table-hover text-center">
        <tr>
          <th>#</th>
          <th>Usuario</th>
          <th>Fecha</th>
          <th>Actividad</th>
          <th>Tabla</th>
          <th>IP</th>
        </tr>
        <tr>
          <td>1</td>
          <td>Marisol Menjivar</td>
          <td>2015/11/10 10:27:05 PM</td>
          <td>Nuevo cliente Jorge Alberto</td>
          <td>Cliente</td>
          <td>192.168.0.14</td>
        </tr>
      </table>

<?php
$conn->close();
?>