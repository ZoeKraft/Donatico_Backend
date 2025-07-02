<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbCategories extends Model
{
    protected $table = 'tb_categories';


    protected $fillable = ['name'];


    public function campaigns()
    {
        return $this->hasMany(TbCampaigns::class,  'categories_id');
    }
}
