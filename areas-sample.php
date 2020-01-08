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
        define(TITULO, 'INSCRIÇÃO PARA MESTRADO');
        define(VALOR, 50);
        break;
    case 'DOUTORADO':
        define(TITULO, 'INSCRIÇÃO PARA DOUTORADO');
        define(VALOR, 80);
        break;
    case 'ESPECIALPG':
        define(TITULO, 'INSCRIÇÃO PARA ALUNO ESPECIAL');
        define(VALOR, 30);
        break;
    default:
        echo "Faltam parâmetros.";
        die();
        break;
}