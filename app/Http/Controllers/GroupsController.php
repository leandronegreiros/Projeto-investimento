<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\InstituitionRepositoryEloquent;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\InstituitionRepository;
use App\Repositories\UserRepositoryEloquent;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use App\Services\GroupService;
use App\Entities\Group;
use App\Http\Requests;

class GroupsController extends Controller
{
    protected $instituitionRepository;
    protected $userRepository;
    protected $repository;
    protected $validator;
    protected $service;

    public function __construct(GroupRepository $repository, UserRepositoryEloquent $userRepository, GroupValidator $validator, GroupService $service, InstituitionRepository $instituitionRepository)
    {
        $this->instituitionRepository = $instituitionRepository;
        $this->userRepository         = $userRepository;
        $this->repository             = $repository;
        $this->validator              = $validator;
        $this->service                = $service;
    }

    public function index()
    {
        $groups            = $this->repository->all();
        //$user_list         = \App\Entities\User::pluck('name', 'id')->all();
        $user_list         = $this->userRepository->selectBoxList();
        $instituition_list = $this->instituitionRepository->selectBoxList();

        // dd($user_list);

        return view('groups.index', [
            'groups'            => $groups,
            'user_list'         => $user_list,
            'instituition_list' => $instituition_list,

        ]);
    }

    public function store(GroupCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $group   = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

      return redirect()->route('group.index');
    }

    public function userStore(Request $request, $group_id)
    {
        $request = $this->service->userStore($group_id, $request->all());

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

      return redirect()->route('group.show',[$group_id]);
    }

    public function show($id)
    {
        $group     = $this->repository->find($id);
        // $user_list = \App\Entities\User::pluck('name', 'id')->all();
        $user_list = $this->userRepository->selectBoxList();


        return view('groups.show', [
            'group'     => $group,
            'user_list' => $user_list,
        ]);
    }

    public function edit($id)
    {
        $group             = Group::find($id);
        $user_list         = $this->userRepository->selectBoxList();
        $instituition_list = $this->instituitionRepository->selectBoxList();

        return view('groups.edit', [
            'group'            => $group,
            'user_list'         => $user_list,
            'instituition_list' => $instituition_list,

        ]);
    }

    public function update(Request $request, $group_id)
    {
        $request      = $this->service->update($group_id, $request->all());

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('group.index');
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->route('group.index');
    }
}
