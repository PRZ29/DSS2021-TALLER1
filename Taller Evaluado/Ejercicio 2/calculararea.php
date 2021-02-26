<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Calcular Area</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--Script de jquery para mostrar div en base a opcion seleccionada-->
    <script>
        $(document).ready(function() {
            $(".div_content").hide();
            $("#DivContent:first").show();
            $("#select").change(function() {
                $('.div_content').hide();
                $('#' + $(this).val()).show();
            });
        });
    </script>
</head>

<body>
    <div class="select-style">
        <select id="select">
            <option hidden disabled selected value="option1"> -- Seleccionar Opción -- </option>
            <option value="option2">Calcular Área de Esfera</option>
            <option value="option3">Calcular Área de Cubo</option>
            <option value="option4">Calcular Área de Cilindro</option>
        </select>
    </div><br>

    <div id="DivContent">
        <div id="option2" class="div_content">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <p>Formula: A=4πr<sup>2</sup></p>
                <label>Valor del radio:</label><br>
                <input type="number" id="radio" name="radio" required><br><br>
                <input type="submit" value="Calcular Área">
            </form>
        </div>
        <div id="option3" class="div_content">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <p>Formula: A=6a<sup>2</sup></p>
                <label>Valor de arista:</label><br>
                <input type="number" id="arista" name="arista" required><br><br>
                <input type="submit" value="Calcular Área">
            </form>
        </div>
        <div id="option4" class="div_content">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <p>Formula: A=2πrh+2πr<sup>2</sup></p>
                <label>Valor del radio:</label><br>
                <input type="number" id="radio" name="radio" required><br><br>
                <label>Valor del altura:</label><br>
                <input type="number" id="altura" name="altura" required><br><br>
                <input type="submit" value="Calcular Área">
            </form>
        </div>
    </div><br>
    <div>
        <hr>
        <?php
        //PHP para calcular las formulas en base a los valores proporcionados por el usuario.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $radio = $_POST['radio'] ?? '';
            $arista = $_POST['arista'] ?? '';
            $altura = $_POST['altura'] ?? '';
            $area;
            if ($arista == null && $altura == null) {
                $area = 4 * pi() * pow($radio, 2);
                echo "<p>El área de la esfera es de: $area mm<sup>2</sup></p>";
            } else if ($radio == null && $altura == null) {
                $area = 6 * pow($arista, 2);
                echo "<p>El área de el cubo es de: $area mm<sup>2</sup></p>";
            } else if ($arista == null) {
                $area = 2 * pi() * $radio * $altura + 2 * pi() * pow($radio, 2);
                echo "<p>El área de el cilindro es de: $area mm<sup>2</sup></p>";
            }
        }
        ?>
        <hr>
    </div>
</body>
</html>