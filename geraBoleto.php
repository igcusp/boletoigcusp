<?php 

namespace Boleto\USP; 
require_once __DIR__ . '/vendor/autoload.php';

use Uspdev\Boleto;

require_once 'config.php'; 
require_once 'areas.php'; 

$boleto = new Boleto(USERNAME_WSDL,PASSWORD_WSDL,URL_WSDL);

$tipoSacado = filter_input(INPUT_POST, 'tipoSacado');
$nomeSacado = filter_input(INPUT_POST, 'nomeSacado');
$cpfCnpj = filter_input(INPUT_POST, 'cpfCnpj');
$codigoEmail = filter_input(INPUT_POST, 'codigoEmail');

//array com campos mínimos para geração do boleto
$data = array(
    'codigoUnidadeDespesa' => UNIDADE,
    'codigoFonteRecurso' => FONTE_RECURSO,
    'estruturaHierarquica' => ESTRUTURA_HIERARQUICA,     
    'dataVencimentoBoleto' => date('d/m/Y', strtotime('+2 days')), 
    'valorDocumento' => VALOR,
    'tipoSacado' => $tipoSacado, 
    'cpfCnpj' => $cpfCnpj, 
    'nomeSacado' => $nomeSacado,
    'codigoEmail' => $codigoEmail,  
    'informacoesBoletoSacado' => TITULO,
    'instrucoesObjetoCobranca' => 
        "### COBRANÇA REGISTRADA: Não pagar no dia da emissão! Apenas no próximo dia útil!!!"
        . "<br>### Não receber após o vencimento."
        . "<br>### Pague com o app de seu banco! \n\n "
);

/* O método gerar() retorna um array com dois indices:
   status: true ou false indicando se o boleto foi ou não gerado
   value: o id do boleto gerado ou a mensagem de erro 
*/
// gerar
$r = $boleto->gerar($data);
if(!$r['status']) {
    echo 'Erro : ' . $r['value'];
    die();
}
else {
    $boleto->obter($r['value']);
}
