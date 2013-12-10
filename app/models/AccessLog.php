<?php

class AccessLog extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'created' => 'required'
	);
}
