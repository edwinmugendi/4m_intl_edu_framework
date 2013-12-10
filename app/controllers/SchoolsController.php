<?php

class SchoolsController extends BaseController {

	/**
	 * School Repository
	 *
	 * @var School
	 */
	protected $school;

	public function __construct(School $school)
	{
		$this->school = $school;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$schools = $this->school->all();

		return View::make('schools.index', compact('schools'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('schools.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, School::$rules);

		if ($validation->passes())
		{
			$this->school->create($input);

			return Redirect::route('schools.index');
		}

		return Redirect::route('schools.create')
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
		$school = $this->school->findOrFail($id);

		return View::make('schools.show', compact('school'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$school = $this->school->find($id);

		if (is_null($school))
		{
			return Redirect::route('schools.index');
		}

		return View::make('schools.edit', compact('school'));
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
		$validation = Validator::make($input, School::$rules);

		if ($validation->passes())
		{
			$school = $this->school->find($id);
			$school->update($input);

			return Redirect::route('schools.show', $id);
		}

		return Redirect::route('schools.edit', $id)
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
		$this->school->find($id)->delete();

		return Redirect::route('schools.index');
	}

}
