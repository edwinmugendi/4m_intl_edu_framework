<?php

class Translation extends Eloquent {

    protected $guarded = array();

    public static $rules = array(
		'translatable_type' => 'required',
		'translatable_id' => 'required',
		'language_code' => 'required',
		'title' => 'required',
//		'content' => 'required',
//		'notes' => 'required',
//		'created_by_id' => 'required',
//		'last_updated_by_id' => 'required'
	);

    public function translatable()
    {
        return $this->morphTo();
    }
}
