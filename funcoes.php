<?php 
function parcelar(float $taxa,float $parcelas=2):float
{
   $coeficiente = pow((1 + ($taxa/100)), $parcelas)/$parcelas; // coeficiente "((1 + ($taxa/100)) ^ $parcelas);"
    return $coeficiente; // parcelas fixas
}


?>