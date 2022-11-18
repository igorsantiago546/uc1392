<?php 
include 'conecta.php';

//cria a consulta sql
$consultaSql= "SELECT * FROM funcionario WHERE demissao IS NULL";

// trazer a lista completa dos dados
$lista = $pdo->query($consultaSql);

// separar os dados em linh

$row = $lista->fetch();
$num_rows = $lista->rowCount();


if(isset($_POST['enviar'])) // inserir ou alterar
{
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cargo = $_POST['cargo'];
    $escala = $_POST['escala'];
    $turno = $_POST['turno'];
    $admissao = $_POST['admissao'];
    $demissao = $_POST['demissao'];
    $salario = $_POST['salario'];
    $vt = $_POST['vt'];
    $vr = $_POST['vr'];
    $va = $_POST['va'];


    $consulta = "insert funcionario (nome, cpf, cargo, escala, turno, admissao, demissao, salario, vt, vr, va) values ('$nome','$cpf','$cargo','$escala','$turno','$admissao','$demissao','$salario','$vt','$vr','$va')";
    $resultado = $pdo->query($consulta);
    $_POST['enviar'] = null ;
    header('location: funcionario.php');
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionarios (<?php echo $num_rows?>)</title>
</head>
<body>
    <section class="formulario">
        <form action="#" method="post">
            <div hidden>
                <label for="cod_funcionario">
                    Código
                    <input type="text" name="cod_funcionario">
                </label>
            </div>
            <div>
                <label for="nome">
                    Nome
                    <input type="text" name="nome">
                </label>
            </div>
            <div>
                <label for="cpf">
                    CPF
                    <input type="number" name="cpf" maxlength="11">
                </label>
            </div>
            <div>
                <label for="cargo">
                    Cargo
                    <input type="text" name="cargo">
                </label>
            </div>
            <div>
                <label for="escala">
                    Escala
                    <input type="text" name="escala">
                </label>
            </div>
            <div>
                <label for="turno">
                    Turno
                    <input type="text" name="turno">
                </label>
            </div>
            <div>
                <label for="admissao">
                    Admissão
                    <input type="date" name="admissao">
                </label>
            </div>
            <div>
                <label for="demissao">
                    Demissão
                    <input type="date" name="demissao">
                </label>
            </div>
            <div>
                <label for="salario">
                    Salário
                    <input type="number" name="salario">
                </label>
            </div>
            <div>
                <label for="vt">
                    VT
                    <input type="number" name="vt">
                </label>
            </div>
            <div>
                <label for="vr">
                    VR
                    <input type="number" name="vr">
                </label>
            </div>
            <div>
                <label for="va">
                    VA
                    <input type="number" name="va">
                </label>
            </div>
            <div>
                <button type="submit" name="enviar">Enviar</button>
            </div>
        </form>
    </section>
    <table>
        <thead>
            <th hidden>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Cargo</th>
            <th>Escala</th>
            <th>Turno</th>
            <th>Admissão</th>
            <th>Demissão</th>
            <th>Salário</th>
            <th>VT</th>
            <th>VR</th>
            <th>VA</th>
        </thead>
        <tbody>
            <?php do {?>
                <tr>
                    <td hidden><?php echo $row['cod_func'];?></td>
                    <td><?php echo $row['nome'];?></td>
                    <td><?php echo $row['cpf'];?></td>
                    <td><?php echo $row['cargo'];?></td>
                    <td><?php echo $row['escala'];?></td>
                    <td><?php echo $row['turno'];?></td>
                    <td><?php echo $row['admissao'];?></td>
                    <td><?php echo $row['demissao'];?></td>
                    <td><?php echo $row['salario'];?></td>
                    <td><?php echo $row['vt'];?></td>
                    <td><?php echo $row['vr'];?></td>
                    <td><?php echo $row['va'];?></td>
                </tr>
            <?php } while ($row = $lista->fetch())?>
        </tbody>
    </table>
</body>
</html>