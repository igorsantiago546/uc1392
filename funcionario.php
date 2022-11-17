<?php 
include 'conecta.php';

//cria a consulta sql
$consulta= "select * from funcionario where demissao is null";

// trazer a lista completa dos dados
$lista = $pdo->query($consulta);

// separar os dados em linhas 

$linha = $lista->fetch();
$num_linhas = $lista->rowCount();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionarios</title>
</head>
<body>
    <table>
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Cargo</th>
            <th>Escala</th>
            <th>Turno</th>
            <th>Admissão</th>
            <th>Salario</th>
            <th>VT</th>
            <th>VR</th>
            <th>VA</th>
        </thead>
        <tbody>
            <?php do {?>
                <tr>
                    <td><?php echo $linha['cod_func'];?></td>
                    <td><?php echo $linha['nome'];?></td>
                    <td><?php echo $linha['cpf'];?></td>
                    <td><?php echo $linha['cargo'];?></td>
                    <td><?php echo $linha['escala'];?></td>
                    <td><?php echo $linha['turno'];?></td>
                    <td><?php echo $linha['admissao'];?></td>
                    <td><?php echo $linha['salario'];?></td>
                    <td><?php echo $linha['vt'];?></td>
                    <td><?php echo $linha['vr'];?></td>
                    <td><?php echo $linha['va'];?></td>
                </tr>
            <?php }while($linha = $lista->fetch());?>
        </tbody>
    </table>
</body>
</html>