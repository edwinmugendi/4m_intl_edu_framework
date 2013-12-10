@extends('layouts.scaffold')

@section('main')

<h1>All Translations</h1>

<p>{{ link_to_route('translations.create', 'Add new translation') }}</p>

@if ($translations->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Translatable_type</th>
				<th>Translatable_id</th>
				<th>Language_code</th>
				<th>Title</th>
				<th>Content</th>
				<th>Notes</th>
				<th>Created_by_id</th>
				<th>Last_updated_by_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($translations as $translation)
				<tr>
					<td>{{{ $translation->translatable_type }}}</td>
					<td>{{{ $translation->translatable_id }}}</td>
					<td>{{{ $translation->language_code }}}</td>
					<td>{{{ $translation->title }}}</td>
					<td>{{{ $translation->content }}}</td>
					<td>{{{ $translation->notes }}}</td>
					<td>{{{ $translation->created_by_id }}}</td>
					<td>{{{ $translation->last_updated_by_id }}}</td>
                    <td>{{ link_to_route('translations.edit', 'Edit', array($translation->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('translations.destroy', $translation->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no translations
@endif

@stop
