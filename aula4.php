<?php 
include ('config.php');
include ('funcoes.php');

$parcelas = array();
$coeficiente = 0.0;
if(isset($_POST['calcular']))
{
    $capital = $_POST['capital'];
    $taxa    = $_POST['taxa'];
    $parcela = $_POST['parcela'];
    $coeficiente = parcelar(floatval($taxa), intval($parcela));
print_r($_POST);
    $data = date('d/m/Y');
    $dias = 30;
    for ($i=0; $i < $parcela; $i++) { 
        $parcelas += ([($i+1).'ª',($coeficiente*floatval($capital)),date($data,strtotime('+'.$dias.' days'))]);
        $dias += 30; 
    }
    print_r($parcelas);
}



?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcelamento</title>
</head>
<body>
    
    <form action="#" method="post">
        <input type="text" name="capital" placeholder="Capital..">
        
        <input type="text" name="taxa" placeholder="Taxa (%)..">
        
        <input type="text" name="parcela" placeholder="Parcelas (1)...">
        <button type="submit" name="calcular">Calcular</button>
    </form>
    <br><hr>
    <?php if(count($parcelas)>0){?> 
    <h3>Valor da capital:R$ <?php echo $capital; ?></h3>
    <h3>taxa de juro: <?php echo $taxa; ?> %</h3>
    <h3>Parcelas: <?php echo $parcela; ?> meses</h3>
    <?php 
        foreach ($parcelas as $valores) {
            ?>
                <h4><?php echo($valores[0]." R$ ". strval($valores[1])." - ".strval($valores[2]));?></h4>
            <?php 
        }
    } ?>
</body>
</html>