<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('SentryGroupSeeder');
		$this->call('SentryUserSeeder');
		$this->call('SentryUserGroupSeeder');
		$this->call('FilesTableSeeder');
		$this->call('UserinfosTableSeeder');
		$this->call('SchoolsTableSeeder');
		$this->call('GlsTableSeeder');
		$this->call('ActivitylogsTableSeeder');
		$this->call('AccesslogsTableSeeder');
		$this->call('NotificationconfigtemplatesTableSeeder');
		$this->call('NotificationconfigsTableSeeder');
		$this->call('NotificationsTableSeeder');
		$this->call('DiscussionsTableSeeder');
		$this->call('TopicsTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('TranslationsTableSeeder');
		$this->call('ParticipantuploadsTableSeeder');
		$this->call('ResourcesTableSeeder');
		$this->call('GroupsTableSeeder');
		$this->call('UsersTableSeeder');
	}

}