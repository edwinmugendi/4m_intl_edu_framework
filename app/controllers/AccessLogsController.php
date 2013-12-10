<?php

class AccessLogsController extends BaseController {

	/**
	 * AccessLog Repository
	 *
	 * @var AccessLog
	 */
	protected $accessLog;

	public function __construct(AccessLog $accessLog)
	{
		$this->accessLog = $accessLog;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$accessLogs = $this->accessLog->all();

		return View::make('accessLogs.index', compact('accessLogs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('accessLogs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, AccessLog::$rules);

		if ($validation->passes())
		{
			$this->accessLog->create($input);

			return Redirect::route('accessLogs.index');
		}

		return Redirect::route('accessLogs.create')
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
		$accessLog = $this->accessLog->findOrFail($id);

		return View::make('accessLogs.show', compact('accessLog'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$accessLog = $this->accessLog->find($id);

		if (is_null($accessLog))
		{
			return Redirect::route('accessLogs.index');
		}

		return View::make('accessLogs.edit', compact('accessLog'));
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
		$validation = Validator::make($input, AccessLog::$rules);

		if ($validation->passes())
		{
			$accessLog = $this->accessLog->find($id);
			$accessLog->update($input);

			return Redirect::route('accessLogs.show', $id);
		}

		return Redirect::route('accessLogs.edit', $id)
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
		$this->accessLog->find($id)->delete();

		return Redirect::route('accessLogs.index');
	}

}
