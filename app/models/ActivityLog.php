<?php

class Activitylog extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'object_type' => 'required',
		'object_id' => 'required',
		'action' => 'required',
		'detail' => 'required',
		'created' => 'required'
	);
}
