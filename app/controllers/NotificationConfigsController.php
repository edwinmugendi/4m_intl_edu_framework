<?php

class NotificationConfigsController extends BaseController {

	/**
	 * NotificationConfig Repository
	 *
	 * @var NotificationConfig
	 */
	protected $notificationConfig;

	public function __construct(NotificationConfig $notificationConfig)
	{
		$this->notificationConfig = $notificationConfig;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$notificationConfigs = $this->notificationConfig->all();

		return View::make('notificationConfigs.index', compact('notificationConfigs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('notificationConfigs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, NotificationConfig::$rules);

		if ($validation->passes())
		{
			$this->notificationConfig->create($input);

			return Redirect::route('notificationConfigs.index');
		}

		return Redirect::route('notificationConfigs.create')
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
		$notificationConfig = $this->notificationConfig->findOrFail($id);

		return View::make('notificationConfigs.show', compact('notificationConfig'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$notificationConfig = $this->notificationConfig->find($id);

		if (is_null($notificationConfig))
		{
			return Redirect::route('notificationConfigs.index');
		}

		return View::make('notificationConfigs.edit', compact('notificationConfig'));
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
		$validation = Validator::make($input, NotificationConfig::$rules);

		if ($validation->passes())
		{
			$notificationConfig = $this->notificationConfig->find($id);
			$notificationConfig->update($input);

			return Redirect::route('notificationConfigs.show', $id);
		}

		return Redirect::route('notificationConfigs.edit', $id)
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
		$this->notificationConfig->find($id)->delete();

		return Redirect::route('notificationConfigs.index');
	}

}
