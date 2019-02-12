<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>{{ ucfirst(config('app.name')) }} - Dashboard</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="{{ url("dsbd/css/bootstrap.min.css") }}" rel="stylesheet" />
        <link href="{{ url("dsbd/css/animate.min.css") }}" rel="stylesheet"/>
        <link href="{{ url("dsbd/css/paper-dashboard.css") }}" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css' />
        <link href="{{ url("dsbd/css/themify-icons.css") }}" rel="stylesheet" />
        @yield('STYLE')
    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-background-color="black" data-active-color="primary">

                <!--
                    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
                    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
                -->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="{{ route("dashboard.init") }}" class="simple-text">
                            {{ config('app.name') }}
                        </a>
                    </div>

                    <ul class="nav">
                        @foreach($menu as $key => $obj)
                            <li class="{{ $obj->active ? 'active' : '' }}">
                                <a href="{{ $obj->url }}">
                                    <i class="ti-{{ $obj->icon }}"></i>
                                    <p>{{ $obj->name }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar bar1"></span>
                                <span class="icon-bar bar2"></span>
                                <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="#">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <form class="navbar-form" method="get"  action="{{ route("offers.index") }}" >
                                        <div class="form-group">
                                            @csrf
                                            <input type="hidden" name="searchFields" value="title;code">
                                            <input type="search" name="search" placeholder="Pesquisar por ..." class="form-control border-input" style="color:#000;border: 1px solid #CCC5B9;border-radius: 4px;padding: 10px 10px 10px 10px;" />
                                        </div>
                                    </form>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <p>{{ auth()->user()->name }}</p>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route("dashboard.profile") }}">Perfil </a></li>
                                        <li><a role="button" class="dropdown-item" id="btn-logout" href="#">Encerrar Sessão</a></li>
                                    </ul>
                                </li>
                                <li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">
                        @yield('CONTENT')
                    </div>
                </div>


                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="http://www.creative-tim.com">
                                        Creative Tim
                                    </a>
                                </li>
                                <li>
                                    <a href="http://blog.creative-tim.com">
                                        Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.creative-tim.com/license">
                                        Licenses
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright pull-right">
                            &copy; <script>document.write(new Date().getFullYear())</script>, Rei das Vendas
                        </div>
                    </div>
                </footer>

            </div>
        </div>

    </body>

    <script src="{{ url("dsbd/js/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{ url("dsbd/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ url("dsbd/js/bootstrap-checkbox.min.js") }}"></script>
    <script src="{{ url("dsbd/js/chartist.min.js") }}"></script>
    <script src="{{ url("dsbd/js/bootstrap-notify.js") }}"></script>
    <script src="{{ url("dsbd/js/dashboard.js") }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function(){
            @if(session()->has('SUCCESS'))
            swal('Tarefa Realizada com Sucesso','{{ session('SUCCESS')  }}','success')
            @endif
            @if(session()->has('WARNING'))
            swal('Atenção, verifique seus dados','{{ session('WARNING')  }}','warning')
            @endif
            @if(session()->has('ERROR'))
            swal('Não Foi possível realizar a tarefa','{{ session('ERROR')  }}','error')
            @endif
        });
    </script>
    @yield('SCRIPT')

</html>
