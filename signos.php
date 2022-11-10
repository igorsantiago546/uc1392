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
print_r($signos);
// colocando variaveis 

$aries_i = new DateTime('21-03');
$aries_f = new DateTime('19-04');
$touro_i = new DateTime('20-04');
$touro_f = new DateTime('20-05');
$gemeos_i = new DateTime('21-05'); 
$gemeos_f = new DateTime('21-06');
$cancer_i = new DateTime('22-06');
$cancer_f = new DateTime('22-07'); 
$leao_i = new DateTime('23-07');
$leao_f = new DateTime('22-08');
$virgem_i = new DateTime('23-08');
$virgem_f = new DateTime('22-09');
$libra_i = new DateTime('23-09');
$libra_f = new DateTime('22-10');
$escorpiao_i = new DateTime('23-10');
$escorpiao_f = new DateTime('21-11');
$sagitario_i = new DateTime('22-11');
$sagitario_f = new DateTime('21-12');
$capricornio_i = new DateTime('22-12');
$capricornio_f= new DateTime('19-01');
$aquario_i = new DateTime('21-01');
$aquario_f = new DateTime('18-02');
$peixes_i = new DateTime('19-02');
$peixes_f = new DateTime('20-03');

if ($int >= $int2){
    echo ('Então o seu signo e de Áries');
}elseif($int3 >= $int4){
    echo ('Então o seu signo e de touro');
}

print_r($aries_i);
print_r($aries_f);

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