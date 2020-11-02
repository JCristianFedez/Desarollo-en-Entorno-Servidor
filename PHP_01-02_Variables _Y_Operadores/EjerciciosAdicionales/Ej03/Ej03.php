<!-- Mostrar en una página varios parametros para configurar el aspecto de otra página: color de
fondo, tipo de letra, alineación del texto, imagen del banner (entre 3 posibles), y demás reglas
de estilo que se te ocurran. Una vez la información se mostrará una página con el contenido
que desees acorde a los estilos elegidos.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ej03</title>
</head>
<body>
    <center>
        <div class="container">
                <div id="formulario">
                    <form action="Ej03-2.php" method="get">
                        <h3>Configuracion</h3>
                        
                        <fieldset>
                            <h4>Color: </h4>
                            <input type="color" name="color">
                        </fieldset>

                        <fieldset>
                            <h4>Tipografia: </h4>
                            <select name="tipografia">
                                <option value="Arial" style="font-family:'Arial';">Arial</option>
                                <option value="sans-serif" style="font-family:'sans-serif';">sans-serif</option>
                                <option value="Lucida Sans" style="font-family:'Lucida Sans';">Lucida Sans</option>
                                <option value="Verdana" style="font-family:'Verdana';">Verdana</option>
                            </select>
                        </fieldset>

                        <fieldset>
                            <h4>Alineacion del texto: </h4>
                            <select name="alineacion">
                                <option value="center" style="text-align: center;">Centrado</option>
                                <option value="left" style="text-align: left;">Izquierda</option>
                                <option value="right" style="text-align: right;">Derecha</option>
                            </select>
                        </fieldset>

                        <fieldset>
                            <h4>Imagen de Baner</h4>
                            <br>
                            <label for="img1"><input type="radio" name="baner" id="img1" checked value="https://picsum.photos/id/237/1000/100"><img src="https://picsum.photos/id/237/100/100" class="iconoBanner" alt=""></label>
                            <label for="img2"><input type="radio" name="baner" id="img2" value="https://picsum.photos/id/23/1000/100"><img src="https://picsum.photos/id/23/100/100" class="iconoBanner" alt=""></label>
                            <label for="img3"><input type="radio" name="baner" id="img3" value="https://picsum.photos/id/2/1000/100"><img src="https://picsum.photos/id/2/100/100" class="iconoBanner" alt=""></label>
                            
                        </fieldset>

                        <fieldset>
                            <input type="hidden" name="config" value="configurado">
                        </fieldset>
                
                        <fieldset>
                            <input name="submit" type="submit" value="Comprobar">
                        </fieldset>
                        
                    </form>
                </div>
          
        </div>
    </center>
</body>
</html>