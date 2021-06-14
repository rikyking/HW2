<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class veicolo extends Model
{
    protected $table='veicolo';

    protected $fillable = [
        'CODICE', 'NOME', 'MODELLO', 'QUANTITA_DISPONIBILI'
    ];

    public function compravendita(){
        return $this->belongsTo('App\Models\compravendita');
    }
}
?>