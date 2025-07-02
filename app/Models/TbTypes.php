<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TbTypes extends Model
{
    protected $table = 'tb_types';
    //
    protected $fillable = ['name'];


    public function campaigns()
    {
        return $this->hasMany(TbCampaigns::class, 'type_id')
                    ->withTimestamps();

    }
}
