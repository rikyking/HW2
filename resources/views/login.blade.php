<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('../public/style/login.css') }}">
    <script src="{{ asset('../public/script/login.js') }}" defer></script>
    <title>Login</title>
</head>
<body>
    <a href="{{ route('mhw1') }}" id="home">
        <div id="titolo">
            Auto&Moto
        </div>
    </a>
    <section class="sec-box">
        <div class="login-box">
            <h1>Login</h1>
            @if(Session::has('errors'))
 	            {{Session::get('errors')->first()}}
            @endif
            <form action="{{ route('login') }}" name="form_login" method="POST">
            @csrf
                <div class="txt_field" id="idUsername">
                    <input type="text" placeholder="Username" id="username" name="username" required>
                    <span></span>
                    <span class="errore"></span>
                </div>
                <div class="txt_field" id="idPassword">
                    <input type="password" placeholder="Password" id="password" name="password" required>
                    <span></span>
                    <span class="errore"></span>
                </div>
                <div class="show-pass">
                    <input type="checkbox" id="mostra_pass">
                    <label id="showtext">Mostra password</label>
                </div>             
                <input type="submit" value="Login" id="sub" name="login" disable>
                <div class="sing_up">
                    Non sei registrato? <a href="{{ route('register') }}">Registrati</a>
                </div>
            </form>
        </div>
    </section>
</body>
</html>