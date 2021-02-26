<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Resultado:</title>
    <link rel="stylesheet" href="css/stylesheet.css" />
</head>
<body>
    <section>
            <?php
            $porcentajePares;
            $positivos = array();
            if (isset($_POST['enviar'])) {
                if (isset($_POST['ingresados'])) {
                    //SE EJECUTAN NUESTRAS FUNCIONES UNA VEZ QUE EL USUARIO INGRESE LOS 12 VALORES
                    $porcentaje = calcularPorcentajePares($_POST['ingresados']);
                    $positivos = calcularPositivos($_POST['ingresados']);
                    //ORDENAMOS ES ARRAY DE NUMEROS POSITIVOS EN ORDER DESCENDIENTE CON RSORT
                    rsort($positivos);
                }
            }
            //IMPRESIÓN DE RESULTADOS
            echo "<h1>Resultado:</h1>";
            echo "<h4>Valores Ingresados: ";
            print_r($_POST['ingresados']);
            echo "</h4>";
            echo "<h2>a.) Porcentaje de valores pares ingresados.</h2>";
            if ($porcentaje == 0) {
                echo "<h4>Ningun valor ingresado fue par.</h4>";
            }else{
                echo "<h4>El porcentaje de número pares es de $porcentaje%.</h4>";
            }
            echo "<h2>b.) Listado de solamente los valores positivos, presentados de manera descendente.</h2>";
            if (count($positivos) == 0) {
                echo "<h4>Ningun valor ingresado fue positivo.</h4>";
            }else{
                echo "<h4>";
                print_r($positivos);
                echo "</h4>";
            }
            //FUNCION QUE REGRESA EL PORCENTAJE DE NÚMEROS PARES INGRESADOS
            function calcularPorcentajePares($numeros)
            {
                $contador = 0;
                if (is_array($numeros)) {
                    foreach ($numeros as $numero) {
                        if ($numero % 2 == 0) {
                            $contador = $contador + 1;
                        }
                    }
                }
                return ($contador / 12) * 100;
            }
            //FUNCION QUE REGRESA UN ARRAY CON LOS NÚMEROS POSITIVOS INGRESADOS
            function calcularPositivos($numeros)
            {
                $array = array();
                if (is_array($numeros)) {
                    foreach ($numeros as $numero) {
                        if ($numero > 0) {
                            array_push($array, $numero);
                        }
                    }
                }
                return ($array);
            }
            ?>
    </section>
</body>