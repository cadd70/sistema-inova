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

        <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-exchange"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">Ordens de Pagamento </span>
                      <span class="info-box-number">Hoje: 27<small></small></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-download"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">Liquidação ACC/ACE</span>
                      <span class="info-box-number">Hoje: 01 </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
        
                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>
        
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-ship"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">Importação/Exportação - Antecipados</span>
                      <span class="info-box-number">Hoje: 05</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">Qualidade Atendimento </span>
                      <span class="info-box-number">Nota 4.97</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>


<div class="panel panel-default">

<div class="panel-body">
    
    <div class="page-bar">
        <h3>Posição de <span id="mes-atual"></span>
            <br>
                <small class="text-left">Resultados das Operações de Comércio Exterior</small>
            
        </h3>
    </div>


<!-- primeira linha -->
   


<div class="row">
<!-- <div class="col-md-6 col-sm-12"></div> -->
    <div class="col-md-6 col-sm-12">
       
                    @component('Componentes.mapa')
                    @section('tituloBoxMapa')
                    Contratos ACC/ACE por Região
                    @endsection
                    @section('subtituloBoxMapa')
                    Quantidade de contratos por região do Brasil
                    @endsection
                    @endcomponent
         
    </div>
<div>
<!-- </div> -->
<div class="row">
    <div class="col-md-6">
        <div class="box box-info ">
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
                    <div class="col-12 col-md-12">
                        <canvas class="box" id="graficoOP" height="100" width="222" style="position: relative width: 222px; height: 100px;"></canvas>
                    </div>
                </div>
             </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-info ">
            <div class="box-header with-border">
            <h3 class="box-title">Cadastro Email COMEX</h3>
                <h5 class="text-center">Quantidades de clientes com Emails cadastrados para recebimento de aviso de chegada de OP</h5>
         
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
                <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
               
                    <div class="col-12 col-md-12">
                        
                        <!-- <h5 class="text-center">Quantidades de clientes x Emails cadastrados para recebimento de aviso de chegada de OP</h5>  -->
                        <canvas id="clientesComEmail" height="90" width="222" style="position: relative width: 222px; height: 90px;"></canvas>
                        
                    </div>
                </div>
                <!-- <div class ="row"> -->
                    <!-- <div class="col-6 col-md-6"></div> -->
                    <!-- <div class="col-6 col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow">OP</span>

                            <div class="info-box-content">
                                <span class="info-box-text text-center">OP Recebidas/hoje</span>
                                <span id="op-recebida"class="info-box-number text-center"></span>
                            </div>
                        </div>
                    </div>  -->
                    <!-- <div class="col-3 col-md-3"></div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>

</div>

