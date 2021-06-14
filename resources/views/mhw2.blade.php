<?php
    $id_session=Session::get('id_session');
    if(isset($id_session)!=0){
        $var=true;
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../public/style/mhw2.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
    
    <script src="{{asset('../public/script/script.js')}}" defer></script>
    
    <title>{{request()->route('q')}}</title>
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
                <a href="{{ route('login') }}">
                <?php 
                if(isset($var) && $var==true){
                    echo Session::get('username');
                }else 
                    echo "Area personale"?></a>
                <a href="#footer">Contatti</a>
            </div>
            <input type="hidden" id="isLog" value="<?php 
                if(isset($var) && $var==true){
                    echo $var;
                }?>"
            >
            <input type="hidden" id="session" value="<?php
                if(isset($var) && $var==true){
                    echo Session::get('id_session');
                }?>"
            >
        </nav>
        <img id="logo">
        <h1>{{request()->route('q')}}</h1>
    </header>
    
    <article>   
        <div class="hidden" id="testoPref">
            <h1>Preferiti</h1>
        </div>
        <section class="hidden" id="preferiti"> 
            <!--Si riempie in automatico con la fetch-->
        </section>
        <div id="titolo-box">
            <h1>Ricerca le auto e moto disponibili</h1>
            <p>Ricerca auto e moto, e aggiungi i tuoi veicoli ai preferiti. Per acquistare un veicolo vai all'area personale</p>
        </div>
        <div class="ricerca">
            <input type="text" placeholder="Cerca" id="box-ricerca">
        </div>
        <section class="griglia" id="id-griglia">
            <!--Si riempie in automatico con la fetch-->
        </section>
    </article>
    <footer id="footer">
        <h2>Sito realizzato da</h2>
        <p>Riccardo Patronaggio<br>O46002300<br>Ing.Informatica M-Z <br>Università degli Studi di Catania</p>
    </footer>
</body>
</html>