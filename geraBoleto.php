<?php 

namespace Boleto\USP; 
require_once __DIR__ . '/vendor/autoload.php';

use Uspdev\Boleto;

require_once __DIR__ . '/config.php';

$boleto = new Boleto(USERNAME_WSDL,PASSWORD_WSDL,URL_WSDL);

$tipoSacado = filter_input(INPUT_POST, 'tipoSacado');
$nomeSacado = filter_input(INPUT_POST, 'nomeSacado');
$cpfCnpj = filter_input(INPUT_POST, 'cpfCnpj');
$codigoEmail = filter_input(INPUT_POST, 'codigoEmail');
$inscricaoPara = filter_input(INPUT_POST, 'inscricaoPara');

switch ($inscricaoPara) {
    case 'MESTRADO':
        $info = 'INSCRIÇÃO PARA MESTRADO IGc-USP';
        $valor = VALOR_MESTRADO;
        break;
    case 'DOUTORADO':
        $info = 'INSCRIÇÃO PARA DOUTORADO IGc-USP';
        $valor = VALOR_DOUTORADO;
        break;
    case 'ESPECIAL':
        $info = 'INSCRIÇÃO PARA ALUNO ESPECIAL IGc-USP';
        $valor = VALOR_ESPECIAL;
        break;
    default:
        echo "fail";
        break;
}

//array com campos mínimos para geração do boleto
$data = array(
    'codigoUnidadeDespesa' => UNIDADE,
    'codigoFonteRecurso' => FONTE_RECURSO,
    'estruturaHierarquica' => ESTRUTURA_HIERARQUICA,     
    'dataVencimentoBoleto' => date('d/m/Y', strtotime('+2 days')), 
    'valorDocumento' => $valor,
    'tipoSacado' => $tipoSacado, 
    'cpfCnpj' => $cpfCnpj, 
    'nomeSacado' => $nomeSacado,
    'codigoEmail' => $codigoEmail,  
    'informacoesBoletoSacado' => $info,
    'instrucoesObjetoCobranca' => 
        "### COBRANÇA REGISTRADA: Não pagar no dia da emissão! Apenas no próximo dia útil!!!"
        . "<br>### Não receber após o vencimento."
        . "<br>### Pague com o app de seu banco! \n\n "
);
print_r($data);
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

// situação
//print_r($boleto->situacao($r['value']));

// obter o PDF:
// $boleto->obter($r['value']);

?>
