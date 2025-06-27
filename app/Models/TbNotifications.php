<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbNotifications extends Model
{
     protected $table = 'tb_notifications';
    //
     protected $fillable = [
        'name',
        'description',
        'timestamp',

    ];
}
