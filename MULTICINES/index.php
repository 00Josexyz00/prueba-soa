<?php

//EN LA VARIABLE URL SE LEE LA VARIABLE 
   $url="http://localhost:20052/UCMARVEL01/webresources/Pelicula";


//VARIABLE PARA LEER EL ARCHIVO
 $miVar=file_get_contents($url);


//echo $miVar;
//VARIABLE PARA DECODIFICAR EL JSON Y PARA SER LEIDO POR PHP
$decodjson = json_decode($miVar);


echo "Informacion JSON desde la url";
echo "<br>";



foreach ($decodjson as $p) 
	{
    echo "Titulo: ".$titulo = $p->titulo;
    echo "<br>";

    echo "Genero: ".$genero = $p->genero;
    echo "<br>";

    echo "Idioma: ".$idioma = $p->idioma;
    echo "<br>";

    echo "duración: ".$duracion = $p->duracion;
    echo "<br>";

    echo "Calificación: ".$calificacion = $p->calificacion;
	echo "<br>";
	
	echo "Resumen: ".$resumen = $p->resumen;
    echo "<br>";

    echo "Año de Producción: ".$aniop = $p->aniop;
	echo "<br>";
	
	echo "Formato: ".$formato = $p->formato;
	echo "<br>";
	
	echo "Director: ".$director = $p->director;
	echo "<br>";
	
	echo "Clasificación: ".$clasificacion = $p->clasificacion;
    echo "<br>";


    /*echo "DIRECCIONES: ";
	echo "<br>";
	$cont="";
    foreach ($p->direccion as $d) 
	{
        echo $d."--- ";
        
		$cont=$cont." ".$d;
	}*/

        $con = mysqli_connect("mysql-josecortez.alwaysdata.net", "211844", "uhPB8Cby!DGA4!e") or die("Sin conexion");
        
        mysqli_set_charset($con, "utf8");

        mysqli_select_db($con, "josecortez_multicines");
		
        $consulta  = "INSERT INTO pelicula (titulo, genero, idioma, duracion, calificacion, resumen, aniop, formato, director, clasificacion ) VALUES 
									('$titulo', '$genero', '$idioma', '$duracion', '$calificacion','$resumen' ,'$aniop', '$formato', '$director', '$clasificacion');";
        $resultado = mysqli_query($con, $consulta);  
        echo "<br>";     
    
}
if ($resultado == true) {
    echo "<br>";
    echo "Datos guardados.";
} 
else 
{
    echo "<br>";
    echo "Error";
}

///LEER DATOS DESDE LA BASE MYSQL
echo "<br>";
echo "<br>";
echo "Datos desde la base MYSQL";

$sql = "select * from pelicula";


$rs  = mysqli_query($con, $sql);



while ($row1 = mysqli_fetch_object($rs)) 
{
    $datos[] = $row1;
}


foreach ($datos as $dat) {
    echo "<br>";
    echo  $dat->titulo;
    echo  $dat->resumen;
    echo "<br>";
}
mysqli_close($con);

?>
