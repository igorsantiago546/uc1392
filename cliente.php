<?php

include 'conecta.php';

// criando consulta SQL

$consultaSql = "SELECT * FROM cliente order by nome, cpf asc";



// buscando e listando os dados da tabela (completa)

$lista = $pdo->query($consultaSql);



// separar em linhas

$row = $lista->fetch();



// retornando o númaru de linhas

$num_rows = $lista->rowCount();

if(isset($_POST['enviar'])) // inserir ou alterar
{
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];


    $consulta = "insert cliente (nome, cpf) values ('$nome','$cpf')";
    $resultado = $pdo->query($consulta);
    $_POST['enviar'] = null ;

    header('location: cliente.php');
}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rell="stylesheet" href="css/style.css">
    <title>Clientes (<?php echo $num_rows?>)</title>

    <style>

        td{

            border-bottom: 1px solid red;

        }

    </style>

</head>

<body>
    <section class="formulario">
        <form action="#" method="post">
            <div hidden>
                <label for="cod-cliente">
                    Código
                    <input type="text" name="cod-cliente">
                </label>
            </div>
            <div>
            <label for="Nome">
                    Nome
                    <input type="text" name="nome" required>
                </label>
            </div>
            <div>
            <label for="cpf">
                    CPF
                    <input type="number" name="cpf" required>
                </label>
            </div>
            <div>
                <button type="submit" name="enviar">Enviar</button>
            </div>
        </form>
    </section>
    <table>

        <thead>

            <th hidden>Cod</th>

            <th>Nome</th>

            <th>CPF</th>

        </thead>

        <tbody>

            <?php do {?>

                <tr>

                    <td hidden><?php echo $row['cod_cliente'];?></td>

                    <td><?php echo $row['nome'];?></td>

                    <td><?php echo $row['cpf'];?></td>

                </tr>

            <?php } while ($row = $lista->fetch())?>

        </tbody>

    </table>

</body>

</html>