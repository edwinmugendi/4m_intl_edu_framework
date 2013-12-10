<?php

class UserInfo extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'first_name' => 'required',
		'last_name' => 'required',
		'screen_name' => 'required',
        'preferred_lang_code' => 'required',
//		'g_cal_id' => 'required',
//		'coach_id' => 'required',
//		'position' => 'required',
//		'user_image' => 'required',
		'sort_index' => 'required',
		'enabled' => 'required'
	);

    public function user(){
        return $this->belongsTo('User');
    }
}
