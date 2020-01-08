<?php

/*
 * Boletos que são gerados
 * 
 * Definir TITULO e VALOR
 */

//valores (enviado via GET)
$b = filter_input(INPUT_GET, 'b');
switch ($b) {
    case 'MESTRADO':
        define(TITULO, 'INSCRIÇÃO PARA MESTRADO IGc-USP');
        define(VALOR, 50);
        break;
    case 'DOUTORADO':
        define(TITULO, 'INSCRIÇÃO PARA DOUTORADO IGc-USP');
        define(VALOR, 50);
        break;
    case 'ESPECIALPG':
        define(TITULO, 'INSCRIÇÃO PARA ALUNO ESPECIAL PÓS-GRADUAÇÃO IGc-USP');
        define(VALOR, 50);
        break;
    default:
        echo "Faltam parâmetros.";
        die();
        break;
}