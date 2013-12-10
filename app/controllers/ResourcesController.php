<?php

class ResourcesController extends BaseController {

	/**
	 * Resource Repository
	 *
	 * @var Resource
	 */
	protected $resource;

	public function __construct(Resource $resource)
	{
		$this->resource = $resource;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$resources = $this->resource->all();

		return View::make('resources.index', compact('resources'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('resources.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Resource::$rules);

		if ($validation->passes())
		{
			$this->resource->create($input);

			return Redirect::route('resources.index');
		}

		return Redirect::route('resources.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$resource = $this->resource->findOrFail($id);

		return View::make('resources.show', compact('resource'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$resource = $this->resource->find($id);

		if (is_null($resource))
		{
			return Redirect::route('resources.index');
		}

		return View::make('resources.edit', compact('resource'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Resource::$rules);

		if ($validation->passes())
		{
			$resource = $this->resource->find($id);
			$resource->update($input);

			return Redirect::route('resources.show', $id);
		}

		return Redirect::route('resources.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->resource->find($id)->delete();

		return Redirect::route('resources.index');
	}

}
