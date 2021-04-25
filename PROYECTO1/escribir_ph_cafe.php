<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
<style type="text/css">
H1 { text-align: center}
html { 
  background: url(fondo5.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  
}
</style>             
</head>
<body>
<?php
echo '<H1><font color="lavenderblush"><p><b><big>Crear y leer un archivo de texto</big></b></p></font></H1>';
//crear una constante
define ("NUM_MAX_VAL", 14);

//rango de numeros
function generar($min, $max){
    $valor = mt_rand($min, $max) / 10;
    return $valor;
}

//decidimos el nombre que va a tener nuestro archivo
$nombreArchivo= "datos.txt";

//abrimos el archivo en modo escritura
$archivo=fopen($nombreArchivo, "w") 
or die("Error al abrir el nuevo archivo");
//ciclo para generar 14 valores y escribirlos en un archivo
for ($var=0; $var<NUM_MAX_VAL; $var++)
{
    $aleatorio = generar(40,130);
    if($var==NUM_MAX_VAL-1)
    {
      fwrite($archivo, $aleatorio);
    }
    else
    {
      echo $aleatorio, '<br>';
      //escribimos en el archivo los numeros aleatorios de manera directa
      fwrite($archivo, $aleatorio."\n");
    }
    
    
}

//cerramos archivo
fclose($archivo);

echo '<H1><font color="lavenderblush"><p><b><big>Leer un archivo de texto y vaciarlo en una matriz</big></b></p></font><H1>';
//abrimos el archivo
$texto=fopen("datos.txt",'r');
$arreglo = array();
//leemos archivo
while (!feof($texto))
{
  $arreglo []= fgets($texto);
}
//cerramos archivo
fclose($texto);

//exploramos  la variable $arreglo
echo '<pre>';
var_dump($arreglo);
echo '</pre>';
 
//funcion sum-> suma los elementos de un arreglo
$suma=array_sum($arreglo);
//funcion count-> contabiliza el numero de elementos de un arreglo
$numElementos = count($arreglo);
//calculando promedio
$prom = $suma/$numElementos;

echo '<font color="lavenderblush"><p><b><big>El promedio es: </p></b></big></font>';
echo $prom;

//funcion max-> devuelve el valor mas grande de un arreglo
$G=max($arreglo);

//funcion min-> devuelve el valor mas pequeño de un arreglo
$P = min($arreglo);
  
//funcion que devuelve el valor más alejado segun el problema
function masAlejado($p, $g, $m) {
  $n1 = (int)$g - (int)$m;
  $n2 = (int)$m - (int)$p;
  if ($n1 > $n2){
      return $g;
  }
  else{
      return $p;
  }
}  

//llamamos a la funcion masAlejado
$valor_alejado = masAlejado($P, $G, $prom);
//echo "<br>".$valor_alejado;
echo '<font color="lavenderblush"><p><b><big>La funcion mas alejada es: </p></b></big></font>';
echo $valor_alejado;

//funcion array_search->  devuelve la posicion de un valor a buscar
$posicion = array_search($valor_alejado,$arreglo);
echo '<font color="lavenderblush"><p><b><big>El numero se encuentra en la posicion: </p></b></big></font>';
echo $posicion;

//cambiar el valor a -1
$arreglo[$posicion] = -1;
echo '<font color="lavenderblush"><p><b><big>El numero que se ha remplazado por -1 no se incluira: </p></b></big></font>';
echo '<pre>';
echo "<br>".var_dump($arreglo);
echo '</pre>';

//funcion que devuelve el nuevo promedio segun proyecto
function nuevoPromedio($arr)
{
  //inicializacion de la variable
  $sum = 0;

  //recorremos el arreglo 
  foreach ($arr as $valor) 
  {
      if ($valor != -1)
      {
          $sum += (int)$valor;
      }
  }
  //calculamos promedio nuevo sin tomar en cuenta una posicion
  $prom = $sum / (count($arr) - 1) ;
  return $prom;
}
$promedioN = nuevoPromedio($arreglo);
echo '<font color="lavenderblush"><p><b><big>Nuevo promedio sin contar una posicion: </p></b></big></font>';
echo $promedioN;
?>  
</body>
</html>