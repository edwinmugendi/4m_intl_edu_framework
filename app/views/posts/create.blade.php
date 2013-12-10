@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1 class="col-md-6 col-md-offset-3">Create Post</h1>
<div class="well col-md-6 col-md-offset-3">
{{ Form::open(array('route' => array('topics.posts.store', $topic_id ), 'class'=>'form-horizontal', 'role'=>'form')) }}
    <div class="form-group">
        {{ Form::select('language_code', array('en' => 'English', 'ar' => 'Arabic'), 'en', array('id' => 'contentEditorLanguages')) }}
    </div>

    <div class="form-group">
        {{ Form::textarea('content_editor') }}
    </div>

@if (Sentry::check() && Sentry::getUser()->hasAccess('translator'))
    <div class="form-group">
        {{ Form::label('translation_complete', 'Translation complete: ', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::checkbox('translation_complete') }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('translation_comment', 'Translation comment:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('translation_comment') }}
        </div>
    </div>
@endif

	<div class="form-group">
		{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
	</div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/vendor/ckeditor/ckeditor.js"></script>


<script>

    // Set the number of languages.
//    document.getElementById( 'count' ).innerHTML = window.CKEDITOR_LANGS.length;

    var editor;

    function createEditor( languageCode ) {
        if ( editor )
            editor.destroy();

        // Replace the <textarea id="editor"> with an CKEditor
        // instance, using default configurations.
        editor = CKEDITOR.replace( 'content_editor', {
            language: languageCode,

            on: {
                instanceReady: function() {
                    // Wait for the editor to be ready to set
                    // the language combo.
                    var languages = document.getElementById( 'contentEditorLanguages' );
                    languages.value = this.langCode;
                    languages.disabled = false;
                }
            }
        });
    }

    // At page startup, load the default language:
    createEditor( '' );

    $('#contentEditorLanguages').unbind('change').bind('change', function() {
        createEditor($(this).val());
    });

</script>
@stop


