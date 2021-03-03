<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusSocio extends Model
{
    protected $table = 'cat_status_socio';
    protected $primaryKey = 'idStatusSocio';


    protected $fillable = [
        'statusSocio',
        'badgeStatusSocio',
        'eliminado'
    ];
}
