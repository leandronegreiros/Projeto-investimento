<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InstituitionCreateRequest;
use App\Http\Requests\InstituitionUpdateRequest;
use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use App\Services\InstituitionService;

class InstituitionsController extends Controller
{

    protected $repository;
    protected $validator;
    protected $service;


    public function __construct(InstituitionRepository $repository, InstituitionValidator $validator, InstituitionService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service    = $service;

    }

    public function index()
    {
        $instituitions = $this->repository->all();

        return view('instituitions.index', [
            'instituitions' => $instituitions,
        ]);
    }

    public function store(InstituitionCreateRequest $request)
    {
        $request      = $this->service->store($request->all());
        $instituition = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('instituition.index');

        // return view('instituitions.index', [
        //     'instituition' => $instituition,
        // ]);
    }

    public function show($id)
    {
        $instituition = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $instituition,
            ]);
        }

        return view('instituitions.show', compact('instituition'));
    }

    public function edit($id)
    {
        $instituition = $this->repository->find($id);

        return view('instituitions.edit', compact('instituition'));
    }

    public function update(InstituitionUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $instituition = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Instituition updated.',
                'data'    => $instituition->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->route('instituitions.index');

    }
}
