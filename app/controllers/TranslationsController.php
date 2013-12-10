<?php

class TranslationsController extends BaseController {

	/**
	 * Translation Repository
	 *
	 * @var Translation
	 */
	protected $translation;

	public function __construct(Translation $translation)
	{
		$this->translation = $translation;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$translations = $this->translation->all();

		return View::make('translations.index', compact('translations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('translations.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Translation::$rules);

		if ($validation->passes())
		{
			$this->translation->create($input);

			return Redirect::route('translations.index');
		}

		return Redirect::route('translations.create')
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
		$translation = $this->translation->findOrFail($id);

		return View::make('translations.show', compact('translation'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$translation = $this->translation->find($id);

		if (is_null($translation))
		{
			return Redirect::route('translations.index');
		}

		return View::make('translations.edit', compact('translation'));
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
		$validation = Validator::make($input, Translation::$rules);

		if ($validation->passes())
		{
			$translation = $this->translation->find($id);
			$translation->update($input);

			return Redirect::route('translations.show', $id);
		}

		return Redirect::route('translations.edit', $id)
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
		$this->translation->find($id)->delete();

		return Redirect::route('translations.index');
	}

}
