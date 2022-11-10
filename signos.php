<?php 
require ('config.php');
require ('funcoes.php') ;

$signos = array(
    'ÁRIES'=>(['21/03 a 19/04']), 
    'TOURO'=>(['20/04 a 20/05']), 
    'GÊMEOS'=>(['21/05 a 21/06']), 
    'CÂNCER'=>(['22/06 a 22/07']),
    'LEÃO'=>(['23/07 a 22/08']),
    'VIRGEM'=>(['23/08 a 22/09']),
    'LIBRA'=>(['23/09 a 22/10']),
    'ESCORPIÃO'=>(['23/10 a 21/11']),
    'SAGITÁRIO'=>(['22/11 a 21/12']),
    'CAPRICÓRNIO'=>(['22/12 a 19/01']),
    'AQUÁRIO'=>(['20/01 a 18/02']),
    'PEIXES'=>(['19/02 a 20/03'])
);

if (isset($_POST['result'])){  // se o usuário clicar no botão
    $dia_frm = $_POST['dia'];
    $mes_frm = $_POST['mes'];
    $signos += [$dia_frm => ([$mes_frm])];
}
// colocando variaveis 




?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signos</title>
</head>
<body>
    <form action="#" method="post">
        <label for="dia">
            Dia:
            <input type="text" name="dia" placeholder="Dia do Nascimento" required>            
        </label><br>
        <label for="mes">
            Mês:
            <input type="text" name="mes" placeholder="Mês do Nascimento" required>            
        </label><br>
        <button type="submit" name="result" id="btn-enviar">Enviar</button>
    </form>
    <?php echo signos_dm(new DateTime($signos[0])); ?>    
    <table class="tb_signos">
        <th>Signo</th>
        <th>Data</th>
        <?php foreach ($signos as $signo => $data) {?>
        <tr>
            <td><?php echo($signo); ?></td>
            <td><?php echo($data[0]);?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>