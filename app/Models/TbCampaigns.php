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
        'categories_id',
        'types_id',
        'amount',
    ];


    public function types()
    {
        return $this->belongsTo(TbTypes::class, 'types_id');
    }

    public function categories()
    {
        return $this->belongsTo(TbCategories::class,  'categories_id');
    }
}
