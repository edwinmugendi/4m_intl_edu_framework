<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
        $data = array();

        try {
            // Find the current user
            if (Sentry::check()) {

                $data['user'] = Sentry::getUser();
                $systemUser = User::with('schools')->find($data['user']->getId());
                $data['userSchools'] = $systemUser->schools->lists('name');
                $data['glss'] = Gls::all();
                $data['resources'] = Resource::all();
                $data['tags'] = Tag::with('translations')->get();
                $discussions = Discussion::with('translations', 'topics')->get();
                $data['discussions'] = $discussions;
                $activeDisc = Discussion::with('topics')->where('active', '==', '1')->get();
                $data['activeDiscussions'] = $activeDisc;

                return View::make('home')->with($data);
            }
        } catch (Exception $e) {
            // do nothing ...view will show login.
        }

        return View::make('home');
	}

}