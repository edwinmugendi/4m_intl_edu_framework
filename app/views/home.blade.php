@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Welcome to the ADEC website!
@stop

{{-- Content --}}
@section('content')

<h1>Welcome!</h1>
<div class="well">
    <p>Welcome to the international-edu Abu Dhabi Leadership Capacity Building Program Website.
       <!-- <br/> <i>(your browser currently reports your language as {{ (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'ar') ? 'Arabic' : 'English'; }})</i><br/> -->
    </p>
    @if (Sentry::check())
<!--        You are currently logged in.   -->
        @if (Sentry::getUser()->hasAccess('admin'))
            <h4>Notices:</h4>
            <div class="well">
                <p>... no notices as this time ...</p>
            </div>
        @endif
    @endif
</div>

@if (Sentry::check())
    <div id="dash-tri-panel" class="row">
        <div class="col-md-4 dash_panel-container">
            <div id="dash_gls_materials" class="dash-panel">
                <h5><span class="lang-en">GLS Materials</span><br/><span class="lang-ar">مجموعة تعلم المواد الدورة</span></h5>
                <div id="add_materials_link" class="dash_panel_upload">
                    <div type="button" class="btn btn-sm" data-toggle="modal" data-target="#upload_materials_modal">
                        <span class="glyphicon glyphicon-cloud-upload"></span>
                        <span class="lang-en">add a file</span><br/><span class="lang-ar">إضافة مورد</span>
                    </div>
                </div>
                <div class="panel-instructions">
                    <!-- GLS Listing Dropdown -->
                    <div class="center-block">
                           <div class="btn-group dash-panel-dropdown">
                            <button class="btn btn-default btn-xs dropdown-toggle col-md-12" type="button" data-toggle="dropdown">
                                <span class="lang-en">Choose a Group Learning Session to view files &nbsp;&nbsp;</span> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                @if (count($glss) > 0)
                                    @foreach ($glss as $gls)
                                    <li><a id="{{{ $gls->id }}}" class="gls-materials-link">{{{ $gls->name}}}</a></li>
                                    @endforeach
                                @else
                                   <li>No GLSs found</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="panel-content">

                </div>
            </div>
        </div>

        <div class="col-md-4 dash_panel-container">
            <div id="dash_leadership_activities" class="dash-panel">
                <h5><span class="lang-en">Leadership Activities</span><br/><span class="lang-ar">أنشطة القيادة</span></h5>
                <div class="panel-instructions text-center">
                    <span class="lang-en">School{{ count($userSchools) > 1 ? "s" : "" }}: {{ implode(', ', $userSchools) }}</span>
                </div>
                <div class="panel-content">

                </div>
            </div>
        </div>

        <div class="col-md-4 dash_panel-container">
            <div id="dash_resources" class="dash-panel">
                <h5><span class="lang-en">Resources</span><br/><span class="lang-ar">موارد</span></h5>
                <div id="add_resource_link" class="dash_panel_upload">
                    <div type="button" class="btn btn-sm" data-toggle="modal" data-target="#resource_upload">
                        <span class="glyphicon glyphicon-cloud-upload"></span>
                        <span class="lang-en">add a resource</span><br/><span class="lang-ar">إضافة مورد</span>
                    </div>
                </div>

                <div class="panel-instructions text-center"><span class="lang-en">Choose a Category below to view related Resources</span></div>
                <div class="panel-content">
                    <div class="resource-tag tag-all"><span class="lang-en">View All</span>&nbsp;|&nbsp;<span class="lang-ar">عرض الكل</span></div>
                    @if (count($tags) > 0)
                        @foreach ($tags as $tag)
                            <div class="resource-tag"><span class="lang-en">{{{ $tag->languages['en']['title'] }}}</span>&nbsp;|&nbsp;<span class="lang-ar">{{{ $tag->languages['ar']['title'] }}}</span></div>
                        @endforeach
                    @endif




                </div>
            </div>
        </div>
    </div>


    <div class="clear"></div>





    <div class="row">
        <div class="center-block">
            <h2 class="center-block dash-section-title">GLS Discussions</h2>
        </div>
    </div>

    <div id="dash-discussions-panel" class="row">
        <div class="container">
            <div id="dash_discussion_list" class="col-md-4 list-group">
                <h5 class="dash-section-title">List of GLS Discussions</h5>
                @if (count($discussions) > 0)
                    @foreach ($discussions as $disc)
                        <div class="dash_disc_name list-group-item btn">
                            {{ $disc->gls->name }}

                        <!-- Don't allow Participants or EmirateVPs to change Discussion state -->
                            @if (Sentry::getUser()->hasAnyAccess(array('admin', 'manager', 'supervisor', 'coach')))
                            <div class="discussion-toggle-button">
                                <div class="switch switch-small" data-on-label="open" data-on='info' data-off-label="closed">
                                    <input name="discussions[{{ $disc->id }}]" type="checkbox" {{ ( $activeDiscussions->contains($disc->id)) ? 'checked' : '' }} >
                                </div>
                            </div>
                            @endif

                        </div>
                    @endforeach
                @endif

            </div>
            <div id="dash_discussions_detail" class="col-md-8">
                <div id="dash_discussion_topics">
                    <p>Select a discussion to the left to view it's topics.</p>
                </div>
            </div>
        </div>
    </div>





