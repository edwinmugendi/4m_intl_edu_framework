<?php

class TopicsController extends BaseController {

	/**
	 * Topic Repository
	 *
	 * @var Topic
	 */
	protected $topic;

	public function __construct(Topic $topic)
	{
		$this->topic = $topic;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($discussion_id)
	{
        $discussion = Discussion::with('topics', 'topics.translations')->find($discussion_id);
		$topics = $discussion->topics;

//        // map translations
        foreach($topics as $topic){
            foreach($topic->translations as $translation){
                $data['localization'][$translation->language_code] = array('title' => $translation->title, 'content' => $translation->content);
            }
        }

        $data['discussion'] = $discussion;

		return View::make('topics.index', compact('topics'))->with($data);
	}

    public function indexForGls($id)
    {
        $gls = GLS::with(array('discussion', 'discussion.topics'))->find($id);
        $data['discussion'] = $gls->discussion();
        $topics = $gls->discussion->topics();

        return View::make('topics.index', compact('topics'))->with($data);

    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($discussion_id)
	{
        $data['discussion_id'] = $discussion_id;
		return View::make('topics.create')->with($data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($discussion_id)
	{

        $user = Sentry::getUser();
		$input = Input::all();
        $input['discussion_id'] = $discussion_id;
		$validation = Validator::make($input, Topic::$rules);

		if ($validation->passes())
		{
//			$this->topic->create($input);
            $this->topic = new Topic;
            $this->topic->discussion_id = $discussion_id;
            $this->topic->created_by_id = $user->id;

            if(isset($input['admin_notes'])) {
                $this->topic->admin_notes = $input['admin_notes'];
            }

            // TODO: Add this to model...Get current user in here!
//            $this->topic->created_by_id = 0;
            $this->topic->save();


            $translation_en = new Translation();
            $translation_en->title = $input['title_en'];
            $translation_en->language_code = 'en';

            $translation_ar = new Translation();
            $translation_ar -> title = $input['title_ar'];
            $translation_ar->language_code = 'ar';

            $this->topic->translations()->save($translation_en);
            $this->topic->translations()->save($translation_ar);


            return Redirect::route('discussions.topics.index', $discussion_id);
		}

		return Redirect::route('discussions.topics.create', $discussion_id)
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
	public function show($discussion_id, $id)
	{
		$topic = $this->topic->findOrFail($id);

		return View::make('topics.show', compact('topic'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($discussion_id, $id)
	{
		$topic = $this->topic->find($id);

		if (is_null($topic))
		{
            return Redirect::route('discussions.topics.index', $discussion_id);
		}

		return View::make('topics.edit', compact('topic'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($discussion_id, $id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Topic::$rules);

		if ($validation->passes())
		{
			$topic = $this->topic->find($id);
			$topic->update($input);

			return Redirect::route('discussions.topics.show', $discussion_id, $id);
		}

		return Redirect::route('discussions.topics.edit', $discussion_id, $id)
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
	public function destroy($discussion_id, $id)
	{
		$this->topic->find($id)->delete();

        return Redirect::route('discussions.topics.index', $discussion_id);
	}

}
