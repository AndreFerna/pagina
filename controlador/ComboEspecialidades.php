<?php
 include("bd.php");

 $ConsultaEsp="SELECT * FROM especialidad";

 $ResultadoEsp=False;
    try {     
    $ResultadoEsp= mysqli_query($Conexion, $ConsultaEsp); 
        }
   catch (Exception $e)
        { $Mensaje="No se pudo consultar las especialidades"; 
            //$error=$e->getMessage();
            print $e->getMessage();
            //print $Resultado;
        }
    if($ResultadoEsp == False) { $Mensaje="No se pudo consultar las especialidades"; 
                   // die($mysqli_error($Conexion));
                 }
    else { //echo $Registro["CodigoEspecialidad"];
        echo '<select name="EspecialidadEstudiante" id="EspecialidadEstudiante">';
        while($RegistroEsp=$ResultadoEsp->fetch_assoc()){
            if ($Registro["CodigoEspecialidad"]==$RegistroEsp["CodigoEspecialidad"]) {
                echo '<option value="'.$RegistroEsp["CodigoEspecialidad"].'" selected>'.$RegistroEsp["NombreEspecialidad"].'</option>'; 
            }
            else {echo '<option value="'.$RegistroEsp["CodigoEspecialidad"].'">'.$RegistroEsp["NombreEspecialidad"].'</option>';}
        }  // Fin del ciclo del listado de especialidades
        echo '</select>';
     }
 
?>