<?php

class DiscussionsController extends BaseController {

	/**
	 * Discussion Repository
	 *
	 * @var Discussion
	 */
	protected $discussion;

	public function __construct(Discussion $discussion)
	{
		$this->discussion = $discussion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$discussions = $this->discussion->all();

		return View::make('discussions.index', compact('discussions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('discussions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Discussion::$rules);

		if ($validation->passes())
		{
			$this->discussion->create($input);

			return Redirect::route('discussions.index');
		}

		return Redirect::route('discussions.create')
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
		$discussion = $this->discussion->findOrFail($id);

		return View::make('discussions.show', compact('discussion'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$discussion = $this->discussion->find($id);

		if (is_null($discussion))
		{
			return Redirect::route('discussions.index');
		}

		return View::make('discussions.edit', compact('discussion'));
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
		$validation = Validator::make($input, Discussion::$rules);

		if ($validation->passes())
		{
			$discussion = $this->discussion->find($id);
			$discussion->update($input);

			return Redirect::route('discussions.show', $id);
		}

		return Redirect::route('discussions.edit', $id)
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
		$this->discussion->find($id)->delete();

		return Redirect::route('discussions.index');
	}

}
