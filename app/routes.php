<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Route::get('/', function()
//{
//	return View::make('hello');
//});

Route::get('/', 'HomeController@showWelcome');

Route::get('/api/users', function(){
	return '{users:'.User::all().'}';
});


Route::controller('users', 'UserController');

Route::resource('users.userinfos', 'UserinfosController');

Route::resource('groups', 'GroupController');

Route::resource('files', 'FilesController');

Route::resource('schools', 'SchoolsController');

Route::resource('gls', 'GlsController');

Route::resource('activitylogs', 'ActivitylogsController');

Route::resource('accesslogs', 'AccesslogsController');

Route::resource('notificationconfigtemplates', 'NotificationconfigtemplatesController');

Route::resource('notificationconfigs', 'NotificationconfigsController');

Route::resource('notifications', 'NotificationsController');

Route::resource('discussions', 'DiscussionsController');

Route::resource('discussions.topics', 'TopicsController');

Route::resource('topics.posts', 'PostsController');

Route::resource('tags', 'TagsController');

Route::resource('translations', 'TranslationsController');

Route::resource('files', 'FilesController');

Route::resource('participantuploads', 'ParticipantuploadsController');

Route::resource('resources', 'ResourcesController');

Route::get('topics/indexForGls/{any}', array('as' => 'topics.indexForGls', 'uses' => 'TopicsController@indexForGls'));
Route::get('topics/createForGls/{any}', array('as' => 'topics.createForGls', 'uses' => 'TopicsController@createForGls'));
