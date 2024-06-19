<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href= "style/style.css">
    <title>Document</title>
</head>
<body>

<div class= "container">

<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

    <h1>Calculator</h1>

    <input type="number" name="num01" palceholder="Number one">

    <select name="operator">
        <option value="add">+</option>
        <option value="subtract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>

    <input type="number" name="num02" palceholder="Number two">

    <button>Calculate</button>
</form>
</div>

    <?php 
   if($_SERVER["REQUEST_METHOD"] == "POST" )
   {
        $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);

        $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);

        $operator = htmlspecialchars($_POST["operator"]);


        $errors  = false;

        if(empty($num01)  || empty($num02) || empty($operator))
        {
            echo "<p class= 'calc-error'>Te guram sa completezi toate campurile </p>";
            $errors = true;
        }

        if(!is_numeric($num01) || !is_numeric($num02))
        {
            echo "<p class= 'calc-error'>Te rugam sa introduci doar numere / cifre</p>";
            $errors = true;
        }


        if(!$errors)
        {
            $value = 0;

            switch($operator)
            {
                case "add":
                    $value = $num01 + $num02;
                    break;

                case "subtract":
                    $value = $num01 - $num02;
                    break;

                case "multiply":
                    $value = $num01 * $num02;
                    break;

                case "divide":
                    $value = $num01 / $num02;
                    break;

                default:
                    echo "<p class= 'calc-error'>A aparut o eroare</p>";
            }

            echo "<p class = 'calc-result'> Rezultatul este <br>". $value . "</p>";
        }

   }



    ?>
</body>
</html>