@extends('app')

@section('htmlheader_title')
Project Management
@endsection

@section('contentheader_title')
Project Management
@endsection

@section('contentheader_description')
Description for project management
@endsection

@section('main-content')
@if (isset($response) && !empty($response))
	@if ($response['status'] == 1)
		@include('partials.msg-success')
	@elseif ($response['status'] == 0)
		@include('partials.msg-error')
	@endif
@endif

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Project</h3>
				<a href="{{ url('admin/manage/project/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-project" class="table">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if (isset($projects) && !$projects->isEmpty())
						@foreach ($projects as $project)
						<tr>
							<td>{{ $project->id }}</td>
							<td>{{ $project->name }}</td>
							<td>{{ $project->created_at }}</td>
							<td>{{ $project->updated_at }}</td>
							<td>
								@if ($project->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($project->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('admin/manage/project/edit/' . $project->id) }}" class="btn btn-default">Edit</a>
								<a href="{{ url('admin/manage/project/destroy/' . $project->id) }}" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('addon-script')
<script type="text/javascript">
$(document).ready(function()
{
	$('#tbl-project').DataTable();
});
</script>
@endsection