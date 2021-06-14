<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/mhw3.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <script src="script/apiVIN.js" defer></script>
    <title>VIN</title>
</head>
<body> 
    <header>
        <nav>       
            <a href="{{route('mhw1')}}" id="home">
                <div id="titolo">
                    Auto&Moto
                </div>
            </a>
            <div id="menu">
                <a href="{{route('mhw1')}}">Concessionari</a>
                <a href="{{route('galleria')}}">Galleria</a>
                <a href="./">VIN decode</a>
                <a href="{{ route('login') }}">
                <?php 
                    $id_session=Session::get('id_session');
                    if(isset($id_session)!=0){
                        echo Session::get('username');
                    }else 
                        echo "Area personale"
                ?></a>
                <a href="#footer">Contatti</a>
            </div>
        </nav>
        <h1>VIN decode</h1>
    </header>
    <article id="article1">
        <h1>Cosa è il VIN?</h1>
        <p>Il numero di identificazione del veicolo, meglio noto come numero di telaio (Vehicle Identification Number), 
            <br>è un codice univoco alfanumerico che include un numero di serie, utilizzato dal settore automobilistico <br>per l'identificazione dei singoli autoveicoli, dei rimorchi, dei motocicli, degli scooter e dei ciclomotori. <br> <strong>Il nostro sito offre la possibilità di decodificare il codice VIN per repire informazioni sul vieicolo.</strong></p>
            <form>
                <div class="ricerca">
                    <img src="images/reload.ico" id="reload">
                    <input type="text" placeholder="Inserisci il VIN" id="VIN">
                    <input type="submit" value="Decodifica" id="cercaVIN">
                </div>
            </form>
    </article>
    <article id="contenuti">

    </article>
    <footer id="footer">
        <h2>Sito realizzato da</h2>
        <p>Riccardo Patronaggio<br>O46002300<br>Ing.Informatica M-Z <br>Università degli Studi di Catania</p>
    </footer>
</body>
</html>