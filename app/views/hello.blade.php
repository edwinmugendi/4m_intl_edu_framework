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
        <br/>
        <i>(your browser currently reports your language as {{ (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'ar') ? 'Arabic' : 'English'; }})</i><br/>
    </p>
    @if (Sentry::check())
<!--        You are currently logged in.   -->
        @if (Sentry::getUser()->hasAccess('admin'))
            <h4>Admin Options</h4>
            <div class="well">
                <button class="btn btn-info" onClick="location.href='{{ URL::to('users') }}'">View Users</button>
                <button class="btn btn-info" onClick="location.href='{{ URL::to('groups') }}'">View Groups</button>
            </div>
        @endif
    @endif
</div>

@if (Sentry::check())
    <div id="dash-tri-panel" class="row">
        <div class="col-md-4 dash_panel-container">
            <div id="dash_gls_materials" class="dash-panel">
                <h5><span class="lang-en">GLS Materials</span><br/>** Arabic version ** </h5>
                <div class="panel-instructions">
                    <span class="lang-en">Choose a Group Learning Session to view files</span>
                </div>
                <div class="panel-content">

                </div>
            </div>
        </div>

        <div class="col-md-4 dash_panel-container">
            <div id="dash_leadership_activities" class="dash-panel">
                <h5>Leadership Activities<br/>** Arabic version ** </h5>
                <div class="panel-instructions">
                    <span class="lang-en">School {{ User::find(Sentry::getUser()->getId())->school->name }}</span>
                </div>
                <div class="panel-content">

                </div>
            </div>
        </div>

        <div class="col-md-4 dash_panel-container">
            <div id="dash_resources" class="dash-panel">
                <h5>Resources<br/>** Arabic version ** </h5>
                <div class="panel-instructions"> &nbsp; </div>
                <div class="panel-content">

                </div>
            </div>
        </div>
    </div>

    <div id="dash-discussions-panel" class="row">
        <div id="dash-discussion-list" class="col-sm-4">

        </div>
        <div id="dash_discussions_detail" class="col-sm-8">
            Select a discussion to the left to view it's posts.
        </div>
    </div>
@endif

@stop