<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class dipendente extends Model
{
    protected $table='dipendente';

    protected $fillable = [
        'CODICE','CONCESSIONARIO','CF', 'NOME', 'COGNOME', 
    ];

    public function compravendita(){
        return $this->belongsTo('App\Models\compravendita');
    }
    public function concessionario(){
        return $this->hasOne('App\Models\concessionario');
    }
}
?>