<!-- linha -->
<div class = "row">
    <div class="col-md-12">
        <div class="box box-warning ">
            <div class="box-header with-border">
            <h3 class="box-title">ACC/ACE</h3>

            <h5 class="text-left">Analises das solicitações de liquidação ACC/ACE</h5>

            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                A consectetur neque cumque cupiditate voluptates quaerat ut delectus mollitia nemo, 
                blanditiis exercitationem maiores error. Nobis perferendis autem magnam itaque consequatur earum.
            </p>
            
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="tabbable page-tabs">
                    <ul class="nav nav-tabs" id="abas">
                        <li class="active" id="abaAccDia">
                        <a  href="#liquidacaoDia" data-toggle="tab"><i class="icon-paragraph-justify2"></i> Liquidadas Dia  </a></li>
                        <li id="abaAccMes"><a href="#liquidacaoMes" data-toggle="tab"><i class="icon-exit4"></i> Liquidadas Mês </a></li>                </ul>    
                    </ul>
                    <div class="tab-content">
            
                        <div class="tab-pane active fade in" id="liquidacaoDia">
                        <!-- <div class="col-2"></div> -->
                            <div class="box chart col-8 col-md-8">
                            <canvas id="analisesAccAce30dias" style="position: relative height: 250px; width: 950px;" width="950" height="250"></canvas>
                            </div>
                        </div>
                        <!-- <div class="col-2"></div> -->


                        <!-- <div class="col-2"></div> -->
                        
                        <div class="tab-pane" id="liquidacaoMes">
                            <div class="box chart col-8 col-md-8">
                            <canvas id="analisesAccAceMensal" style="position: relative height: 250px; width: 950px;" width="950" height="250"></canvas>
                            </div>
                        </div>
                        <!-- <div class="col-2"></div> -->


              
                    </div>
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
        <!-- <div class="col-md-1 col-sm-0 col-xs-1"></div> -->
        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="box-body" style="">

                <div class="small-box bg-blue">
                    <div class="inner">
                    <h4 class="text-center">Contratadas/Mês</h4>
                    <p id="contratado" class="text-center"></p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-pencil"></i>
                    </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>

                <!-- <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-pencil "></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Contratadas/Mês</span>
                    <span id="contratado"class="info-box-number"></span>
                    </div>
                </div> -->

            </div>
        </div>

        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="box-body" style="">

                <div class="small-box bg-blue">
                    <div class="inner">
                    <h4 class="text-center">Conforme/Mês</h4>
                    <p id="conforme" class="text-center"></p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-check"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
                <!-- <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-check"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Conforme/Mês</span>
                    <span id="conforme" class="info-box-number"></span>
                    </div>
                </div> -->

            </div>
        </div>
        <div class="col-md-1 col-sm-0 col-xs-1"></div>
        <!-- <div class="box"> -->
        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="box-body" style="">

                <!-- <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-times"></i></span> -->

                <div class="small-box bg-yellow">
                    <div class="inner">
                    <h4 class="text-center">Bloqueado/Mês</h4>
                    <p id="bloqueado" class="text-center"></p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-times"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
                    <!-- <div class="info-box-content">
                    <span class="info-box-text">Bloqueado/Mês</span>
                    <span id ="bloqueado"class="info-box-number"></span>
                    </div> -->
                <!-- </div> -->
            <!-- </div> -->
            </div>

        </div>

    <!-- <div class="row"> -->
        <!-- <div class="col-md-2 col-sm-6 col-xs-12"></div> -->
        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="box-body" style="">

                <div class="small-box bg-yellow">
                    <div class="inner">
                    <h4 class="text-center">Reiterado/Mês</h4>
                    <p id="reiterado" class="text-center"></p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-exclamation-circle"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
                <!-- <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-exclamation-circle "></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Reiterado/Mês</span>
                    <span id="reiterado" class="info-box-number"></span>
                    </div>
                    
                </div> -->

            </div>
        </div>

        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="box-body" style="">

                <div class="small-box bg-yellow">
                    <div class="inner">
                    <h4 class="text-center">Cobrado/Mês</h4>
                    <p id="cobrado" class="text-center"></p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-external-link"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
                <!-- <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-external-link "></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Cobrado/Mês</span>
                    <span id="cobrado" class="info-box-number"></span>
                    </div>
                  
                </div> -->

            </div>
        </div>
        <!-- </div> -->
        <!-- <div class="col-md-2 col-sm-6 col-xs-12"></div> -->
        <div class="col-md-1 col-sm-1 col-xs-1"></div>
    
    </div><!--/row-->

    <div class="row">
        <div class="col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-md-10 col-sm-12 col-xs-12">
            <div class="box-body" style="">
                <div class="chart">
                    <canvas id="antecipados" style="position: relative height: 100px; width: 800px;" width="600" height="100"></canvas>
                </div>
            </div>
            
        </div>
        <div class="col-md-1 col-sm-6 col-xs-12"></div>
    </div><!--/row-->
    
    <div class="box-footer text-center" style="">
        
    </div><!--/footer-->
           
</div> <!--/box-->

<!-- terceira linha -->
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">ATENDIMENTO MIDDLE</h3>
        <h5 class="text-left">Resultados referentes aos atendimentos prestados pelo Middle Office</h5>
        <h5 class="text-left">Para mais informações<a href="http://www.ceopc.hom.sp.caixa/atendimento_web/view/indicadores_atendimento_middle.php"> Clique Aqui</a></h5>
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
                <span class="info-box-number text-center">162</span>
                </div>
               
            </div>

        </div>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="box-body" style="">

            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-phone"></i>
                </span>

                <div class="info-box-content">
                <span class="info-box-text text-center"><strong>Canal Atendimento</strong></span>
                <div class="col-md-4 col-sm-4 col-xs-6">
                <span class="info-box-text">Email</span>
                <span class="info-box-number">107</span> 
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6"> 
                <span class="info-box-text">Lync</span>
                <span class="info-box-number">44</span>  
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                <span class="info-box-text">Telefone</span>
                <span class="info-box-number">11</span>
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
 
    <!-- <div class="col-md-2 col-sm-6 col-xs-12"></div> -->
    <div class="col-md-4 col-sm-6 col-xs-12 align-center">
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

    <div class="col-md-4 col-sm-6 col-xs-12 align-center">
        <div class="box-body" style="">

            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-hourglass-o"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Tempo Médio de Atendimento</span>
                <span class="info-box-number">0</span>
                <span class="info-box-text">Dia</span>
                </div>
                
            </div>

        </div>
    </div>
    <!-- <div class="col-md-2 col-sm-6 col-xs-12"></div> -->

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
  <link href="{{ asset('css/mapa.css') }}" rel="stylesheet">

@stop

@section('js')
<script src="{{ asset('vendor/adminlte/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/adminlte/dist/js/chartjs1.0.2.js') }}"></script>
  <!-- <script src="{{asset('js/app.js')}}"></script> -->
  <script src="{{asset('js/indicadores/indicadores-comex.js')}}"></script>

 
@stop