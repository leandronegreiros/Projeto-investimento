<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Group extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'user_id', 'instituition_id'];

    public function getTotalValueAttribute()
    {
        return $this->moviments->sum('value');
    }

    public function owner()
    {
        //RELACIONAMENTO N:1
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        //RELACIONAMENTO N:N
        return $this->belongsToMany(User::class, 'user_groups');
    }

    public function instituition()
    {
        //RELACIONAMENTO N:1
        return $this->belongsTo(Instituition::class);
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }

}
