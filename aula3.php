<!DOCTYPE html>
<html lang="pt-BR">
    <head>
       <!-- <meta http-equiv="refresh" content="1">  -->
    </head>
</html>
<?php 
// "/* */" comentário de bloco 
// "//" comentário de linha
// "#" comentário de kinha

//início - declaração de variáveis
date_default_timezone_set('America/Sao_Paulo');
$nome = "Igor";
$data_nasc = date('2003/02/16');
echo($nome." - ".$data_nasc);
echo('<br>');
$hoje = date("d-m-y H:i:s");
echo(">>>>>>>>".$hoje);
echo('<br>');
/*
$date = date_create('2000-01-01', timezone_open('America/Sao_Paulo'));
echo date_format($date, 'Y-m-d H:i:sP') . "\n";
echo('<br>');
date_timezone_set($date, timezone_open('Pacific/Chatham'));
echo date_format($date, 'Y-m-d H:i:sP') . "\n";
*/
$valor = 78.98;
$idade = 30;
$teste = true;

// final - declaração de variáveis




// declaração e uso de matrizes
$alunos = array();
$alunos[0] = "Maria";
$alunos[1] = "João";
$nota = array(9,8,7,4);
print_r($nota);
echo("<br>");
$pontos = array('josé'=>'11', 'Lucas'=>'5', 'Jean'=>'9');
print_r($pontos);
echo("<br>");

// estrutura de decisão
if (!($idade>=30)){ //se verdadeiro então
    echo("Aluno em lista para classificação");
}

$a = 9; $b = 9;
if($a > $b){
    echo("O valor '$a' é a maior '$b'");
}elseif($a < $b){
    echo("O valor '$b' é a maior '$a'");
}else{
    echo("O valor '$a' é igual a '$b");
}


// estruturas de repetição
while ($a < 11) { // tabuada de um número
    echo($n. ' x '.$i. " = " .($i*$n)."<br>");
echo("<br>");

$nota = array(9,8,7,4);

} for ($i=0; $i < 4; $i++) {
    echo($nota[$i]);
    echo("<br>");
}
?>