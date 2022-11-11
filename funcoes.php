<?php 
function parcelar(float $taxa, int $parcelas=1):float {
    $coeficiente = pow((1 + ($taxa/100)), $parcelas) /$parcelas;
    return $coeficiente; // parcelas fixas
}

function dataTexto(DateTime $data){
    $intervalo = $data->diff(new DateTime());
    return $intervalo->format('%y anos, %m meses, %d dias');

}

function signos_dm(DateTime $date){
    $intervalo = $date->diff(new DateTime());
    return $intervalo->format('Você nasceu no dia %d, no mês %m');
}

function data(DateTime $data){
    $intervalo = $data->diff(new DateTime('21-03-2003'));
    return $intervalo->format('21-03');
} 
?>