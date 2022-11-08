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

    $parcelas = ([$capital, $taxa,$parcela,$coeficiente*$capital]);
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
    <h3>Valor da parcela:R$ <?php echo $parcelas[3]; ?></h3>
    <?php } ?>
</body>
</html>