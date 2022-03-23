<?php 

namespace Boleto\USP; 
require_once __DIR__ . '/vendor/autoload.php';

use Uspdev\Boleto;

require_once 'config.php'; 
require_once 'areas.php'; 

$boleto = new Boleto(USERNAME_WSDL,PASSWORD_WSDL,$dev);

$tipoSacado = filter_input(INPUT_POST, 'tipoSacado');
$nomeSacado = filter_input(INPUT_POST, 'nomeSacado');
$cpfCnpj = filter_input(INPUT_POST, 'cpfCnpj');
$codigoEmail = filter_input(INPUT_POST, 'codigoEmail');
if (VALOR==0){ // obtém valor digitado do formulário
    $valor = filter_input(INPUT_POST, 'valor');
    $valor = str_replace(',', '.', $valor);

    
}
else { // obtém valor pré-definido
    $valor = VALOR;
}
$descritivo = filter_input(INPUT_POST, 'descritivo');

//array com campos mínimos para geração do boleto
$data = array(
    'codigoUnidadeDespesa' => UNIDADE,
    'codigoFonteRecurso' => FONTE_RECURSO,
    'estruturaHierarquica' => ESTRUTURA_HIERARQUICA,     
    'dataVencimentoBoleto' => VENCIMENTO, 
    'valorDocumento' => $valor,
    'tipoSacado' => $tipoSacado, 
    'cpfCnpj' => $cpfCnpj, 
    'nomeSacado' => $nomeSacado,
    'codigoEmail' => $codigoEmail,  
    'informacoesBoletoSacado' => $descritivo,
    'instrucoesObjetoCobranca' => $instrucoesObjetoCobranca
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
    $obter = $boleto->obter($r['value']);
    
    //redirecionando os dados binarios do pdf para o browser
    header('Content-type: application/pdf'); 
    header('Content-Disposition: attachment; filename="boleto.pdf"'); 
    echo base64_decode($obter['value']);
}
