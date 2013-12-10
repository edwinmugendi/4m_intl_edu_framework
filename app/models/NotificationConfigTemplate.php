<?php

class NotificationConfigTemplate extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'notification_config_id' => 'required',
		'language_code' => 'required',
		'subject' => 'required',
		'template_path' => 'required'
	);
}
