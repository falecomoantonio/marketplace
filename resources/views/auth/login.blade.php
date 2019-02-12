<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="">
        <meta name="author" content="@reidasvendas" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Autenticação - {{ config('app.name') }}</title>
        <link href="{{ url("css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ url("css/auth.css") }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous" />
    </head>

    <body class="text-center">

        <form class="form-signin" method="post" action="{{ url('login') }}">
            @csrf
            @method('POST')
            <h1 class="h3 mb-3 font-weight-normal">Autenticação</h1>

            @if($errors->has('email') || $errors->has('password'))
                @component('components.alert',['className'=>'warning','message'=>'Credenciais Inválidas!'])
                @endcomponent
            @endif

            @if($errors->has('g-recaptcha-response'))
                @component('components.alert',['className'=>'warning','message'=>'ReCaptcha inválido'])
                @endcomponent
            @endif

            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" maxlength="120" id="inputEmail" class="form-control" placeholder="Email ou Username" name="email" required autofocus />
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required  name="password" />
            <div style="padding-bottom: 10px;">{!! NoCaptcha::display() !!}</div>
            <button type="submit" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sessão</button>
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">Esqueceu a senha?</a>
            @endif
            <p class="mt-5 mb-3 text-muted">&copy; {{ ucfirst(config('app.name')) }}</p>
        </form>
        {!! NoCaptcha::renderJs() !!}
    </body>
</html>
