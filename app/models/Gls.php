<?php

class Gls extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
//		'cal_id' => 'required'
	);

	public function school() {
		return $this -> belongsToMany('School');
	}
    public function discussion()
    {
        return $this -> hasOne('Discussion');
    }
}
