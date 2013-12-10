<?php

class TagsController extends BaseController {

	/**
	 * Tag Repository
	 *
	 * @var Tag
	 */
	protected $tag;

	public function __construct(Tag $tag)
	{
		$this->tag = $tag;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = Tag::with('translations')->get();
		return View::make('tags.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        if (Sentry::check()) {
            // Find the user using the user id
            $user = Sentry::getUser();
            $input['created_by_id'] = $user->id;

            $validation = Validator::make($input, Tag::$rules);

            if ($validation->passes())
            {
                $this->tag = new Tag();
                $this->tag->type = $input['type'];
                $this->tag->created_by_id = $input['created_by_id'];
                $this->tag->save();

                $translation_en = new Translation();
                $translation_en->title = $input['label_en'];
                $translation_en->language_code = 'en';

                $translation_ar = new Translation();
                $translation_ar->title = $input['label_ar'];
                $translation_ar->language_code = 'ar';

                $this->tag->translations()->save($translation_en);
                $this->tag->translations()->save($translation_ar);

                return Redirect::route('tags.index');
            }

            return Redirect::route('tags.create')
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'There were validation errors.');
        }
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tag = $this->tag->findOrFail($id);

		return View::make('tags.show', compact('tag'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tag = $this->tag->find($id);

		if (is_null($tag))
		{
			return Redirect::route('tags.index');
		}

		return View::make('tags.edit', compact('tag'));
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
		$validation = Validator::make($input, Tag::$rules);

		if ($validation->passes())
		{
			$tag = $this->tag->find($id);
			$tag->update($input);

			return Redirect::route('tags.show', $id);
		}

		return Redirect::route('tags.edit', $id)
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
		$this->tag->find($id)->delete();

		return Redirect::route('tags.index');
	}

}
