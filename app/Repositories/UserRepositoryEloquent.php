<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Entities\User;
use App\Validators\UserValidator;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    public function selectBoxList(string $descricao = 'name', string $chave = 'id')
    {
        return $this->model->pluck($descricao, $chave)->all();

    }

    public function model()
    {
        return User::class;
    }

    public function validator()
    {

        return UserValidator::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
