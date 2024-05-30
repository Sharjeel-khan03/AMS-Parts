<?php

namespace App\Services;

use Illuminate\Http\Request;

trait CrudOperations
{
	private $model;
	protected $userService;

	public function __construct(UserService $userService)
	{
		$this->model = $this->initilizeModel;

		$this->userService = $userService;
	}

	public function index()
	{
		$data = $this->model::latest()->get();
		return view($this->indexView, ['data' => $data]);
	}

	public function create()
	{
		$roles = $this->userService->role();
		return view($this->createView, ['roles' => $roles]);
	}

	public function store()
	{
		$request = app($this->storeRequest);
		$this->model::create($request->validated());
		return redirect()->route($this->indexRoute);
	}

	public function show($id)
	{
		$data = $this->model::find($id);
		return view($this->showView, ['data' => $data]);
	}

	public function edit($id)
	{
		$data = $this->model::find($id);
		return view($this->editView, ['data' => $data]);
	}

	public function update($id)
	{
		$request = app($this->updateRequest);
		$this->model::find($id)->update($request->validated());
		return redirect()->route($this->indexRoute);
	}

	public function destroy($id)
	{
		$this->model::find($id)->delete();
		return redirect()->route($this->indexRoute);
	}
}
