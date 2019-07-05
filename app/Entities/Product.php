<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['instituition_id', 'name', 'description', 'index','interest_rate'];
    public    $timestamps  = true;

    public function instituition()
    {
        return $this->belongsTo(Instituition::class);
    }
}
