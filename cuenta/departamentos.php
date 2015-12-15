<?php
			
						
				include("../conexion/conexion.php");
	

				function departamentos()
				{
					
					
				$departamentos= array();
				$sql="SELECT DEPARTAMENTO_ID,DEPARTAMENTO_NOMBRE FROM departamento";
				$db= obtenerConexion();
				
				$result= $db->query($sql);
				
				
				while($row= $result->fetch_assoc())
				{
					
					$departamento= new departamento($row['DEPARTAMENTO_ID'],$row['DEPARTAMENTO_NOMBRE']);
					array_push($departamentos,$departamento);
				}
				
				
				return $departamentos;
				
				}

				function departamentodistintos($id_departamento)
			{
				$departamentos=array();
				$sql="SELECT DEPARTAMENTO_ID,DEPARTAMENTO_NOMBRE FROM departamento WHERE DEPARTAMENTO_ID <> '$id_departamento' ";
				$db=obtenerConexion();
				$result=$db->query($sql);


				while($row= $result->fetch_assoc())
				{
					
					$departamento= new departamento($row['DEPARTAMENTO_ID'],$row['DEPARTAMENTO_NOMBRE']);
					array_push($departamentos,$departamento);
				}
				
				
				return $departamentos;

			}
			
				 class departamento {
        public $id;
        public $nombre;

        function __construct($id, $nombre) {
            $this->id = $id;
            $this->nombre = $nombre;
        }
    }












  ?>