@extends('adminlte::page')

@section('title', 'EsteiraComex - Painel de Indicadores')

@section('content_header')
<div class="panel-body padding015">
    <h4 class="animated bounceInLeft pull-left">
        Indicadores | 
        <small> Relatórios de Operações CEOPA </small>
    </h4>
    
    <ol class="breadcrumb pull-right">
        <li><a href="#"><i class="fa fa-dashboard"></i> Indicadores</a></li>
        <li><a href="#"></i> Painel de Indicadores</a></li>
    </ol>
</div>

@stop

@section('content')

<div class="container-fluid">

<div class="panel panel-default">

<div class="panel-body">
    
    <div class="page-bar">
        <h3>Posição de <span id="mes-atual"></span>
            <br>
                <small class="text-left">Resultados das Operações de Comércio Exterior</small>
            
        </h3>
    </div>

    <div class="col-md-12">
        <ul class="timeline timeline-horizontal">
                <li class="timeline-item">
                    <div class="timeline-badge primary"><i class="glyphicon glyphicon-check"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Ordens de Pagamento</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> Atualizado hoje as 10 horas</small></p>
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis faiz elementum girarzis, nisi eros gostis.</p>
                        </div>
                    </div>
                </li>

                <li class="timeline-item">
                    <div class="timeline-badge primary"><i class="glyphicon glyphicon-check"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Rotina de Liquidação - ACC/ACE</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> Atualizado hoje as 15 horas</small></p>
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis faiz elementum girarzis, nisi eros gostis.</p>
                        </div>
                    </div>
                </li>

                <li class="timeline-item">
                    <div class="timeline-badge primary"><i class="glyphicon glyphicon-check"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Câmbio Pronto</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> Atualizado hoje as 15 horas</small></p>
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis faiz elementum girarzis, nisi eros gostis.</p>
                        </div>
                    </div>
                </li>

                <li class="timeline-item">
                    <div class="timeline-badge primary"><i class="glyphicon glyphicon-check"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Qualidade do Atendimento </h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> Atualizado hoje as 15 horas</small></p>
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis faiz elementum girarzis, nisi eros gostis.</p>
                        </div>
                    </div>
                </li>

        </ul>

      
        
    </div>



<!-- primeira linha -->
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning ">
            <div class="box-header with-border">
            <h3 class="box-title">ORDENS DE PAGAMENTO</h3>
                <h5 class="text-left">Aviso de ordens de pagamento recebidas</h5>
         
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
                <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <canvas id="graficoOP" height="100" width="222" style="width: 222px; height: 100px;"></canvas>
                    </div>
                <!-- </div> -->
                <!-- <div class="row"> -->
                    <div class="col-6 col-md-6">
                        
                        <h5 class="text-center">Quantidades de clientes x Emails cadastrados para recebimento de aviso de chegada de OP</h5> 
                        <canvas id="clientesComEmail" height="80" width="222" style="width: 222px; height: 80px;"></canvas>
                        
                    </div>
                </div>
                <div class ="row">
                    <!-- <div class="col-6 col-md-6"></div> -->
                    <div class="col-6 col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow">OP</span>

                            <div class="info-box-content">
                                <span class="info-box-text text-center">OP Recebidas/hoje</span>
                                <span id="op-recebida"class="info-box-number text-center"></span>
                            </div>
                        </div>
                    </div> 
                    <!-- <div class="col-3 col-md-3"></div> -->
                </div>
            </div>
        </div>
    </div>

</div>
<div class = "row">
    <div class="col-md-12">
        <div class="box box-warning ">
            <div class="box-header with-border">
            <h3 class="box-title">ACC/ACE</h3>
            <h5 class="text-left">Analises/Mês</h5>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
               
            <div class="box-body">

                <div class="chart col-12 col-md-12">
                <canvas id="analisesAccAce30dias" style="height: 250px; width: 752px;" width="752" height="250"></canvas>
                </div>

                <div class="chart col-12 col-md-12">
                <canvas id="analisesAccAceMensal" style="height: 250px; width: 752px;" width="752" height="250"></canvas>
                </div>

            </div>
                     
        </div>
    </div>
