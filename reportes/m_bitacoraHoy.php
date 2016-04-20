<?php
require("../conexion/conexion.php");
?>
      <table class="table table-hover text-center">
        <tr>
          <th>#</th>
          <th>Usuario</th>
          <th>Fecha</th>
          <th>Actividad</th>
          <th>Modulo</th>
          <th>IP</th>
        </tr>
        <?php
        $sql = "SELECT USER_NICK,BITACORA_FECHA, BITACORA_ACTIVIDAD, BITACORA_TABLA, BITACORA_IP FROM bitacora WHERE BITACORA_FECHA LIKE '".date("Y-m-d")."%' ORDER BY BITACORA_FECHA ASC";
        $result = $conn->query($sql);
        $num=1;
        if ($result->num_rows > 0) {
          # code...
          while ($row = $result->fetch_assoc()) {
            # code...
            ?>
            <tr>
              <td><?php echo $num;?></td>
              <td><?php echo $row["USER_NICK"];?></td>
              <td><?php echo $row["BITACORA_FECHA"];?></td>
              <td><?php echo $row["BITACORA_ACTIVIDAD"];?></td>
              <td><?php echo $row["BITACORA_TABLA"];?></td>
              <td><?php echo $row["BITACORA_IP"];?></td>
            </tr>
            <?php
            $num++;
          }
        }else{
          echo "<td colspan='6'>Oops, No hay actividad que mostrar</td>";
        }
        ?>
      </table>
<?php
$conn->close();
?>