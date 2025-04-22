<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nota de Estudante </title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>


    <!-- Forms Boletim -->

        <form method="POST">


            <div class="boletim-container">


                <div id="titulo-boletim">
                    <label for="user-login"> <h3> Boletim Escolar </h3> </label>
                </div>


                <div id="nome-aluno">
                    <label for="nome-aluno"> Nome </label>
                    <input type="text" name="nome-aluno" placeholder="Nome do Aluno" required>
                </div>


                <div id="sobrenome">
                    <label for="sobrenome-aluno"> Sobrenome </label>
                    <input type="text" name="sobrenome-aluno" placeholder="Sobrenome" required>
                </div>


                <div id="nota-aluno">
                    <label for="nota-aluno"> Nota </label>
                    <input type="number" name="nota-aluno" placeholder="Insira a Nota do Aluno" required>
                </div>


                <div id="submit-button">
                    <input type="submit" value="Enviar" ></button>
                </div>


            </div>


            <div id="dados-aluno">
                <?php

                    $quebraLinha = "</br>";

                        if($_SERVER["REQUEST_METHOD"] === "POST") {

                            $notaAluno = (int) $_POST['nota-aluno'];
                            $nomeAluno = (string) htmlspecialchars($_POST['nome-aluno']);
                            $sobrenome = (string) htmlspecialchars($_POST['sobrenome-aluno']);

                                echo "<h3> Dados do Aluno </h3>";
                                echo "<p> Nome do Aluno: $nomeAluno $sobrenome </p>";


                                if($notaAluno >= 0 && $notaAluno <= 10) {

                                    echo "<p> Nota do Aluno: $notaAluno </p>";

                                    if($notaAluno >= 0 && $notaAluno < 5) {
                                        echo "<p> Reprovado(a)! </p>";

                                    }else if($notaAluno >= 5 && $notaAluno < 7) {
                                        echo "<p> Está de Recuperação! </p>";

                                    }else if($notaAluno >= 7 && $notaAluno <= 10) {
                                        echo "<p> Aprovado(a)! </p>";

                                    }

                                }else {
    
                                    echo "<p> Insira uma nota válida </p>";
                                    echo "<p> Nota Mínima: 0.0 </p>";
                                    echo "<p> Nota Máxima: 10.0 </p>";

                                }

                        }
 
                        echo "<a href='home.html'> Voltar </a>";

                ?>
            </div>


        </form>


</body>
</html>