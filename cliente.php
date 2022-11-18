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

// busca cliente por código

if (isset($_GET['codedit']))
{
    echo "<h1>Você vai editar o cliente ".$_GET['codedit']."</h1>";
}

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
    <link rel="stylesheet" href="css/style.css">
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

            <th colspan="2">Ações</th> 

        </thead>

        <tbody>

            <?php do {?>

                <tr>

                    <td hidden><?php echo $row['cod_cliente'];?></td>

                    <td><?php echo $row['nome'];?></td>

                    <td><?php echo $row['cpf'];?></td>

                    <td><a href="cliente.php?codedit=<?php echo $row['cod_cliente'];?>">Editar</a></td>  
                    <td><a href="cliente.php?codarq=<?php echo $row['cod_cliente'];?>">Arquivar</a></td>

                </tr>

            <?php } while ($row = $lista->fetch())?>

        </tbody>

    </table>

</body>

</html>