<?php 
    
    function obtenerDatos(){
      
        include("../bd/conexion.php");
        $id = $_SESSION['DBid_usu'];
        $sql = "SELECT u.id_usu, u.nombre_usu, u.nombre_completo,  u.correo, r.cargo, r.id_rol 
        FROM usuario as u , rol as r WHERE u.id_rol=r.id_rol AND u.estado = 1 AND id_usu='$id'";

        $result = $conn->query($sql);
        $dato = array();
        if ($result->num_rows > 0) {
            $fila = $result->fetch_assoc();
            $dato["DBid_usuV2"] = $fila["id_usu"];

            $dato["DBnom_completoV2"] = $fila["nombre_completo"];
         
            $dato["DBnom_usuV2"] = $fila["nombre_usu"];
            $dato["DBcargoV2"] = $fila["cargo"];
   
            $dato["DBcorreoV2"] = $fila["correo"];

            $dato["DBid_rolV2"] = $fila["id_rol"];

                
               

        }else {
            $dato = "No se encontraron datos";
        }
        
            // Cerrar la conexión a la base de datos
        $conn->close();
        
        return $dato;
    }


?>
