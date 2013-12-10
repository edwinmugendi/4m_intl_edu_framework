<?php

class Tag extends Eloquent {
	protected $guarded = array();
    protected $appends = array('languages');
    protected $cascadeDelete = array('translations');
	public static $rules = array(
        'taggable_type' => 'required',
        'taggable_id' => 'required',
		'type' => 'required'
		// 'created_by_id' => 'required'
	);


    public function getTranslation($transdata, $lang_code) {
        return array_filter($transdata->toArray(), function($translation, $lang_code){
            return $translation->language_code == $lang_code ? true : false ;
        });
    }

    public function getLanguagesAttribute()
    {
        if(empty($this->attributes['languages'])) {
            $result = array();
            $translations = $this->translations;
            foreach($translations as $translation){
                $result[$translation->language_code] = array('title' => $translation->title, 'content' => $translation->content);
            }
            $this->attributes['languages'] = $result;
        }

        return $this->attributes['languages'];
    }

    /**
     * Translation relationship
     */
    public function translations()
    {
        return $this->morphMany('Translation', 'translatable');
    }

    public function taggable()
    {
        return $this->morphTo();
    }
}
