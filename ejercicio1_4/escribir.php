<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//decidimos el nombre que va a tener nuestro archivo
$nombreArchivo= "leyendo.txt";

//abrimos el archivo en modo escritura
$archivo=fopen($nombreArchivo, "w") 
or die("Error al abrir el nuevo archivo");

//escribimos en el archivo un texto cualquiera de manera directa
fwrite($archivo, "probando, probando, si, 1, 2, 3\n");

//cerramos archivo
fclose($archivo);

//de manera opcional leemos el contenido del archivo
$texto=readfile($nombreArchivo);
echo "<div> $texto </div>";

?>
    
</body>
</html>