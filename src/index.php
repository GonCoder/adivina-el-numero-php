<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #e0e0e0;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #26a69a;
            text-align: center;
        }

        a {
            color: #26a69a;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        button,
        input[type="submit"] {
            background-color: #26a69a;
            color: #1a1a1a;
            border: none;
            padding: 0.5em 1em;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover,
        input[type="submit"]:hover {
            background-color: #009688;
        }

        input,
        select,
        textarea {
            background-color: #232323;
            color: #e0e0e0;
            border: 1px solid #26a69a;
            border-radius: 4px;
            padding: 0.5em;
            margin-bottom: 1em;
            text-align: center;
        }

        ::selection {
            background: #26a69a;
            color: #1a1a1a;
        }

        .dice-images {
            margin: 20px 0;
            text-align: center;
        }

        .dice-images img {
            width: 64px;
            height: 64px;
            margin: 0 10px;
            vertical-align: middle;
        }
        .chivato {
            color: #1a1a1a;
            font-weight: bold;
        }
    </style>
    <div class="dice-images">
        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/Alea_1.png" alt="Dado 1">
        <img src="https://upload.wikimedia.org/wikipedia/commons/8/8d/Alea_4.png" alt="Dado 6">
    </div>
</head>

<body>
    <h1>Adivina el número</h1>
    <?php

    $muestraFormulario = true;
    if (!isset($_POST["numeroIntroducido"])) {
        $numeroMisterioso = rand(1, 100);
        echo '<p class="chivato">El numero es: ' . $numeroMisterioso . '</p>';
        $numeroOportunidades = 5;
    } else {
        $numeroIntroducido = $_POST["numeroIntroducido"];
        $numeroMisterioso = $_POST["numeroMisterioso"];
        $numeroOportunidades = $_POST["numeroOportunidades"];
        $numeroOportunidades--;
        if ($numeroIntroducido == $numeroMisterioso) {
            echo "<h2>Has acertado el número</h2>";
            $muestraFormulario = false;

        }
        if (($numeroOportunidades == 0) && ($numeroIntroducido != $numeroMisterioso)) {
            echo "<h2>Has perdido, el número era: " . $numeroMisterioso . "</h2>";
            $muestraFormulario = false;
        }

        if (($numeroIntroducido < $numeroMisterioso) && ($numeroOportunidades > 0)) {
            echo "<h2>El número es mayor que $numeroIntroducido</h2>";
            echo "<h2>Te quedan $numeroOportunidades oportunidades.</h2>";
        }
        if (($numeroIntroducido > $numeroMisterioso) && ($numeroOportunidades > 0)) {
            echo "<h2>El número es menor</h2>";
            echo "<h2>Te quedan $numeroOportunidades oportunidades.</h2>";

        }
    }
    ?>

    <?php
    if ($muestraFormulario) { ?>
        <form action="index.php" method="post">
            <label for="numeroIntroducido">Introduce un número: </label>
            <input type="number" name="numeroIntroducido" id="numeroIntroducido" min="1" max="100" required autofocus>
            <input type="hidden" name="numeroMisterioso" value="<?php echo $numeroMisterioso; ?>">
            <input type="hidden" name="numeroOportunidades" value="<?php echo $numeroOportunidades; ?>">
            
            <button type="submit">🙈</button>
        </form>
    <?php } else { ?>
        <a href="index.php">Jugar de nuevo</a>
        <?php
    } ?>
</body>

</html>