<?php

class School extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
//		'description' => 'required'

	);

    public function users() {
        return $this->belongsToMany('User');
    }

//    public function coaches() {
//        return $this->belongsToMany('User');
//    }

    public function glss() {
        return $this->belongsToMany('Gls');
    }

    public function get_active_glss() {
        $now = time()->format('Y-m-d');
        return $this->belongsToMany('Gls')->where('start_date', '>=', $now)->where('end_date', '<=', $now)->get();
    }
}
