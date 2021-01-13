<?php
$directorio = "C:/xampp/htdocs/PHP_Instituto/Notas/Php";
$listado = obtenerListadoDeArchivos($directorio);
echo "<h3>$directorio</h3>";
echo "<table>";
    echo "<thead><tr><th>Nombre</th><th>Tamaño</th><th>Ultima modificacion</th></tr></thead>";
    echo "<tbody>";
foreach ($listado as $fichero)
{
    echo "<tr>";
    echo "<td>".$fichero['name']."</td>";
    echo "<td>".$fichero['size']."</td>";
    echo "<td>".date("d/m/Y - H:m a", $fichero['lastMod'])."</td>";
    echo "</tr>";
}
    echo "</tbody>";
echo "</table>";
function obtenerListadoDeArchivos($directorio)
{
    // Array en el que obtendremos los resultados
    $res = [];

    // Agregamos la barra invertida al final de la ruta en caso de que no exista
    if (substr($directorio, -1) != "/") $directorio .= "/";

    // Creamos un puntero al directorio y obtenemos el listado de archivos
    $dir = @dir($directorio) or die("Error accediendo al directorio $directorio");
    while (($archivo = $dir->read()) !== false)
    {
        // Obviamos los archivos ocultos y directorios
        if ($archivo[0] == "." || is_dir($directorio . $archivo)) continue;
        if (is_readable($directorio . $archivo))
        { //si el archivo es legible
            $res[] = ["name" => $archivo, "size" => filesize($directorio . $archivo) , "lastMod" => filemtime($directorio . $archivo) ];
        }
    }
    $dir->close();
    return $res;
} 
?>
