<?php

class PostsController extends BaseController {

	/**
	 * Post Repository
	 *
	 * @var Post
	 */
	protected $post;

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($topic_id)
	{
        $topic = Topic::with('posts')->find($topic_id);
        $posts = $topic->posts;
        $data['topic'] = $topic;

		return View::make('posts.index', compact('posts'))->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($topic_id)
	{
        $data['topic_id'] = $topic_id;
		return View::make('posts.create')->with($data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($topic_id)
	{
//        try {
            // Find the current user
            if (Sentry::check()) {
                // Find the user using the user id
                $data['user'] = Sentry::getUser();

                if ($data['user']->hasAccess('admin')) {
                    $input = Input::all();
                    $input['topic_id'] = $topic_id;
                    $validation = Validator::make($input, Post::$rules);

                    if ($validation->passes())
                    {
//                        $newPost = $this->post->create($input);
                        $newPost = new Post;
                        $newPost->topic_id = $topic_id;
                        $newPost->save();
//                        $newPost->created_by_id = $data['user']->id;
                        $translation = new Translation;
                        $translation->content = $input['content_editor'];
                        $translation->language_code = $input['language_code'];

//                        $newPost->user()->save($data['user']);

                        $newPost->translations()->save($translation);

                        return Redirect::route('topics.posts.index', $topic_id);
                    }

                    //send email with link to activate.
                    Mail::send('emails.auth.welcome', $data, function ($m) use ($data) {
                        $m->to($data['email'])->subject('Welcome to Laravel4 With Sentry');
                    });

                    return Redirect::route('topics.posts.create', $topic_id)
                        ->withInput()
                        ->withErrors($validation)
                        ->with('message', 'There were validation errors.');
                }
            }
//        } catch (Exception $e) {
//            Session::flash('error', 'There was a problem accessing the requested discussion topic.');
//            return Redirect::to('/');
//        }

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($topic_id, $id)
	{
		$post = $this->post->findOrFail($id);

		return View::make('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($topic_id, $id)
	{
		$post = $this->post->find($id);

		if (is_null($post))
		{
			return Redirect::route('topics.posts.index', $topic_id);
		}

		return View::make('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($topic_id, $id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Post::$rules);

		if ($validation->passes())
		{
			$post = $this->post->find($id);
			$post->update($input);

			return Redirect::route('topics.posts.show', $topic_id);
		}

		return Redirect::route('topics.posts.edit', $topic_id)
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
		$this->post->find($id)->delete();

		return Redirect::route('posts.index');
	}

}
