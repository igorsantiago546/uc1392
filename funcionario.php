<?php 
include 'conecta.php';

//cria a consulta sql
$consultaSql= "SELECT * FROM funcionario where demissao is not null";
$consultaArqSql= "SELECT * FROM funcionario where demissao is not null order by nome, cod_func asc";

// trazer a lista completa dos dados
$lista = $pdo->query($consultaSql);
$listaArq = $pdo->query($consultaArqSql);

// separar os dados em linha
$row = $lista->fetch();
$rowArq = $lista->fetch();


$num_rows = $lista->rowCount();

// Buscar cliente
$nome ="";
$cpf ="";
$cargo ="";
$escala ="";
$turno ="";
$admissao ="";
$demissao ="";
$salario ="";
$vt ="";
$vr ="";
$va ="";

if (isset($_GET['codedit']))
{
    $queryEdit = "SELECT * FROM funcionario where cod_func=".$_GET['codedit'];
    $funcionario = $pdo->query($queryEdit)->fetch();
    $cod = $_GET['codedit'];
    $nome = $funcionario['nome'];
    $cpf = $funcionario['cpf'];
    $cargo = $funcionario['cargo'];
    $escala = $funcionario['escala'];
    $turno = $funcionario['turno'];
    $admissao = $funcionario['admissao'];
    $demissao = $funcionario['demissao'];
    $salario = $funcionario['salario'];
    $vt = $funcionario['vt'];
    $vr = $funcionario['vr'];
    $va = $funcionario['va'];
}

// codigo para arquivar

if (isset($_GET['codarq']))
{
   $queryArq = "update funcionario set demissao = now() where cod_func=".$_GET['codarq'];
    $funcionario = $pdo->query($queryArq)->fetch();
    header('location: funcionario.php');
}

//restaurar funcionario
if (isset($_GET['codres']))
{
   $queryArq = "update funcionario set demissao = null where cod_func=".$_GET['codres'];
    $funcionario = $pdo->query($queryArq)->fetch();
    header('location: funcionario.php');
}

// remover definitivamente (LGPD)
if (isset($_GET['codexc']))
{
   $queryExc = "delete from funcionario where cod_func=".$_GET['codexc'];
    $funcionario = $pdo->query($queryExc)->fetch();
    header('location: funcionario.php');
}


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

if (isset($_POST['alterar']))
{
    // altera os dados do funcionario
    $cod = $_POST['cod-funcionario'];
    $nome = $_POST['nome'];
    $cpf =  $_POST['cpf'];
    $cargo = $_POST['cargo'];
    $escala = $_POST['escala'];
    $turno = $_POST['turno'];
    $admissao = $_POST['admissao'];
    $demissao = $_POST['demissao'];
    $salario = $_POST['salario'];
    $vt = $_POST['vt'];
    $vr = $_POST['vr'];
    $va = $_POST['va'];
    $updateSql = "update funcionario set nome = '$nome', cpf='$cpf', cargo = '$cargo', escala = '$escala', turno = '$turno', admissao = '$admissao', demissao '$demissao', vt = '$vt', vr = '$vr', va = '$va' where cod_func = $cod";
    $resultado = $pdo->query($updateSql);
    header('location: cliente.php');
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
                    <input type="text" name="cod-funcionario" value="<?php echo $cod;?>">
                </label>
            </div>
            <div>
                <label for="nome">
                    Nome
                    <input type="text" name="nome" required value="<?php echo $nome;?>">
                </label>
            </div>
            <div>
                <label for="cpf">
                    CPF
                    <input type="number" name="cpf" required value="<?php echo $cpf;?>">
                </label>
            </div>
            <div>
                <label for="cargo">
                    Cargo
                    <input type="text" name="cargo" required value="<?php echo $cargo;?>">
                </label>
            </div>
            <div>
                <label for="escala">
                    Escala
                    <input type="text" name="escala" required value="<?php echo $escala;?>">
                </label>
            </div>
            <div>
                <label for="turno">
                    Turno
                    <input type="text" name="turno" required value="<?php echo $turno;?>">
                </label>
            </div>
            <div>
                <label for="admissao">
                    Admissão
                    <input type="date" name="admissao" required value="<?php echo $admissao;?>">
                </label>
            </div>
            <div>
                <label for="demissao">
                    Demissão
                    <input type="date" name="demissao" value="<?php echo $demissao;?>">
                </label>
            </div>
            <div>
                <label for="salario">
                    Salário
                    <input type="number" name="salario" required value="<?php echo $salario;?>">
                </label>
            </div>
            <div>
                <label for="vt">
                    VT
                    <input type="number" name="vt" required value="<?php echo $vt;?>">
                </label>
            </div>
            <div>
                <label for="vr">
                    VR
                    <input type="number" name="vr" required value="<?php echo $vr;?>">
                </label>
            </div>
            <div>
                <label for="va">
                    VA
                    <input type="number" name="va" required value="<?php echo $va;?>">
                </label>
            </div>
            <div>
                <button type="submit" name="<?php echo $cod<1?'enviar':'alterar';?>"><?php echo $cod<1?'Enviar':'Alterar';?></button>
            </div>
        </form>
    </section>
    <h3>Funcionários Ativos</h3>
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
            <th colspan="2">Ações</th>
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
                    <td><a href="funcionario.php?codedit=<?php echo $row['cod_func'];?>">Editar</a></td>
                    <td><a href="funcionario.php?codarq=<?php echo $row['cod_func'];?>">Arquivar</a></td>
                </tr>
            <?php } while ($row = $lista->fetch());?>
        </tbody>
    </table>
    <h3>Funcionarios Ativos</h3>
    <table>
        <thead>
        <th hidden>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Cargo</th>
            <th>Escala</th>
            <th>Turno</th>
            <th>Admissão</th>
            <th hidden>Demissão</th>
            <th>Salário</th>
            <th>VT</th>
            <th>VR</th>
            <th>VA</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            <?php do {?>
                <tr>
                <td hidden><?php echo $rowArq['cod_func'];?></td>
                    <td><?php echo $rowArq['nome'];?></td>
                    <td><?php echo $rowArq['cpf'];?></td>
                    <td><?php echo $rowArq['cargo'];?></td>
                    <td><?php echo $rowArq['escala'];?></td>
                    <td><?php echo $rowArq['turno'];?></td>
                    <td><?php echo $rowArq['admissao'];?></td>
                    <td hidden><?php echo $rowArq['demissao'];?></td>
                    <td><?php echo $rowArq['salario'];?></td>
                    <td><?php echo $rowArq['vt'];?></td>
                    <td><?php echo $rowArq['vr'];?></td>
                    <td><?php echo $rowArq['va'];?></td>
                    <td><a href="funcionario.php?codres=<?php echo $rowArq['cod_func'];?>">Restaurar</a></td>
                    <td><a href="funcionario.php?codexc=<?php echo $rowArq['cod_func'];?>">Excluir</a></td>
                
                </tr>
            <?php } while ($rowArq = $listaArq->fetch())?>
        </tbody>
    </table>
</body>
</html>