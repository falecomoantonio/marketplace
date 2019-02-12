<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="">
        <meta name="author" content="@reidasvendas" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="" />
        <title>Minhas Ofertas - {{ config('app.name') }}</title>
        <link href="{{ url("css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ url("css/marketplace.css") }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous" />
        @yield('STYLE')
    </head>
    <body>

        <header>
            <div class="collapse bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">Quem Somos</h4>
                            <p class="text-muted">
                                Bem vindo(a) ao site do Rei das Vendas, aqui você encontrará as melhores ofertas do Sertão Central Cearense.
                                <br />
                                Somos representantes comerciais e nossos produtos vem diretamente dos distribuidores.
                            </p>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">{{ ucfirst(config('app.name')) }}</h4>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('app.search') }}" class="text-white">Pesquisar</a></li>
                                <li><a href="{{ url('login') }}" class="text-white">Log In</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container d-flex justify-content-between">
                    <a href="{{ route('app.init') }}" class="navbar-brand d-flex align-items-center">
                        <i class="fas fa-bullhorn"></i> <span style="margin-left:10px;"><strong>{{ ucfirst(config('app.name')) }}</strong></span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </header>

        <main role="main">

            @yield('CONTENT')

        </main>

        <footer class="text-muted">
            <div class="container">
                <p class="float-left">
                    &copy; Paulo Vitor - Rei das Vendas
                </p>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="{{ url("js/popper.min.js") }}"></script>
        <script src="{{ url("js/bootstrap.min.js") }}"></script>
        <script src="{{ url("js/holder.min.js") }}"></script>
        <!-- WhatsHelp.io widget -->
        <script type="text/javascript">
            (function () {
                var options = {
                    facebook: "1951344745095008", // Facebook page ID
                    whatsapp: "+55 (88) 9 9927-2210", // WhatsApp number
                    call_to_action: "Entre em Contato", // Call to action
                    button_color: "#129BF4", // Color of button
                    position: "right", // Position may be 'right' or 'left'
                    order: "facebook,whatsapp", // Order of buttons
                };
                var proto = document.location.protocol,
                    host = "whatshelp.io",
                    url = proto + "//static." + host;
                var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = url + '/widget-send-button/js/init.js';

                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
        </script>
        <!-- /WhatsHelp.io widget -->
        @yield('SCRIPT')
    </body>
</html>