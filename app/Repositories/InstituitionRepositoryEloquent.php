<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\InstituitionRepository;
use App\Entities\Instituition;
use App\Validators\InstituitionValidator;

class InstituitionRepositoryEloquent extends BaseRepository implements InstituitionRepository
{
    public function selectBoxList(string $descricao = 'name', string $chave = 'id')
    {
        return $this->model->pluck($descricao, $chave)->all();
    }

    public function model()
    {
        return Instituition::class;
    }

    public function validator()
    {

        return InstituitionValidator::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
