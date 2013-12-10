<?php

class NotificationConfigTemplatesController extends BaseController {

	/**
	 * NotificationConfigTemplate Repository
	 *
	 * @var NotificationConfigTemplate
	 */
	protected $notificationConfigTemplate;

	public function __construct(NotificationConfigTemplate $notificationConfigTemplate)
	{
		$this->notificationConfigTemplate = $notificationConfigTemplate;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$notificationConfigTemplates = $this->notificationConfigTemplate->all();

		return View::make('notificationConfigTemplates.index', compact('notificationConfigTemplates'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('notificationConfigTemplates.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, NotificationConfigTemplate::$rules);

		if ($validation->passes())
		{
			$this->notificationConfigTemplate->create($input);

			return Redirect::route('notificationConfigTemplates.index');
		}

		return Redirect::route('notificationConfigTemplates.create')
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
		$notificationConfigTemplate = $this->notificationConfigTemplate->findOrFail($id);

		return View::make('notificationConfigTemplates.show', compact('notificationConfigTemplate'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$notificationConfigTemplate = $this->notificationConfigTemplate->find($id);

		if (is_null($notificationConfigTemplate))
		{
			return Redirect::route('notificationConfigTemplates.index');
		}

		return View::make('notificationConfigTemplates.edit', compact('notificationConfigTemplate'));
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
		$validation = Validator::make($input, NotificationConfigTemplate::$rules);

		if ($validation->passes())
		{
			$notificationConfigTemplate = $this->notificationConfigTemplate->find($id);
			$notificationConfigTemplate->update($input);

			return Redirect::route('notificationConfigTemplates.show', $id);
		}

		return Redirect::route('notificationConfigTemplates.edit', $id)
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
		$this->notificationConfigTemplate->find($id)->delete();

		return Redirect::route('notificationConfigTemplates.index');
	}

}
