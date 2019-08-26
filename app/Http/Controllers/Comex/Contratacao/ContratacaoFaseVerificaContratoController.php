<?php

namespace App\Http\Controllers\Comex\Contratacao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Exceptions\Handler;
use App\Http\Controllers\Comex\Contratacao\Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use App\Models\Comex\Contratacao\ContratacaoDemanda;
use App\Models\Comex\Contratacao\ContratacaoConfereConformidade;
use App\Models\Comex\Contratacao\ContratacaoDadosContrato;
use App\Models\Comex\Contratacao\ContratacaoContaImportador;
use App\Models\Comex\Contratacao\ContratacaoHistorico;
use App\Models\Comex\Contratacao\ContratacaoUpload;
use App\Classes\Comex\Contratacao\ContratacaoPhpMailer;
use App\Http\Controllers\Comex\Contratacao\ContratacaoFaseConformidadeDocumentalController;
use App\RelacaoAgSrComEmail;

class ContratacaoFaseVerificaContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listagemDemandasParaConformidadeContrato = [];

        $demandaContratacao = ContratacaoDemanda::with(['EsteiraContratacaoUpload', 'EsteiraContratacaoUpload.EsteiraDadosContrato'])->whereIn('statusAtual', ['LIQUIDADA', 'CANCELADA', 'CONTRATO PENDENTE'])->get();

        for ($i = 0; $i < sizeof($demandaContratacao); $i++) {
            if ($demandaContratacao[$i]->cpf === null) {
                $cpfCnpj = $demandaContratacao[$i]->cnpj;
            } else {
                $cpfCnpj = $demandaContratacao[$i]->cpf;
            }
            if ($demandaContratacao[$i]->agResponsavel === null) {
                $unidadeDemandante = $demandaContratacao[$i]->srResponsavel;
            } else {
                $unidadeDemandante = $demandaContratacao[$i]->agResponsavel;
            }
            
            // CAPTURA DADOS DA DEMANDA
            $idDemanda = $demandaContratacao[$i]->idDemanda;
            $nomeCliente = $demandaContratacao[$i]->nomeCliente;
            $tipoOperacao = $demandaContratacao[$i]->tipoOperacao;
            $valorOperacao = $demandaContratacao[$i]->valorOperacao;
            $dataLiquidacao = $demandaContratacao[$i]->dataLiquidacao;
            $statusAtual = $demandaContratacao[$i]->statusAtual;

            // CAPTURA DA DADOS DO CONTRATO 
            for ($j = 0; $j < sizeof($demandaContratacao[$i]->EsteiraContratacaoUpload); $j++) { 
                $naoPodeAnalisarContrato = 0;
                switch ($demandaContratacao[$i]->EsteiraContratacaoUpload[$j]->tipoDoDocumento) {
                    case 'CONTRATACAO':
                    case 'ALTERACAO':
                    case 'CANCELAMENTO':
                        if ($demandaContratacao[$i]->EsteiraContratacaoUpload[$j]->EsteiraDadosContrato->temRetornoRede == 'SIM' and $demandaContratacao[$i]->EsteiraContratacaoUpload[$j]->EsteiraDadosContrato->statusContrato != 'CONTRATO ASSINADO') {
                            $naoPodeAnalisarContrato++;
                        }
                        break;
                }
            }
            if ($naoPodeAnalisarContrato == 0) {
                $demandaPendente = array(
                    'idDemanda' => $idDemanda,
                    'nomeCliente' => $nomeCliente,
                    'cpfCnpj' => $cpfCnpj,
                    'tipoOperacao' => $tipoOperacao,
                    'valorOperacao' => $valorOperacao,
                    'dataLiquidacao' => $dataLiquidacao,
                    'unidadeDemandante' => $unidadeDemandante,
                    'statusAtual' => $statusAtual
                );
                array_push($listagemDemandasParaConformidadeContrato, $demandaPendente);
            }
        }
        return json_encode(array('demandasParaConformidadeContrato' => $listagemDemandasParaConformidadeContrato), JSON_UNESCAPED_SLASHES);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // CAPTURA A UNIDADE DE LOTAÇÃO (FISICA OU ADMINISTRATIVA)
            if ($request->session()->get('codigoLotacaoFisica') == null || $request->session()->get('codigoLotacaoFisica') === "NULL") {
                $lotacao = $request->session()->get('codigoLotacaoAdministrativa');
            } else {
                $lotacao = $request->session()->get('codigoLotacaoFisica');
            }

            // RESGATA O ID DA DEMANDA
            $objUploadContrato = ContratacaoUpload::find($request->idUploadContratoSemAssinatura);
        
            // CRIA O DIRETÓRIO PARA UPLOAD DOS ARQUIVOS
            ContratacaoFaseConformidadeDocumentalController::criaDiretorioUploadArquivoComplemento($objUploadContrato->idDemanda);

            // REALIZAR O UPLOAD DO CONTRATO ASSINADO
            $uploadContrato = ContratacaoFaseConformidadeDocumentalController::uploadArquivo($request, "uploadContratoAssinado", $request->tipoContrato . "_ASSINADO", $objUploadContrato->idDemanda);

            // REALIZA UPDATE NO OBJETO DE DADOS CONTRATOS
            $objDadosContrato = ContratacaoDadosContrato::find($id);
            $objDadosContrato->idUploadContratoAssinado = $uploadContrato->idUploadLink;
            $objDadosContrato->statusContrato = 'CONTRATO ASSINADO';
            $objDadosContrato->dataEnvioContratoAssinado = date("Y-m-d H:i:s", time());
            $objDadosContrato->save();

            // REGISTRO DE HISTORICO
            $historico = new ContratacaoHistorico;
            $historico->idDemanda = $objUploadContrato->idDemanda;
            $historico->tipoStatus = "ENVIO DE CONTRATO ASSINADO";
            $historico->dataStatus = date("Y-m-d H:i:s", time());
            $historico->responsavelStatus = $request->session()->get('matricula');
            $historico->area = $lotacao;
            $historico->analiseHistorico = "Envio de contrato assinado nº $objDadosContrato->numeroContrato - Tipo: $request->tipoContrato";
            $historico->save();
        
            DB::commit();

            // VALIDA SE AINDA EXISTEM CONTRATOS PARA ENVIAR PARA DEFINIR O REDIRECT
            $objContratacaoDemanda = ContratacaoDemanda::with(['EsteiraContratacaoUpload', 'EsteiraContratacaoUpload.EsteiraDadosContrato'])->where('TBL_EST_CONTRATACAO_DEMANDAS.idDemanda', 1)->get();
            $contagemUploadContratoAssinado = 0;
            for ($i = 0; $i < sizeof($objContratacaoDemanda[0]->EsteiraContratacaoUpload); $i++) { 
                switch ($objContratacaoDemanda[0]->EsteiraContratacaoUpload[$i]->tipoDoDocumento) {
                    case 'CONTRATACAO':
                    case 'ALTERACAO':
                    case 'CANCELAMENTO':
                        // dd($objContratacaoDemanda[0]->EsteiraContratacaoUpload[$i]->EsteiraDadosContrato->dataEnvioContratoAssinado);
                        if ($objContratacaoDemanda[0]->EsteiraContratacaoUpload[$i]->EsteiraDadosContrato->temRetornoRede == 'SIM' AND is_null($objContratacaoDemanda[0]->EsteiraContratacaoUpload[$i]->EsteiraDadosContrato->dataEnvioContratoAssinado)) {
                            $contagemUploadContratoAssinado++;
                        }
                        break;
                }
            }
            if($contagemUploadContratoAssinado > 0) {
                return redirect('esteiracomex/contratacao/carregar-contrato-assinado/' . $objUploadContrato->idDemanda);
            } else {
                $request->session()->flash('corMensagem', 'success');
                $request->session()->flash('tituloMensagem', 'Todos os contratos assinados foram enviados');
                $request->session()->flash('corpoMensagem', 'A contrato assinado foi enviado para conformidade.');
                return redirect('esteiracomex/acompanhar/minhas-demandas');
            }            
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            $request->session()->flash('corMensagem', 'danger');
            $request->session()->flash('tituloMensagem', "Contrato não foi enviado");
            $request->session()->flash('corpoMensagem', "Aconteceu algum erro durante o envio do contrato, tente novamente.");
            return redirect('esteiracomex/contratacao/carregar-contrato-assinado/' . $objUploadContrato->idDemanda);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    { 
        // dd($request);
        $verificaContratoAssinado = ContratacaoDadosContrato::with('EsteiraContratacaoUploadConsulta')->where('TBL_EST_CONTRATACAO_CONFORMIDADE_CONTRATO.idUploadContratoAssinado', $id)->get();
        if ($request->aprovarContrato == 'SIM') {
            $verificaContratoAssinado[0]->statusContrato = 'CONTRATO CONFORME';
            // dd('SIM', $verificaContratoAssinado[0]);
        } else {
            $verificaContratoAssinado[0]->statusContrato = 'ASSINATURA PENDENTE';
            $verificaContratoAssinado[0]->EsteiraContratacaoUploadConsulta->excluido = 'SIM';
            $verificaContratoAssinado[0]->EsteiraContratacaoUploadConsulta->excluido = date("Y-m-d H:i:s", time());
            // dd('NÃO', $verificaContratoAssinado[0]);
        }
        // $verificaContratoAssinado[0]->save();
        $podeArquivarDemanda = $this->arquivaDemanda((array) $verificaContratoAssinado[0]->EsteiraContratacaoUploadConsulta->idDemanda);
        dd($verificaContratoAssinado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comex\Contratacao\ContratacaoDemanda $demandaContratacao
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContratacaoDemanda $demandaContratacao, $id)
    {
        $arrayContratosDemanda = [];
        $demandaFormalizacao = ContratacaoDemanda::with(['EsteiraContratacaoUpload', 'EsteiraContratacaoUpload.EsteiraDadosContrato'])->where('TBL_EST_CONTRATACAO_DEMANDAS.idDemanda', $id)->get();

        for ($i=0; $i < sizeof($demandaFormalizacao[0]->EsteiraContratacaoUpload); $i++) { 
            switch ($demandaFormalizacao[0]->EsteiraContratacaoUpload[$i]->tipoDoDocumento) {
                case 'CONTRATACAO':
                case 'ALTERACAO':
                case 'CANCELAMENTO':
                    if($demandaFormalizacao[0]->EsteiraContratacaoUpload[$i]->EsteiraDadosContrato->statusContrato == 'CONTRATO ASSINADO'){
                        array_push($arrayContratosDemanda, $demandaFormalizacao[0]->EsteiraContratacaoUpload[$i]->EsteiraDadosContrato);
                    }
                    break;  
            }
        }
        
        return json_encode(array('listaContratosSemConformidade' => $arrayContratosDemanda), JSON_UNESCAPED_SLASHES);
    }

    public function arquivaDemanda($demanda) 
    {
        $demandaContratacao = ContratacaoDemanda::with(['EsteiraContratacaoUpload', 'EsteiraContratacaoUpload.EsteiraDadosContrato'])->whereIn('idDemanda', $demanda)->get();
        // dd($demandaContratacao);
        $naoPodeArquivar = 0;
        for ($i = 0; $i < sizeof($demandaContratacao[0]->EsteiraContratacaoUpload); $i++) { 
            switch ($demandaContratacao[0]->EsteiraContratacaoUpload[$i]->tipoDoDocumento) {
                case 'CONTRATACAO':
                case 'ALTERACAO':
                case 'CANCELAMENTO':
                    if($demandaContratacao[0]->EsteiraContratacaoUpload[$i]->EsteiraDadosContrato->statusContrato == 'CONTRATO ASSINADO' || $demandaFormalizacao[0]->EsteiraContratacaoUpload[$i]->EsteiraDadosContrato->statusContrato == 'APRESENTAR CONTRATO'){
                        $naoPodeArquivar++;
                    }
                    break;  
            }
        }

        if($naoPodeArquivar > 0) {
            dd(['reultado' => 'não pode liquidar', 'quantidade_demandas_pendentes' => $naoPodeArquivar]);
        } else {
            dd(['reultado' => 'pode liquidar', 'quantidade_demandas_pendentes' => $naoPodeArquivar]);
        }
        
        dd($demandaContratacao);
    }
}
