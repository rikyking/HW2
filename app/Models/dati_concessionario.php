<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class dati_concessionario extends Model
{
    protected $table='dati_conc';

    protected $fillable = [
        'nome', 'url_img','descrizione', 
    ];
}
?>