<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class cliente extends Model
{
    protected $table='cliente';

    protected $fillable = [
        'CF', 'NOME', 'COGNOME', 'eta', 'DATA_NASCITA'
    ];

    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    public function compravendita(){
        return $this->belongsTo('App\Models\compravendita');
    }
}
?>
