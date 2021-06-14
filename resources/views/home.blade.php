<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="{{ asset('../public/style/mhw3.css') }}">
        <script src="{{ asset('../public/script/fetch_dati_utente.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
        <title>Home</title>
    </head>
    <body>
        <header>
            <nav>       
            <a href="{{ route('mhw1') }}" id="home">
                <div id="titolo">
                    Auto&Moto
                </div>
            </a>
                <div id="menu">
                    <a href="{{ route('mhw1') }}">Concessionari</a>
                    <a href="{{ route('galleria') }}">Galleria</a>
                    <a href="{{route('VIN')}}">VIN decode</a>
                    <a href="{{ route('logout') }}">Logout</a>
                    <a href="#footer">Contatti</a>
                </div>
            </nav>
            <h1>Benvenuto <?php echo Session::get('username');?></h1>
            @if (\Session::has('success_buy'))
                <?php
                    echo "<script type='text/javascript'>alert('Acqusto effettuato con successo')</script>"
                ?>
            @elseif(\Session::has('success_discount'))
                <?php
                    echo "<script type='text/javascript'>alert('Sconto applicato')</script>"
                ?>
            @endif
        </header>
        <article id="article1">
            <section id="button">
                <div class="pulsanti" id="pulsante1"><p>Storico acquisti</p></div>
                <div class="pulsanti" id="pulsante2"><p>Compra veicolo</p></div>
                <div class="pulsanti" id="pulsante3"><p>Richiedi sconto</p></div>
            </section>
        </article>
        <article id="sezione" class="hidden">
          @csrf
            <!-- si riempie tramite fetch -->
        </article>
        <footer id="footer">
            <h2>Sito realizzato da</h2>
            <p>Riccardo Patronaggio<br>O46002300<br>Ing.Informatica M-Z<br>Università degli Studi di Catania</p>
        </footer>
    </body>
</html>