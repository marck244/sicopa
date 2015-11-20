<?php  


include("../conexion/conexion.php");
	

				function lotificacion()
				{
					
					
				$lotificaciones= array();
				$sql="SELECT LOTIFICACION_ID,LOTIFICACION_NOMBRE FROM lotificacion";
				$db= obtenerConexion();
				
				$result= $db->query($sql);
				
				
				while($row= $result->fetch_assoc())
				{
					
					$lotificacion= new lotificacion($row['LOTIFICACION_ID'],$row['LOTIFICACION_NOMBRE']);
					array_push($lotificaciones,$lotificacion);
				}
				
				
				return $lotificaciones;
				
				}



				function lotificaciondistintos($id_lotificacion)
			{
				$lotificaciones=array();
				$sql="SELECT LOTIFICACION_ID,LOTIFICACION_NOMBRE FROM lotificacion WHERE LOTIFICACION_ID <> '$id_lotificacion' ";
				$db=obtenerConexion();
				$result=$db->query($sql);


				while($row= $result->fetch_assoc())
				{
					
					$lotificacion= new lotificacion($row['LOTIFICACION_ID'],$row['LOTIFICACION_NOMBRE']);
					array_push($lotificaciones,$lotificacion);
				}
				
				
				return $lotificaciones;

			}
			
				 class lotificacion {
        public $id;
        public $nombre;

        function __construct($id, $nombre) {
            $this->id = $id;
            $this->nombre = $nombre;
        }
    }









    				function poligono()
				{									
				$poligonos= array();
				$sql="SELECT POLIGONO_ID,POLIGONO_NUM FROM poligono";
				$db= obtenerConexion();
				
				$result= $db->query($sql);
				
				
				while($row= $result->fetch_assoc())
				{
					
					$poligono= new poligono($row['POLIGONO_ID'],$row['POLIGONO_NUM']);
					array_push($poligonos,$poligono);
				}
				
				
				return $poligonos;
				
				}



				function poligonosdistintos($id_poligono)
			{
				$poligonos=array();
				$sql="SELECT POLIGONO_ID,POLIGONO_NUM FROM poligono WHERE POLIGONO_ID <> '$id_poligono' ";
				$db=obtenerConexion();
				$result=$db->query($sql);


				while($row= $result->fetch_assoc())
				{
					
					$poligono= new poligono($row['POLIGONO_ID'],$row['POLIGONO_NUM']);
					array_push($poligonos,$poligono);
				}
				
				
				return $poligonos;

			}
			
				 class poligono {
        public $id;
        public $nombre;

        function __construct($id, $nombre) {
            $this->id = $id;
            $this->nombre = $nombre;
        }
    }












?>