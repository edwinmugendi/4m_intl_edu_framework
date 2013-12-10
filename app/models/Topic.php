<?php

class Topic extends Eloquent {
	protected $guarded = array();
    protected $appends = array('languages');
    protected $cascadeDelete = array('translations');
	public static $rules = array();

    public function discussion()
    {
        return $this->belongsTo('Discussion');
    }

    public function posts()
    {
        return $this->hasMany('Post');
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
}
