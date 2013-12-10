<?php

class SchoolsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
//		DB::table('schools')->truncate();

        $schools = array(
            array('name' => 'Al Ahad'),
            array('name' => 'Al Dhaher'),
            array('name' => 'Al Shiyam'),
            array('name' => 'Al Somou'),
            array('name' => 'Um Ghafa'),
            array('name' => 'AL Wagan'),
            array('name' => 'Al Dewan'),
            array('name' => 'Al Husoon'),
            array('name' => 'Al Jahili'),
            array('name' => 'Al Khalif'),
            array('name' => 'Maryam Bint Sultan'),
            array('name' => 'Mezyad'),
            array('name' => 'Al Khatem'),
            array('name' => 'Mubarak Bin Mohammed'),
            array('name' => 'Al Atfal'),
            array('name' => 'Al Mushrif'),
            array('name' => 'Al Oula'),
            array('name' => 'Yas'),
            array('name' => 'Group Learning'),
            array('name' => 'Peer Learning')
        );


		// Uncomment the below to run the seeder
		DB::table('schools')->insert($schools);
	}

}
