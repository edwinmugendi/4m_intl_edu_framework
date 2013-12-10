<?php

class UserInfosController extends BaseController {

	/**
	 * UserInfo Repository
	 *
	 * @var UserInfo
	 */
	protected $userInfo;

	public function __construct(UserInfo $userInfo)
	{
		$this->userInfo = $userInfo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userInfos = $this->userInfo->all();

		return View::make('userInfos.index', compact('userInfos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('userInfos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, UserInfo::$rules);

		if ($validation->passes())
		{
			$this->userInfo->create($input);

			return Redirect::route('userInfos.index');
		}

		return Redirect::route('userInfos.create')
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
		$userInfo = $this->userInfo->findOrFail($id);

		return View::make('userInfos.show', compact('userInfo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$userInfo = $this->userInfo->find($id);

		if (is_null($userInfo))
		{
			return Redirect::route('userInfos.index');
		}

		return View::make('userInfos.edit', compact('userInfo'));
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
		$validation = Validator::make($input, UserInfo::$rules);

		if ($validation->passes())
		{
			$userInfo = $this->userInfo->find($id);
			$userInfo->update($input);

			return Redirect::route('userInfos.show', $id);
		}

		return Redirect::route('userInfos.edit', $id)
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
		$this->userInfo->find($id)->delete();

		return Redirect::route('userInfos.index');
	}

}
