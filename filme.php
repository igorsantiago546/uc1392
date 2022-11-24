<?php 

include 'conecta.php';

// cria a consulta sql
$consulta = "SELECT * FROM filme where deleted is null order by titulo, cod_filme asc";
$consultaSqlArq = "SELECT * FROM filme where deleted is not null order by titulo, cod_filme asc";

// trazer a lista completa dos dados 
$lista = $pdo->query("$consulta");
$listaArq = $pdo->query($consultaSqlArq);
$listaClass = $pdo->query("select cod_classificacao as id, classificacoes as class from classificacao");

// separar os dados em linhas

$linha = $lista->fetch();
$linhaArq = $listaArq->fetch();
$linhaClass = $listaClass->fetch();
$num_linhas = $lista->rowCount();
$num_linhas_arq = $listaArq->rowCount();
// echo 'A consulta retornou <stong>'.$num_linhas. ' </strong> Filmes <br>';

// do{
//     echo $linha['titulo'].' - '.$linha['lancamento'].'<br>';
// }while($linha = $lista -> fetch());

//print_r($linha);

// busca filme por codigo
$titulo = "";
$sinopse = "";
$lancamento = "";
$pais_origem = "";
$duracao = "";
$preco = "";
$cod = 0;
if (isset($_GET['codedit']))
{
    $queryEdit = "SELECT * FROM filme where cod_filme=".$_GET['codedit'];
    $filme = $pdo->query($queryEdit)->fetch();
    $cod = $_GET['codedit'];
    $titulo = $_GET['titulo'];
    $sinopse = $_GET['sinopse'];
    $lancamento = $_GET['lancamento'];
    $pais_origem = $_GET['pais_origem'];
    $duracao = $_GET['duracao'];
    $preco = $_GET['preco'];
    
}

// codigo para arquivar(excluir)
if (isset($_GET['codarq']))
{
    $queryArq = "update filme set deleted = now() where cod_filme=".$_GET['codarq'];
    $filme = $pdo->query($queryArq)->fetch();
    header('location: filme.php');
}

// restaurar filme
if (isset($_GET['codres']))
{
    $queryArq = "update filme set deleted = null where cod_filme=".$_GET['codres'];
    $filme = $pdo->query($queryArq)->fetch();
    header('location: filme.php');
}

// remover definitivamente (LGPD)
if (isset($_GET['codexc']))
{
   $queryExc = "delete from filme where cod_filme=".$_GET['codexc'];
    $filme = $pdo->query($queryExc)->fetch();
    header('location: filme.php');
}

