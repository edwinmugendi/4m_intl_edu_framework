@extends('layouts.scaffold')

@section('main')

<h1>Show UserInfo</h1>

<p>{{ link_to_route('userInfos.index', 'Return to all userInfos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>User_id</th>
				<th>First_name</th>
				<th>Last_name</th>
				<th>Screen_name</th>
				<th>G_cal_id</th>
				<th>Coach_id</th>
				<th>Position</th>
				<th>User_image</th>
				<th>Sort_index</th>
				<th>Enabled</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $userInfo->user_id }}}</td>
					<td>{{{ $userInfo->first_name }}}</td>
					<td>{{{ $userInfo->last_name }}}</td>
					<td>{{{ $userInfo->screen_name }}}</td>
					<td>{{{ $userInfo->g_cal_id }}}</td>
					<td>{{{ $userInfo->coach_id }}}</td>
					<td>{{{ $userInfo->position }}}</td>
					<td>{{{ $userInfo->user_image }}}</td>
					<td>{{{ $userInfo->sort_index }}}</td>
					<td>{{{ $userInfo->enabled }}}</td>
                    <td>{{ link_to_route('userInfos.edit', 'Edit', array($userInfo->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('userInfos.destroy', $userInfo->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
