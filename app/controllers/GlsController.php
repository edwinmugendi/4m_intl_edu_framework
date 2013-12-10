<?php

class GlsController extends BaseController {

	/**
	 * Gls Repository
	 *
	 * @var Gls
	 */
	protected $gls;

	public function __construct(Gls $gls)
	{
		$this->gls = $gls;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$gls = GLS::with('discussion')->get();

		return View::make('gls.index', compact('gls'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('gls.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Gls::$rules);

		if ($validation->passes())
		{
			$gls = $this->gls->create($input);
            Session::flash('info', $gls->toJson());
                // Create matching discussion.
            $disc = new Discussion();
            $disc->gls_id = $gls->id;
            $disc = $gls->discussion()->save($disc);

            return Redirect::route('gls.index');
		}

		return Redirect::route('gls.create')
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
		$gls = $this->gls->findOrFail($id);

		return View::make('gls.show', compact('gls'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gls = $this->gls->find($id);

		if (is_null($gls))
		{
			return Redirect::route('gls.index');
		}

		return View::make('gls.edit', compact('gls'));
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
		$validation = Validator::make($input, Gls::$rules);

		if ($validation->passes())
		{
			$gls = $this->gls->find($id);
			$gls->update($input);

			return Redirect::route('gls.show', $id);
		}

		return Redirect::route('gls.edit', $id)
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
		$gls = $this->gls->find($id)

        ->delete();


		return Redirect::route('gls.index');
	}

}
