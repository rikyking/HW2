<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view('mhw1');
})->name("mhw1");


Route::get("/login", "LoginController@login")->name("login");
Route::get("/logout", "LoginController@logout")->name("logout");
Route::post("/login", "LoginController@checkLogin");

Route::get("/home", function () {
    if(Session::get('id_session')!=0){
        return view('home');
    }
    return redirect('login');
})->name("home");

Route::get('/register', "RegisterController@index")->name('register');
Route::post('/register', "RegisterController@create");
Route::get("/register/username/{q}", "RegisterController@checkUsername");
Route::get("/register/CF/{q}", "RegisterController@checkCF");


Route::get("/dati_auto","LoadDataController@veicoliHome");
Route::get("/veicoli/nome/{q}","LoadDataController@datiConc");
Route::get("/concessionario/nome/{q}", function () {
    return view('mhw2');
})->name("mhw2");

Route::get("/carica_preferiti/nomeConc/{q}", "LoadDataController@caricaPreferiti");
Route::get("/aggiungi_preferiti/data_id/{q}/nome/{n}", "LoadDataController@inserisciPreferiti");
Route::get("/rimuovi_preferiti/data_id/{q}/nome/{n}", "LoadDataController@rimuoviPreferiti");

Route::get("/galleria", function () {
    return view('galleria');
})->name("galleria");
Route::get("/serch/unsplash/page/{p}/content/{c}/serch/{s}","ApiController@unsplash");

Route::get("/VIN", function () {
    return view('VIN');
})->name("VIN");
Route::get("/VIN/decode/{vin}","ApiController@VIN");


Route::get("/storico_acquisti","HomeController@dati_utente");
Route::get("/spesa_totale","HomeController@spesa_utente");
Route::get("/stampa_auto","HomeController@stampa_auto");
Route::get("/compra_auto","HomeController@compra_auto");

Route::get("/error", function () {
    return view('error');
});
Route::get("/checkCf/cf/{cf}","HomeController@checkCF");
Route::get("/checkSconto/cf/{cf}","HomeController@checkSconto");
Route::get("/sconto","HomeController@applicaSconto");


