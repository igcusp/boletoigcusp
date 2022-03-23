<?php

$instrucoesObjetoCobranca = 
        "### Não receber após o vencimento."
        . "### Pague com o app de seu banco!"
        . "### Não imprima!";

//valores (enviado via GET) definidos no index
$b = filter_input(INPUT_GET, 'b');
switch ($b) {
    case 'MESTRADO':
        define(TITULO, 'INSCRIÇÃO PARA MESTRADO');
        define(VALOR, 50);
        define(DESCRITIVO, TITULO);
        define(VENCIMENTO, date('d/m/Y', strtotime('+2 days')));
        define('UNIDADE',1);
        define('FONTE_RECURSO',51);
        define('ESTRUTURA_HIERARQUICA', '\GR\CODAGE\DA\DAAT\POOL-C');
        break;
    case 'MUSEULOJA':
        define(TITULO, 'Loja do Museu de Geociências');
        define(VALOR, 0);
        define(DESCRITIVO, 'Souveniers do Museu de Geociências da USP');
        define(VENCIMENTO, date('d/m/Y', strtotime('+0 days')));
        define('UNIDADE',1);
        define('FONTE_RECURSO',423);
        define('ESTRUTURA_HIERARQUICA', '\DISTRIBUIDOR');
        break;
    default:
        echo "Faltam parâmetros.";
        die();
        break;
}