</div> <!--/.row -->

 <!-- segunda linha -->

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">ANTECIPADOS</h3>
        <h5 class="text-left">Conformidade Pronto/Importação/Exportação</h5>
 
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    
    <div class="row">

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="box-body" style="">

                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-pencil "></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Contratadas/Mês</span>
                    <span id="contratado"class="info-box-number"></span>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="box-body" style="">

                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-check"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Conforme/Mês</span>
                    <span id="conforme" class="info-box-number"></span>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="box-body" style="">

                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-times"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Bloqueado/Mês</span>
                    <span id ="bloqueado"class="info-box-number"></span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-2 col-sm-6 col-xs-12"></div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="box-body" style="">

                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-exclamation-circle "></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Reiterado/Mês</span>
                    <span id="reiterado" class="info-box-number"></span>
                    </div>
                    
                </div>

            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="box-body" style="">

                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-external-link "></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Cobrado/Mês</span>
                    <span id="cobrado" class="info-box-number"></span>
                    </div>
                  
                </div>

            </div>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12"></div>
    
    </div>

    <div class="row">
        <div class="col-md-1 col-sm-6 col-xs-12"></div>
        <div class="col-md-10 col-sm-6 col-xs-12">
            <div class="box-body" style="">
                <div class="chart">
                    <canvas id="antecipados" style="height: 150px; width: 800px;" width="600" height="150"></canvas>
                </div>
            </div>
            
        </div>
        <div class="col-md-1 col-sm-6 col-xs-12"></div>
    </div>
    
    <div class="box-footer text-center" style="">
        
    </div>
           
</div> <!--/box-->

<!-- terceira linha -->
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">ATENDIMENTO MIDDLE</h3>
        <h5 class="text-left">Resultados referentes aos atendimentos prestados pelo Middle Office</h5>
 
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="box-body" style="">

            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-star-o"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Média Nota/Mês</span>
                <span class="info-box-number">4</span>
                </div>
                
            </div>

        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="box-body" style="">

            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-user-o"></i></span>

                <div class="info-box-content">
                <span class="info-box-text text-center">Rotina/</span>
                <span class="info-box-text text-center">Consultoria</span>
                <span class="info-box-number text-center">800</span>
                </div>
               
            </div>

        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box-body" style="">

            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-phone"></i>
                </span>

                <div class="info-box-content">
                <span class="info-box-text text-center"><strong>Canal Atendimento</strong></span>
                <div class="col-md-4 col-sm-6 col-xs-12">
                <span class="info-box-text">Email</span>
                <span class="info-box-number">450</span> 
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12"> 
                <span class="info-box-text">Lync</span>
                <span class="info-box-number">250</span>  
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                <span class="info-box-text">Telefone</span>
                <span class="info-box-number">100</span>
                </div>
                </div>
               
            </div>

        </div>
    </div>
    
    <div class="box-footer text-center" style="">
        
    </div>

</div><!--/box-->

<!-- quarta linha -->

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">CONQUISTE</h3>
 
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
 
    <div class="col-md-2 col-sm-6 col-xs-12"></div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="box-body" style="">

            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-hourglass"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Tempo Médio de Atendimento</span>
                <span class="info-box-number">0</span>
                <span class="info-box-text">Mês</span>
                </div>
             
            </div>

        </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="box-body" style="">

            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-hourglass-o"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Tempo Médio de Atendimento</span>
                <span class="info-box-number">1</span>
                <span class="info-box-text">Dia</span>
                </div>
                
            </div>

        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12"></div>

    <div class="box-footer text-center" style="">
        
    </div>
        
</div> <!--/box-->

</div>  <!--/panel-body-->

</div>  <!--/panel panel-default-->

</div>  <!--/container-fluid-->



@stop

@section('css')

  <link href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/contratacao/cadastro.css') }}" rel="stylesheet">

<style>
  /* Timeline */
