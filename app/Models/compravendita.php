<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class compravendita extends Model
{
    protected $table='compravendita';

    protected $fillable = [
        'CLIENTE', 'CODICE_VENDITORE', 'CODICE_VEICOLO', 'PREZZO', 'DATA'
    ];

    public function cliente(){
        return $this->hasMany('App\Models\cliente');
    }
    public function veicolo(){
        return $this->hasMany('App\Models\veicolo');
    }
    public function dipendente(){
        return $this->hasMany('App\Models\dipendente');
    }

}
?>