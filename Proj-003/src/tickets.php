<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bilheteria </title>

</head>
<body>


        <?php

            date_default_timezone_set("America/Sao_Paulo");


            $quebraLinha = "</br>";
            $horaAtual = date("H:i");
            $valorIngresso = 0;


            if($horaAtual >= 10 &&
                    $horaAtual <= 12) {

                $valorIngresso = 10.0;


            }else if($horaAtual > 12 &&
                            $horaAtual <= 17) {

                $valorIngresso = 20.0;


            }else if($horaAtual > 17 &&
                            $horaAtual <= 22) {

                $valorIngresso = 30.0;


            }else if($horaAtual > 22 && 
                            $horaAtual < 24) {

                $valorIngresso = 40.0;


            }else {
                echo "Nenhum ingresso disponível para compra nesse horário!";
            }


            if($_SERVER["REQUEST_METHOD"] === "POST" && 
                    !empty($_POST['nome']) && !empty($_POST['sobrenome']) && 
                            !empty($_POST['quantidade'])) {

                    $nome = (string) htmlspecialchars($_POST['nome']);
                    $sobrenome = (string) htmlspecialchars($_POST['sobrenome']);
                    $quantidade = (int) ($_POST['quantidade']);


                // Calcula o Valor Total

                    $precoTotal = $quantidade * $valorIngresso;

            }


        ?>


    <!-- Forms Bilheteria -->

        <form method="POST">


            <div class="tickets-container">


                    <div id="title-tickets">
                        <label for="tickets-title"> <h3> Bilheteria </h3> </label>
                    </div>


                    <div id="tickets-details">


                        <label for="hora-atual">
                            <?php
                                echo "Hora Atual: $horaAtual" . $quebraLinha;
                            ?>
                        </label>

                        <label for="valor-atual">
                            <?php
                                echo "Valor Atual: R$ ", number_format($valorIngresso, 2, ",", ".") . $quebraLinha;
                            ?>
                        </label>


                        <label for="valor-ingresso">

                            <p> Valor do Ingresso </p>

                            <label for="valor-matinal">
                                <p> Matinal: R$ 10,00 </p>
                            </label>

                            <label for="valor-vespertino">
                                <p> Vespertino: R$ 20,00 </p>
                            </label>

                            <label for="valor-noturno">
                                <p> Noturno: R$ 30,00 </p>
                            </label>

                            <label for="ultima-sessao">
                                <p> Última Sessão: R$ 40,00 </p>
                            </label>

                        </label>


                    </div>


                    <div id="dados-cliente">

                        <label for="nome"> Nome </label>
                        <input type="text" name="nome" required>

                        <label for="sobrenome"> Sobrenome </label>
                        <input type="text" name="sobrenome" required>

                        <label for="quantidade"> Quantidade </label>
                        <input type="number" name="quantidade" min="1" required>

                    </div>


                    <div id="purchase-button">
                        <input type="submit" value="Comprar">
                    </div>


            </div>


            <div id="purchase-details">
                <?php
                
                    // Exibe o Resumo da Sompra

                    if(!empty($_POST)) {
                        echo "<h3>Resumo da Compra</h3>";
                        echo "<p>Nome: $nome $sobrenome </p>";
                        echo "<p>Quantidade de Bilhetes: $quantidade</p>";
                        echo "<p>Valor do Ingresso: R$ " . number_format($valorIngresso, 2, ",", ".") . "</p>";
                        echo "<p>Valor da Compra: R$ " . number_format($precoTotal, 2, ",", ".") . "</p>";
                    }

                    echo "<a href='home.html'> Voltar </a>";

                ?>
            </div>


        </form>


</body>
</html>