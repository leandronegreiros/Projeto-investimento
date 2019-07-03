<?php

namespace App\Services;

use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;

class GroupService
{
    private $repository;
    private $validator;

    public function __construct(GroupRepository $repository, GroupValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  =  $validator;
    }

    public function store(array $data) : array
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $group = $this->repository->create($data);

            return [
                'success' => true,
                'messages' => "Grupo cadastrada",
                'data'    => $group,
            ];
        }
        catch(Exception $e)
        {
            dd($e);
            switch(get_class($e))
            {
                case QueryException::class     : return ['success' => false, 'messages' =>  $e->getMessage()];
                case ValidatorException::class : return ['success' => false, 'messages' =>  $e->getMessageBag()];
                case Exception::class          : return ['success' => false, 'messages' =>  $e->getMessage()];
                default                        : return ['success' => false, 'messages' =>  $e->getMessage()];
            }
        }
    }

    public function userStore($group_id, $data)
    {
        try
        {
            $group   = $this->repository->find($group_id);
            $user_id = $data['user_id'];

            //pegar o obj grupo e insere no relacionamento n:n com uma entreda com o id o user e o grupo
            $group->users()->attach($user_id);
            // dd($group->users);

            return [
                'success' => true,
                'messages' => "Usuário relacionado com sucesso!",
                'data'    => $group,
            ];
        }
        catch(Exception $e)
        {
            dd($e);
            switch(get_class($e))
            {
                case QueryException::class     : return ['success' => false, 'messages' =>  $e->getMessage()];
                case ValidatorException::class : return ['success' => false, 'messages' =>  $e->getMessageBag()];
                case Exception::class          : return ['success' => false, 'messages' =>  $e->getMessage()];
                default                        : return ['success' => false, 'messages' =>  $e->getMessage()];
            }
        }
    }
}
