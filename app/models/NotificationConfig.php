<?php

class NotificationConfig extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'description' => 'required',
		'to_addresses' => 'required'
	);
}
