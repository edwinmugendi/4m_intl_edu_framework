<?php

class Notification extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'label' => 'required',
		'description' => 'required',
		'subject' => 'required',
		'body' => 'required',
		'sent_adresses' => 'required'
	);
}