if(isset($_POST['enviar'])) // inserir ou alterar
{
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $lancamento = $_POST['lancamento'];    
    $pais_origem = $_POST['pais_origem'];   
    $duracao = $_POST['duracao'];   
    $preco = $_POST['preco'];
    // $genero = $_POST['genero'];
    // $elenco = $_POST['elenco'];
    // $direcao = $_POST['direcao'];
    // $idioma = $_POST['idioma'];   
    // $legenda = $_POST['legenda'];
    
    $consulta = "insert filme (titulo, sinopse, lancamento, pais_origem, duracao, preco) values ('$titulo','$sinopse','$lancamento','$pais_origem','$duracao','$preco')";
    $resultado = $pdo->query($consulta);
    $_POST['enviar'] = null ;

    header('location: filme.php');
}
if (isset($_POST['alterar']))
{
    $cod = $_POST['cod-filme'];
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $lancamento = $_POST['lancamento'];
    $pais_origem = $_POST['pais_origem'];
    $duracao = $_POST['duracao'];
    $preco = $_POST['preco'];
    $updateSql = "update filme set titulo = '$titulo', sinopse='$sinopse', lancamento='$lancamento', pais_origem='$pais_origem', duracao='$duracao', preco='$preco' where cod_filme = $cod";
    $resultado = $pdo->query($updateSql);
    header('location: filme.php');
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes (<?php echo $num_linhas; ?>)</title>
    <!-- <style>
    /* td{
        border-bottom: 1px solid black; 
    }</style> */ -->
</head>
<body>
<section class="formulario">
        <form action="#" method="post">
            <div hidden>
                <label for="cod-filme">
                    Código
                    <input type="text" name="cod-filme" value="<?php echo $cod;?>">
                </label>
            </div>
            <div>
            <label for="titulo">
                    Título
                    <input type="text" name="titulo" required value="<?php echo $titulo;?>">
                </label>
            </div>
            <div>
            <label for="sinopse">
                    Sinopse
                    <input type="textarea" name="sinopse" required value="<?php echo $sinopse;?>">
                </label>
            </div>
            <div>
            <label for="lancamento">
                    Lançamento
                    <input type="date" name="lancamento" required value="<?php echo $lancamento;?>">
                </label>
            </div>
            <div>
            <label for="pais_origem">
                    Pais de Origem
                    <input type="text" name="pais_origem" required value="<?php echo $pais_origem;?>">
                </label>
            </div>
            <div>
            <label for="duracao">
                    Duração
                    <input type="number" name="duracao" required value="<?php echo $duracao;?>">
                </label>
            </div>
            <div>
            <label for="preco">
                    Preço
                    <input type="number" name="preco" required value="<?php echo $preco;?>">
                </label>
            </div>
            <div>
                <label for="Classificacao">
                    Classificação
                    <select name="class" id="">
                        <?php do { ?>
                        <option value="<?php echo $linhaClasss['id']?>"><?php echo $linhaClass['class']?></option>
                        <?php } while($linhaClass = $listaClass->fetch());?>
                    </select>
                </label>
            </div>
            <!-- <div>
            <label for="genero">
                    Genero
                    <input type="text" name="genero" required>
                </label>
            </div>
            <div>
            <label for="Elenco">
                    Elenco
                    <input type="text" name="Elenco" required>
                </label>
            </div>
            <div>
            <label for="direcao">
                    Direcao
                    <input type="text" name="direcao" required>
                </label>
            </div>
            <div>
            <label for="idioma">
                    Idioma
                    <input type="text" name="idioma" required>
                </label>
            </div>
            <div>
            <label for="legenda">
                    Legenda
                    <input type="text" name="legenda" required>
                </label>
            </div>
            <div hidden>
            <label for="cod_classificacao">
                    Cod_classificacao
                    <input type="number" name="cod_classificacao" required>
                </label>
            </div> -->
            <div>
            <button type="submit" name="<?php echo $cod<1?'enviar':'alterar'; ?>"><?php echo $cod<1?'Enviar':'Alterar'; ?></button>
            </div>
        </form>
    </section>
    <h3>Filmes Ativos</h3>
     <table>
        <thead>
            <?php if ($num_linhas > 0) { ?>
            <th hidden>ID</th>
            <th>Título</th>
            <th>Sinopse</th>
            <th>Lançamento</th>
            <th>Pais de Origem</th>
            <th>Duração</th>
            <th>Preço</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            <?php do {?>
                <tr>
                    <td hidden><?php echo $linha['cod_filme'];?></td>
                    <td><?php echo $linha['titulo'];?></td>
                    <td><?php echo $linha['sinopse'];?></td>
                    <td><?php echo $linha['lancamento'];?></td>
                    <td><?php echo $linha['pais_origem'];?></td>
                    <td><?php echo $linha['duracao'];?></td>
                    <td><?php echo $linha['preco'];?></td>
                    <td><a href="filme.php?codedit=<?php echo $linha['cod_filme'];?>">Editar</a></td>
                    <td><a href="filme.php?codarq=<?php echo $linha['cod_filme'];?>">Arquivar</a></td>
                </tr>
            <?php } while ($linha = $lista->fetch());
            } else {
                echo "<tr><td colspan=5>Não há filmes Cadastrados</td></tr>";
            }
            ?>
        </tbody>
    </table> 
    <h3>Filmes Arquivados</h3>
    <table>
        <thead>
            <?php if ($num_linhas_arq > 0) {?>
        <th hidden>ID</th>
            <th>Título</th>
            <th>Sinopse</th>
            <th>Lançamento</th>
            <th>Pais de Origem</th>
            <th>Duração</th>
            <th>Preço</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            <?php do {?>
                <tr>
                <td hidden><?php echo $linhaArq['cod_filme'];?></td>
                    <td><?php echo $linhaArq['titulo'];?></td>
                    <td><?php echo $linhaArq['sinopse'];?></td>
                    <td><?php echo $linhaArq['lancamento'];?></td>
                    <td><?php echo $linhaArq['pais_origem'];?></td>
                    <td><?php echo $linhaArq['duracao'];?></td>
                    <td><?php echo $linhaArq['preco'];?></td>
                    <td><a href="filme.php?codres=<?php echo $linhaArq['cod_filme'];?>">Restaurar</a></td>
                    <td><a href="filme.php?codexc=<?php echo $linhaArq['cod_filme'];?>">Excluir</a></td>
                
                </tr>
            <?php } while ($linhaArq = $listaArq->fetch());
            } else {
                echo "<tr><td colspan=5>Não há filmes arquivados</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>