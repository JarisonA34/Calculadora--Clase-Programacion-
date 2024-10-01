<?php
    include_once("php/cabeza.php");
?>

<div class="border border-primary  p-4 m-4">
    <header class="">
        <h1>Calculadora</h1>
        <br>
    </header>
    <form method= "POST" action="" autocomplete="off" class="d-flex flex-column justify-content-around">
        <label>Ingrese su primer número:</label>
        <input type="number" name="num1" id="num1">
        <br>
        <br>
    
        <label>Ingrese su segundo número:</label>
        <input type="number" name="num2" id="num2">
        <br>
        <br>

        <select class="" name="operadores">
            <option value="+">Suma</option>
            <option value="-">Resta</option>
            <option value="*">Multiplicación</option>
            <option value="/">Division</option>
        </select>
        <br>
        <br>
        <botones class="d-flex justify-content-center align-items-center gap-3">
            <button type="submit" class="btn btn-success">Calcular</button>
            <button type="reset" class="btn btn-secondary">Reiniciar</button>
        </botones>
        <br>
    </form>
</div>
<div>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operadores = $_POST["operadores"];
        
        if($num1 == "" || $num2 == ""){
            echo("<div class='alert alert-danger'>
                     Por favor ingrese los numeros.
                </div>");
            return;
        }
        switch ($operadores){
            case '+':
                $resultado = sumar($num1, $num2);
                echo("<div class='alert alert-success'>
                    El resultado es: <strong>$resultado</strong>
                    </div>");                
                break;
            case '-':
                $resultado = restar($num1, $num2);
                echo("<div class='alert alert-success'>
                    El resultado es: <strong>$resultado</strong>
                    </div>");                
                break;
            case '*':
                $resultado = multiplicar($num1, $num2);
                echo("<div class='alert alert-success'>
                    El resultado es: <strong>$resultado</strong>
                    </div>");                
                break;
            case '/':
                if ($num2 == 0) {
                    echo("<div class='alert alert-danger'>
                        Error: División por cero.
                    </div>");
                } else {
                    $resultado = dividir($num1, $num2);
                    echo("<div class='alert alert-success'>
                        El resultado es: <strong>$resultado</strong>
                    </div>");
                }
                break;
                
            default:
            echo("<div class='alert alert-danger'>
                    Error de operador.
                </div>");           
                break;
        }
    }
    ?>
</div>
<?php
    include_once("php/pie.php")
?>