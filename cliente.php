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
$nome = "";
$cpf = "";
$cod = "";
if (isset($_GET['codedit']))
{
    // echo "<h1>Você vai editar o cliente ".$_GET['codedit']."</h1>";
    $queryEdit = "SELECT * FROM cliente where cod_cliente=".$_GET['codedit'];
     $cliente = $pdo->query($queryEdit)->fetch();
     $cod = $_GET['codedit'];
     $nome = $cliente['nome'];
     $cpf = $cliente['cpf'];
}
// comoando para incluir campo deleted na tabela cliente


// codigo para excluir


if(isset($_POST['enviar'])) // inserir ou alterar
{// insere o cliente
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $consulta = "insert cliente (nome, cpf) values ('$nome','$cpf')";
    $resultado = $pdo->query($consulta);
    $_POST['enviar'] = null ;
    header('location: cliente.php');
}
if(isset($_POST['alterar']))
{
    // altera os dados do cliente
    $cod = $_POST['cod-cliente'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $updateSql = "update cliente set nome = '$nome', cpf='$cpf' where cod_cliente = $cod";
    $resultado = $pdo->query($updateSql);
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
                    <input type="text" name="cod-cliente" value="<?php echo $cod?>">
                </label>
            </div>
            <div>
            <label for="Nome">
                    Nome
                    <input type="text" name="nome" required value="<?php echo $nome?>">
                </label>
            </div>
            <div>
            <label for="cpf">
                    CPF
                    <input type="number" name="cpf" required value="<?php echo $cpf?>">
                </label>
            </div>
            <div>
                <!-- usamos o if ternário para trocar texto do botão -->
                <button type="submit" name="<?php echo $cod<1?'enviar':'alterar'; ?>"><?php echo $cod<1?'Enviar':'Alterar'; ?></button>
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