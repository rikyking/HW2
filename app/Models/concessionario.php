<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class concessionario extends Model
{
    protected $table='concessionario';

    protected $fillable = [
        'NOME', 'CODICE','VIA', 
    ];

    public function dipendente(){
        return $this->hasMany('App\Models\dipendente');
    }
}
?>