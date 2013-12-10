<div class="row translatable-basic">
    <div class="col-md-6 translation-en">
        <h4>English</h4>
        <ul>
            <li>
                {{ Form::label('title-en', 'Title:') }}
                {{ Form::text('title-en') }}
            </li>
            <li>
                {{ Form::label('content-en', 'Content: ') }}
                {{ Form::textarea('content-en') }}
            </li>
        </ul>
    </div>
    <div class="col-md-6 translation-ar">
        <h4>Arabic</h4>
        <ul>
            <li>
                {{ Form::label('title-ar', 'Title:') }}
                {{ Form::text('title-ar') }}
            </li>
            <li>
                {{ Form::label('content-ar', 'Content: ') }}
                {{ Form::textarea('content-ar') }}
            </li>
        </ul>
    </div>
</div>