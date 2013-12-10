@extends('layouts.scaffold')

@section('main')

<h1>All ParticipantUploads</h1>

<p>{{ link_to_route('participantUploads.create', 'Add new participantUpload') }}</p>

@if ($participantUploads->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>File_id</th>
				<th>User_id</th>
				<th>Gls_cal_id</th>
				<th>School_id</th>
				<th>Feedback_req_user_id</th>
				<th>Feedback_last_modified</th>
				<th>Shared</th>
				<th>Shared_by_user_id</th>
				<th>Shared_by_user_role_id</th>
				<th>Share_last_modified</th>
				<th>Translated_by_id</th>
				<th>Last_translated</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($participantUploads as $participantUpload)
				<tr>
					<td>{{{ $participantUpload->file_id }}}</td>
					<td>{{{ $participantUpload->user_id }}}</td>
					<td>{{{ $participantUpload->gls_cal_id }}}</td>
					<td>{{{ $participantUpload->school_id }}}</td>
					<td>{{{ $participantUpload->feedback_req_user_id }}}</td>
					<td>{{{ $participantUpload->feedback_last_modified }}}</td>
					<td>{{{ $participantUpload->shared }}}</td>
					<td>{{{ $participantUpload->shared_by_user_id }}}</td>
					<td>{{{ $participantUpload->shared_by_user_role_id }}}</td>
					<td>{{{ $participantUpload->share_last_modified }}}</td>
					<td>{{{ $participantUpload->translated_by_id }}}</td>
					<td>{{{ $participantUpload->last_translated }}}</td>
                    <td>{{ link_to_route('participantUploads.edit', 'Edit', array($participantUpload->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('participantUploads.destroy', $participantUpload->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no participantUploads
@endif

@stop
