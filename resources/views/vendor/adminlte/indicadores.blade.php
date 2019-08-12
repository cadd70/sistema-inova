<!DOCTYPE html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta charset="utf-8">
    <title>@yield('tituloIndicadores')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}"> -->
    <link href="{{ asset('css/indicadores/indicadores.css') }}" rel="stylesheet">
   
    @yield('css')
    <!-- DataTables with bootstrap 3 style -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
  <body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><img src="/images/logo-caixa.png" height="25px" width="30px" alt="X"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#about">Sobre</a></li>
            <li><a href="#contact">Contato</a></li>
            
            </ul>
            <form class="navbar-right">
            <ul class="nav navbar-nav">
            <li class="dropdown dropdown-extended requestfullscreen" data-toggle="tooltip" title="Visualização em Tela cheia">
                <a href="#" onclick="toggleFullScreen()">
                    <i class="fa fa-arrows-alt"></i>
                </a>
            </li>

            <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    <img src="https://permissoes.correio.corp.caixa.gov.br/ThumbPhoto/C079436_AD.jpg" class="user-image" alt="User Image" onError="this.src='{{ asset('images/userSemFoto.jpg') }}';">
                        -->
                        <img src="http://www.sr2576.sp.caixa/2017/foto.asp?matricula={{ session()->get('matricula') }}" class="user-image" alt="User Image" onerror="this.src='{{ asset('images/userSemFoto.jpg') }}';">
                        <!-- {{-- backup <img src="http://tedx.caixa/lib/asp/foto.asp?Matricula={{session()->get('matricula')}}" class="user-image" alt="User Image" onerror="this.src='{{ asset('images/userSemFoto.jpg') }}';">  --}} -->
                        <span class="hidden-xs">{{ session()->get('primeiroNome') }}</span>
                    </a>
                    <ul class="dropdown-menu">

                        <!-- User image -->
                        <li class="user-header">
                            <p>
                                <small style="color: black">
                                    {{ session()->get('nomeCompleto') }}<br/>
                                    {{ session()->get('matricula') }}<br/>												
                                    {{ session()->get('codigoLotacaoAdministrativa') }}<br/>
                                    {{ session()->get('acessoEmpregadoEsteiraComex') }}<br/>
                                    {{ session()->get('nomeFuncao') }}<br/>											
                                </small>
                            </p>
                        </li>

                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
        
            </ul>
            
            </form>
        </div>
        </div>
    </nav>

    @yield('body')

    <section class="content">
    <div class="container-fluid">

        <div class="panel panel-default">

            <div class="panel-body">
        @yield('content')

            </div>
        </div>
    </div>

    </section>

    <footer class="footer navbar-fixed-bottom">
      <div class="container">
        <span class="text-muted pull-right"><strong>&copy; 2019 - {{ env('NOME_NOSSA_UNIDADE') }} | </strong> Equipe de Desenvolvimento de Melhorias.</span>
      </div>
    </footer>

   


  
          
     
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<!-- <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script> -->
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/telaCheia.js') }}"></script>


@yield('js')

</body>
</html>
