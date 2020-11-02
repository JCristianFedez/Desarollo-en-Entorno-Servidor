<!--
    Escribe un programa que muestre tu horario de clase mediante una tabla. Aunque se puede hacer
    íntegramente en HTML (igual que los ejercicios anteriores), ve intercalando código HTML y PHP
    para familiarizarte con éste último.

-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej04</title>
    <style>table,td,tr,th{border:1px black solid; border-collapse:collapse; padding:0.5em;}</style>
</head>
<body>
    <center>
    <table >
    <?php 
    echo "<tr><th></th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th></tr>";
    echo "<tr><th>16-17</th><td>DWEC</td><td>DWEC</td><td>EIE</td><td>DWES</td><td>LC</td></tr>";
    echo "<tr><th>17-18</th><td>DWEC</td><td>DWEC</td><td>EIE</td><td>DWES</td><td>LC</td></tr>";
    echo "<tr><th>18-19</th><td>DWEC</td><td>DWEC</td><td>DIW</td><td>DIW</td><td>LC</td></tr>";
    echo "<tr><th>20-21</th><td>DWES</td><td>DIW</td><td>DIW</td><td>DIW</td><td>DAW</td></tr>";
    echo "<tr><th>19-20</th><td>DWES</td><td>DIW</td><td>DWES</td><td>DWEC</td><td>DAW</td></tr>";
    echo "<tr><th>21-22</th><td>DWES</td><td>DIW</td><td>DWES</td><td>DWEC</td><td>DAW</td></tr>";

    ?>
    </table>
    </center>
</body>
</html>