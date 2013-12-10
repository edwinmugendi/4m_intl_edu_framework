<?php

class Discussion extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'gls_id' => 'required',
//		'created_by_id' => 'required'
	);

    public function gls()
    {
        return $this->belongsTo("Gls");
    }

    public function topics()
    {
        return $this->hasMany("Topic");
    }

//    public function translationEN()
//    {
//
//    }
//
//    public function translationAR()
//    {
//
//    }


    /**
     * Translation relationship
     */
    public function translations()
    {
        return $this->morphMany('Translation', 'translatable');
    }
}
