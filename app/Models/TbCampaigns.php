<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbCampaigns extends Model
{

    protected $table = 'tb_campaigns';
    //
     protected $fillable = [
        'img',
        'name',
        'description',
        'location',
        'category',
        'type',
        'amount',
    ];
}
