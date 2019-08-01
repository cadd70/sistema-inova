<?php


// use Carbon\Carbon;
use Illuminate\Support\Carbon;
use Cmixin\BusinessDay;
use App\Classes\Comex\ValidaData;


$motivosAlteracao = array('ALTERAÇÃO DE MOEDA', 'ALTERAÇÃO DE BENEFICIARIO');


$dataLiquidacao = Carbon::parse('2019-08-02');

// DADOS DO CONTRATO
$tipoContrato = 'CONTRATACAO'; // CONTRATACAO ALTERACAO CANCELAMENTO
$motivoAlteracao = 'ALTERAÇÃO DE MOEDA'; // QUALQUER OUTRO MOTIVO
$equivalenciaDolar = '10000.15';

$dataEnvioContrato = Carbon::now();
// $dataEnvioContrato = Carbon::parse('2018-03-29');
$dataEnvioContratoEditado = Carbon::now();
$dataEnvioContratoEditadoDois = Carbon::now();
// $dataEnvioContratoEditado = Carbon::parse('2018-03-29');


/* VALIDAÇÃO DE MENSAGERIA */

// VALIDA TIPO CONTRATO
switch ($tipoContrato) {
    case 'CONTRATACAO':
        if ($equivalenciaDolar >= 10000) {
            $maiorDezMil = 'SIM';
            $vaiDiretoGelit = 'NÃO';
            $dataRetornoResposta = ValidaData::verificaDataRetorno($dataLiquidacao, $dataEnvioContrato, $dataEnvioContratoEditado);
        } else {
            $maiorDezMil = 'NÃO';
            $vaiDiretoGelit = 'SIM';
        }
        break;
    case 'ALTERACAO':
        if ($equivalenciaDolar >= 10000) {
            if(in_array($motivoAlteracao, $motivosAlteracao)) {
                $maiorDezMil = 'SIM';
                $vaiDiretoGelit = 'NÃO';
                $dataRetornoResposta = ValidaData::verificaDataRetorno($dataLiquidacao, $dataEnvioContrato, $dataEnvioContratoEditado);
            } else {
                $maiorDezMil = 'NÃO';
                $vaiDiretoGelit = 'SIM';
            }
        } else {
            $maiorDezMil = 'NÃO';
            $vaiDiretoGelit = 'SIM';
        } 
        break;
    case 'CANCELAMENTO':
        $maiorDezMil = 'NÃO';
        break;
}

// RESULTADO DE MENSAGEIRIA




echo "<hr>";
echo "<h1>VALIDAÇÃO DE MENSAGERIA</h1>";
echo "<hr>";
echo "<h2>DADOS DA OPERAÇÃO:</h2>";
echo "<p><b>Liquidação:</b> " . $dataLiquidacao->format('d/m/Y') . "</p>";
echo "<p><b>Equivalencia USD:</b> " . number_format($equivalenciaDolar, 2, '.', ',') . "</p>";
echo "<hr>";
echo "<h2>DADOS ENVIO CONTRATO:</h2>";
echo "<p><b>Tipo de Contrato:</b> $tipoContrato</p>";
echo "<p><b>Data Envio Contrato:</b> " . $dataEnvioContratoEditadoDois->format('d/m/Y H:i:s') . "</p>";
echo "<hr>";
echo "<h2>RESULTADO:</h2>";
echo "<p><b>Retorno Rede:</b>  $maiorDezMil</p>";
switch ($tipoContrato) {
    case 'CONTRATACAO':
        if (isset($dataRetornoResposta)) {
            echo "<p><b>Limite Resposta:</b>  $dataRetornoResposta</p>";
        } else {
            echo "<p><b>Vai direto para GELIT:</b>  $vaiDiretoGelit</p>";
        }
        break;
    case 'ALTERACAO':
        if (isset($motivoAlteracao)) {
            echo "<p><b>Motivo Alteração:</b>  $motivoAlteracao</p>";
        }
        if (isset($dataRetornoResposta)) {
            echo "<p><b>Limite Resposta: </b>" . $dataRetornoResposta->format('d/m/Y H:i:s') . "</p>";
        } else {
            echo "<p><b>Vai direto para GELIT:</b>  $vaiDiretoGelit</p>";
        } 
        break;
    case 'CANCELAMENTO':

        break;
}
echo "<hr>";