<!-- Modal -->
<div id="resource_upload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="resource_upload_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="resource_upload_label"><span class="lang-en">Contribute/Edit Your Resource</span> | <span class="lang-ar">المساهمة أو تعديل موقعك هنا</span></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="well">
                        {{ Form::open(array('route' => array('files.index'), 'role' => 'form')) }}
                        <div class="form-group">
                            {{ Form::label('file', 'File:', array('class' => 'control-label')) }}
                            {{ Form::file('file') }}
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                {{ Form::label('title_en', 'English Title', array('class' => 'control-label')) }}
                                {{ Form::text('title_en', '', array('class'=>'form-control', 'placeholder' => 'English here')) }}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::label('title_ar', 'Arabic Title', array('class' => 'control-label  lang-ar')) }}
                                {{ Form::text('title_ar', '', array('class' => 'form-control lang-ar', 'placeholder' => 'العربية هنا')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('description_en', 'File Description (in English)', array('class' => 'control-label')) }}
                            {{ Form::text('description_en', '', array('class'=>'form-control', 'placeholder' => 'English Description Here')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('description_ar', 'File Description (in Arabic)', array('class' => 'control-label')) }}
                            {{ Form::text('description_ar', '', array('class' => 'form-control lang-ar', 'placeholder' => 'وصف عربية هنا')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('language_code', 'File Language', array('class' => 'control-label')) }}
                            {{ Form::select('language_code', array('en' => 'English', 'ar' => 'Arabic'), 'en', array('class'=>'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('file_categories', 'File Content Categories', array('class' => 'control-label')) }}
                            <div class="container">
                                @foreach ($tags as $tag)
                                    <div id="file_category_{{{ $tag->id }}}" class="file-content-category btn">
                                        <span class="glyphicon glyphicon-unchecked"></span>&nbsp;{{{ $tag->languages['en']['title'] }}}&nbsp;|&nbsp;{{{ $tag->languages['ar']['title'] }}}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{ Form::close() }}


                        <!-- add new category -->
                        <div class="dash-add-category form-group">
                        {{ Form::open(array('route' => array('tags.create'), 'role' => 'form')) }}
                            {{ Form::label('new_file_category', 'Add a New Category to List:', array('class' => 'control-label')) }}
                            <div class="row form-horizontal">
                                <div class="form-group col-md-5">
                                    {{ Form::text('new_category_en', '', array('placeholder' => 'English here')) }}
                                </div>
                                <div class="form-group col-md-5">
                                    {{ Form::text('new_category_ar', '', array('class' => 'lang-ar', 'placeholder' => 'العربية هنا')) }}
                                </div>
                                <div class="form-group col-md-2">
                                    {{ Form::submit('Add | أضاف', array('class' => 'btn btn-info')) }}
                                </div>
                            </div>
                            <div class="center alert alert-warning"><b>WARNING:</b> You are NOT done until you click the Submit button below!</div>
                        {{ Form::close() }}
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="lang-en">Cancel</span> | <span class="lang-ar">إلغاء</span></button>
                <button type="button" class="btn btn-primary"><span class="lang-en">Submit</span> | <span class="lang-ar">حفظ التغييرات</span></button>
            </div>

            @if ($errors->any())
            <ul>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </ul>
            @endif

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- GLS Materials - upload modal -->
<div id="upload_materials_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="upload_materials_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="upload_materials_label"><span class="lang-en">Upload a GLS Materials file</span> | <span class="lang-ar">المساهمة أو تعديل موقعك هنا</span></h4>
            </div>
            <div class="modal-body">
                
                @if ($errors->any())
                <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
                @endif
                <div class="row">
                    <div class="well">
                    {{ Form::open(array('route' => array('files.index'), 'class' => 'form-horizontal', 'role' => 'form')) }}
                    <div class="form-group">
                        {{ Form::label('file', 'File:', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::file('file') }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('title_en', 'English title:', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('title_en') }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('title_ar', 'Arabic title:', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('title_ar','', array('class' => 'lang-ar')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('admin_notes', 'Admin notes:', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('admin_notes') }}
                        </div>
                    </div>
                

                {{ Form::close() }}
                </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="lang-en">Cancel</span> | <span class="lang-ar">إلغاء</span></button>
                <button type="button" class="btn btn-primary"><span class="lang-en">Save</span> | <span class="lang-ar">حفظ التغييرات</span></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif

@stop

@script


@stop