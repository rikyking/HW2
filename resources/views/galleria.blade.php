<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="style/mhw3.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <script src="script/apiIMG.js" defer></script>
    <title>Galleria</title>
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
                <a href="./">Galleria</a>
                <a href="{{route('VIN')}}">VIN decode</a>
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
        <h1>Photo Gallery</h1>
        <h3>Powerd by Unsplash</h3>
    </header>
    <article id="article1">
        <h1>Cerca immagini di auto e moto su Unsplash</h1>
            <form>
                <img src="images/unsplash.png">
                <div class="ricerca">
                    <img src="images/reload.ico" id="reload">
                    <input type="text" placeholder="cerca" id="inputID">
                    <select name="serch_content" id="tipo">
                        <option value="auto">auto</option>
                        <option value="moto">moto</option>
                    </select>
                    <input type="text" placeholder="page" size="1" id="page">
                    <input type="submit" value="cerca" id="submit">
                </div>
            </form>
    </article>
    <article id="contenuti">
            <!-- si riempie tramite fetch -->
    </article>
    <section id="modal-view" class="hidden">
    </section>
    <footer id="footer">
        <h2>Sito realizzato da</h2>
        <p>Riccardo Patronaggio<br>O46002300<br>Ing.Informatica M-Z <br>Università degli Studi di Catania</p>
    </footer>
</body>
</html>