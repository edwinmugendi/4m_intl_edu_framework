<?php

class SentryGroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('groups')->delete();

		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Users',
	        'permissions' => array(
	            'admin' => 0,
                'manager' => 0,
                'translator' => 0,
                'coach' => 0,
                'emiratevp' => 0,
	            'users' => 1,
	        )));


        Sentry::getGroupProvider()->create(array(
            'name'        => 'Emirate VP',
            'permissions' => array(
                'admin' => 0,
                'manager' => 0,
                'translator' => 0,
                'coach' => 0,
                'emiratevp' => 1,
                'users' => 0,
            )));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Coach',
            'permissions' => array(
                'admin' => 0,
                'manager' => 0,
                'translator' => 0,
                'coach' => 1,
                'emiratevp' => 0,
                'users' => 0,
            )));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Translator',
            'permissions' => array(
                'admin' => 0,
                'manager' => 0,
                'translator' => 1,
                'coach' => 0,
                'emiratevp' => 0,
                'users' => 0,
            )));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Manager',
            'permissions' => array(
                'admin' => 0,
                'manager' => 1,
                'translator' => 1,
                'coach' => 1,
                'emiratevp' => 1,
                'users' => 1,
            )));

		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Admins',
	        'permissions' => array(
                'admin' => 1,
                'manager' => 1,
                'translator' => 1,
                'coach' => 1,
                'emiratevp' => 1,
                'users' => 1,
	        )));
	}

}