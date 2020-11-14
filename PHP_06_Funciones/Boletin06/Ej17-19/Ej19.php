<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambios de Bases</title>
</head>

<body>
    <h1>Cambios de Bases</h1>
    <?php
    include_once "cambiarBaseNum.php";
    ?>
    <form action="#" method="post">
        <label for="num">Numero
            <input type="text" name="num" id="num" required>
        </label>
        <br>
        <select name="option">
            <option value="b:o">Binario a Octal</option>
            <option value="b:d">Binario a Decimal</option>
            <option value="b:h">Binario a Hexadecimal</option>
            <option value="o:b">Octal a Binario</option>
            <option value="o:d">Octal a Decimal</option>
            <option value="o:h">Octal a Hexadecimal</option>
            <option value="d:b">Decimal a Binario</option>
            <option value="d:o">Decimal a Octal</option>
            <option value="d:h">Decimal a Hexadecimal</option>
            <option value="h:b">Hexadecimal a Binario</option>
            <option value="h:o">Hexadecimal a Octal</option>
            <option value="h:d">Hexadecimal a Decimal</option>
        </select>
        <input type="submit" value="Transformar">
    </form>
    <br>
    <?php 
    if(isset($_REQUEST["num"])){
        $num=$_REQUEST["num"];
        $option=$_REQUEST["option"];
        switch ($option) {
            case 'b:o':
                $result=binaryToOctal($num);
                $b1=2;
                $b2=8;
                break;
            case 'b:d':
                $result=binaryToDecimal($num);
                $b1=2;
                $b2=10;
                break;
            case 'b:h':
                $result=binaryToHex($num);
                $b1=2;
                $b2=16;
                break;  
            case 'o:b':
                $result=octalToBinary($num);
                $b1=8;
                $b2=2;
                break;
            case 'o:d':
                $result=octalToDecimal($num);
                $b1=8;
                $b2=10;
                break; 
            case 'o:h':
                $result=octalToHex($num);
                $b1=8;
                $b2=16;
                break; 
            case 'd:b':
                $result=decimalToBinary($num);
                $b1=10;
                $b2=2;
                break; 
            case 'd:o':
                $result=decimalToOctal($num);
                $b1=10;
                $b2=8;
                break; 
            case 'd:h':
                $result=decimalToHex($num);
                $b1=10;
                $b2=16;
                break; 
            case 'h:b':
                $result=hexToBinary($num);
                $b1=16;
                $b2=2;
                break; 
            case 'h:o':
                $result=hexToOctal($num);
                $b1=16;
                $b2=8;
                break; 
            case 'h:d':
                $result=hexToDecimal($num);
                $b1=16;
                $b2=10;
                break;  
        }
        echo "$num<sub>$b1</sub> = $result<sub>$b2</sub>";
    }
    ?>
</body>

</html>