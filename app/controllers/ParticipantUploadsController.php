<?php

class ParticipantUploadsController extends BaseController {

	/**
	 * ParticipantUpload Repository
	 *
	 * @var ParticipantUpload
	 */
	protected $participantUpload;

	public function __construct(ParticipantUpload $participantUpload)
	{
		$this->participantUpload = $participantUpload;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$participantUploads = $this->participantUpload->all();

		return View::make('participantUploads.index', compact('participantUploads'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('participantUploads.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, ParticipantUpload::$rules);

		if ($validation->passes())
		{
			$this->participantUpload->create($input);

			return Redirect::route('participantUploads.index');
		}

		return Redirect::route('participantUploads.create')
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
		$participantUpload = $this->participantUpload->findOrFail($id);

		return View::make('participantUploads.show', compact('participantUpload'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$participantUpload = $this->participantUpload->find($id);

		if (is_null($participantUpload))
		{
			return Redirect::route('participantUploads.index');
		}

		return View::make('participantUploads.edit', compact('participantUpload'));
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
		$validation = Validator::make($input, ParticipantUpload::$rules);

		if ($validation->passes())
		{
			$participantUpload = $this->participantUpload->find($id);
			$participantUpload->update($input);

			return Redirect::route('participantUploads.show', $id);
		}

		return Redirect::route('participantUploads.edit', $id)
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
		$this->participantUpload->find($id)->delete();

		return Redirect::route('participantUploads.index');
	}

}
