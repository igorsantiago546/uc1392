<?php 

include 'conecta.php';

// cria a consulta sql
$consulta = "select * from filme";

// trazer a lista completa dos dados 
$lista = $pdo->query("$consulta");

// separar os dados em linhas

$linha = $lista->fetch();
$num_linhas = $lista->rowCount();
// echo 'A consulta retornou <stong>'.$num_linhas. ' </strong> Filmes <br>';

// do{
//     echo $linha['titulo'].' - '.$linha['lancamento'].'<br>';
// }while($linha = $lista -> fetch());

//print_r($linha);

if(isset($_POST['enviar'])) // inserir ou alterar
{
    $titulo  = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $lancamento = $_POST['lancamento'];    
    $pais_origem = $_POST['pais_origem'];   
    $duracao = $_POST['duracao'];   
    $preco = $_POST['preco'];
    $genero = $_POST['genero'];
    $elenco = $_POST['elenco'];
    $direcao = $_POST['direcao'];
    $idioma = $_POST['idioma'];   
    $legenda = $_POST['legenda'];
    
    $consulta = "insert filme (titulo, sinopse, lancamento, pais_origem, duracao, preco, genero, elenco, direcao, idioma, legenda) values ('$titulo','$sinopse','$lancamento','$pais_origem','$duracao','$preco','$genero','$elenco','$direcao','$idioma','$legenda')";
    $resultado = $pdo->query($consulta);
    $_POST['enviar'] = null ;

    header('location: filme.php');
}



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes <?php echo '(' .$num_linhas.')' ?></title>
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
                    <input type="text" name="cod-filme">
                </label>
            </div>
            <div>
            <label for="titulo">
                    Título
                    <input type="text" name="titulo" required>
                </label>
            </div>
            <div>
            <label for="sinopse">
                    Sinopse
                    <input type="textarea" name="sinopse" required>
                </label>
            </div>
            <div>
            <label for="lancamento">
                    Lançamento
                    <input type="number" name="lancamento" required>
                </label>
            </div>
            <div>
            <label for="pais_origem">
                    Pais de Origem
                    <input type="text" name="pais_origem" required>
                </label>
            </div>
            <div>
            <label for="duracao">
                    Duração
                    <input type="number" name="duracao" required>
                </label>
            </div>
            <div>
            <label for="preco">
                    Preço
                    <input type="number" name="preco" required>
                </label>
            </div>
            <div>
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
            </div>
            <div>
                <button type="submit" name="enviar">Enviar</button>
            </div>
        </form>
    </section>
     <table>
        <thead>
            <th>ID</th>
            <th>Título</th>
            <th>Sinopse</th>
            <th>Lançamento</th>
        </thead>
        <tbody>
            <?php do {?>
                <tr>
                    <td><?php echo $linha['cod_filme'];?></td>
                    <td><?php echo $linha['titulo'];?></td>
                    <td><?php echo $linha['sinopse'];?></td>
                    <td><?php echo $linha['lancamento'];?></td>
                </tr>
            <?php }while($linha = $lista->fetch());?>
        </tbody>
    </table> 
</body>
</html>