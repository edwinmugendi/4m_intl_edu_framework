<?php

class ParticipantUpload extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'file_id' => 'required',
		'user_id' => 'required',
		'gls_cal_id' => 'required',
		'school_id' => 'required',
		'feedback_req_user_id' => 'required',
		'feedback_last_modified' => 'required',
		'shared' => 'required',
		'shared_by_user_id' => 'required',
		'shared_by_user_role_id' => 'required',
		'share_last_modified' => 'required',
		'translated_by_id' => 'required',
		'last_translated' => 'required'
	);

    /**
     * Translation relationship
     */
    public function translations()
    {
        return $this->morphMany('Translation', 'translatable');
    }
}