.timeline,
.timeline-horizontal {
  list-style: none;
  padding: 20px;
  position: flex;
}
.timeline:before {
  top: 5px;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #eeeeee;
  left: 50%;
  margin-left: -1.5px;
}
.timeline .timeline-item {
  margin-bottom: 20px;
  position: flex-item;
}
.timeline .timeline-item:before,
.timeline .timeline-item:after {
  content: "";
  display: table;
}
.timeline .timeline-item:after {
  clear: both;
}
.timeline .timeline-item .timeline-badge {
  color: #fff;
  width: 54px;
  height: 54px;
  line-height: 52px;
  font-size: 22px;
  text-align: center;
  position: absolute;
  top: 5px;
  left: 50%;
  margin-left: -25px;
  background-color: #7c7c7c;
  border: 3px solid #ffffff;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}
.timeline .timeline-item .timeline-badge i,
.timeline .timeline-item .timeline-badge .fa,
.timeline .timeline-item .timeline-badge .glyphicon {
  top: 2px;
  left: 0px;
}
.timeline .timeline-item .timeline-badge.primary {
  background-color: #1f9eba;
}
.timeline .timeline-item .timeline-badge.info {
  background-color: #5bc0de;
}
.timeline .timeline-item .timeline-badge.success {
  background-color: #59ba1f;
}
.timeline .timeline-item .timeline-badge.warning {
  background-color: #d1bd10;
}
.timeline .timeline-item .timeline-badge.danger {
  background-color: #ba1f1f;
}
.timeline .timeline-item .timeline-panel {
  position: relative;
  width: 46%;
  float: left;
  right: 1em;
  border: 1px solid #c0c0c0;
  background: #ffffff;
  border-radius: 2px;
  padding: 1.2em;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}
.timeline .timeline-item .timeline-panel:before {
  position: absolute;
  top: 5px;
  right: -1em;
  display: flex;
  border-top: 16px solid transparent;
  border-left: 16px solid #c0c0c0;
  border-right: 0 solid #c0c0c0;
  border-bottom: 16px solid transparent;
  content: " ";
}
.timeline .timeline-item .timeline-panel .timeline-title {
  margin-top: 0;
  color: inherit;
}
.timeline .timeline-item .timeline-panel .timeline-body > p,
.timeline .timeline-item .timeline-panel .timeline-body > ul {
  margin-bottom: 0;
}
.timeline .timeline-item .timeline-panel .timeline-body > p + p {
  margin-top: 5px;
}
.timeline .timeline-item:last-child:nth-child(even) {
  float: right;
}
.timeline .timeline-item:nth-child(even) .timeline-panel {
  float: right;
  left: 16px;
}
.timeline .timeline-item:nth-child(even) .timeline-panel:before {
  border-left-width: 0;
  border-right-width: 14px;
  left: -14px;
  right: auto;
}
.timeline-horizontal {
  list-style: none;
  position: relative;
  padding: 20px 0px 20px 0px;
  display: inline-block;
}
.timeline-horizontal:before {
  height: 3px;
  top: auto;
  bottom: 26px;
  left: 56px;
  right: 0;
  width: 100%;
  margin-bottom: 20px;
}
.timeline-horizontal .timeline-item {
  display: table-cell;
  height: 280px;
  width: 20%;
  min-width: 320px;
  float: none !important;
  padding-left: 0px;
  padding-right: 20px;
  margin: 0 auto;
  vertical-align: bottom;
}
.timeline-horizontal .timeline-item .timeline-panel {
  top: auto;
  bottom: 64px;
  display: inline-block;
  float: none !important;
  left: 0 !important;
  right: 0 !important;
  width: 100%;
  margin-bottom: 20px;
}
.timeline-horizontal .timeline-item .timeline-panel:before {
  top: auto;
  bottom: -16px;
  left: 28px !important;
  right: auto;
  border-right: 16px solid transparent !important;
  border-top: 16px solid #c0c0c0 !important;
  border-bottom: 0 solid #c0c0c0 !important;
  border-left: 16px solid transparent !important;
}
.timeline-horizontal .timeline-item:before,
.timeline-horizontal .timeline-item:after {
  display: none;
}
.timeline-horizontal .timeline-item .timeline-badge {
  top: auto;
  bottom: 0px;
  left: 43px;
}

</style>

@stop

@section('js')
<script src="{{ asset('vendor/adminlte/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/adminlte/dist/js/chartjs1.0.2.js') }}"></script>
  <!-- <script src="{{asset('js/app.js')}}"></script> -->
  <script src="{{asset('js/indicadores/indicadores-comex.js')}}"></script>



 
@stop