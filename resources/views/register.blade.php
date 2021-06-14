<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="{{ asset('../public/style/login.css') }}">
        <script src="{{ asset('../public/script/sing_up.js') }}" defer></script>
        <title>Sing up</title>
    </head>
    <body>
        <a href="{{ route('mhw1') }}" id="home">
            <div id="titolo">
                Auto&Moto
            </div>
        </a>
        <section class="sec-box">
            <div class="hidden"  id="req-box">
                <ul>
                La password deve avare:
                    <li>Min 8 max 20 caratteri</li>
                    <li>Almeno una lettera maiusciola e una minuscola</li>
                    <li>Almeno un numero</li>
                    <li>Almeno un simbolo tra _.\-()?#;:!@</li>
                </ul>
            </div>
            <div class="singup-box">
                <h1>Registrazione</h1>
                <form action="{{route('register')}}" name="form_login" method="POST">
                    @csrf
                    <div class="txt_field" id="idNome">
                        <input type="text" placeholder="Nome" id="nome" name="nome" required>
                        <span></span>
                        <span class="errore">Nome non valido</span>
                    </div>
                    <div class="txt_field" id="idCognome">
                        <input type="text" placeholder="Cognome" id="cognome" name="cognome" required>
                        <span></span>
                        <span class="errore">Cognome non valido</span>
                    </div>
                    <div class="txt_field" id="idCompleanno">
                        <input type="text" placeholder="Data di nascita(yyyy-mm-dd)" id="compleanno" name="compleanno" required>
                        <span></span>
                        <span class="errore">Data non valida</span>
                    </div>
                    <div class="txt_field" id="idCF">
                        <input type="text" placeholder="Code fiscale" id="CF" name="CF" required>
                        <span></span>
                        <span class="errore">Codice fiscale non valido,7 caratteri MAX</span>
                    </div>
                    <div class="txt_field" id="idUsername">
                        <input type="text" placeholder="Username" id="username" name="username" required>
                        <span></span>
                        <span class="errore">Username non valido</span>
                    </div>
                    <div class="txt_field" id="idPassword">
                        <input type="password" placeholder="Password" id="password" name="password" required>
                        <span></span>
                        <span class="errore">Password non valida</span>
                    </div>
                    <div class="show-pass">
                        <input type="checkbox" id="mostra_pass">
                        <label id="showtext">Mostra password</label> <br>
                        <a id="info">Info password</a>
                    </div>             
                    <input type="submit" value="Registrati" id="sub" name="registrati" disabled>
                    <div class="sing_up">
                    Hai già un account? <a href="{{ route('login') }}">Login</a>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>