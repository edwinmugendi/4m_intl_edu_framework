<?php

class ActivitylogsController extends BaseController {

	/**
	 * Activitylog Repository
	 *
	 * @var Activitylog
	 */
	protected $activitylog;

	public function __construct(Activitylog $activitylog)
	{
		$this->activitylog = $activitylog;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$activitylogs = $this->activitylog->all();

		return View::make('activitylogs.index', compact('activitylogs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('activitylogs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Activitylog::$rules);

		if ($validation->passes())
		{
			$this->activitylog->create($input);

			return Redirect::route('activitylogs.index');
		}

		return Redirect::route('activitylogs.create')
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
		$activitylog = $this->activitylog->findOrFail($id);

		return View::make('activitylogs.show', compact('activitylog'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$activitylog = $this->activitylog->find($id);

		if (is_null($activitylog))
		{
			return Redirect::route('activitylogs.index');
		}

		return View::make('activitylogs.edit', compact('activitylog'));
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
		$validation = Validator::make($input, Activitylog::$rules);

		if ($validation->passes())
		{
			$activitylog = $this->activitylog->find($id);
			$activitylog->update($input);

			return Redirect::route('activitylogs.show', $id);
		}

		return Redirect::route('activitylogs.edit', $id)
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
		$this->activitylog->find($id)->delete();

		return Redirect::route('activitylogs.index');
	}

}
