@extends('app')

@section('htmlheader_title')
Job Management
@endsection

@section('contentheader_title')
Job Management
@endsection

@section('contentheader_description')
Description for job management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Job</h3>
				<a href="{{ url('admin/manage/job/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-job" class="table">
					<thead>
						<th>ID</th>
						<th>Title</th>
						<th>Sort Order</th> 
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if (isset($jobs) && !$jobs->isEmpty())
						@foreach ($jobs as $job)
						<tr>
							<td>{{ $job->id }}</td>
							<td>{{ $job->title }}</td>
							<td>{{ $job->sort_order }}</td> 
							<td>
								@if ($job->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($job->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								@if ($job->status == '2')
								<a href="{{ url('admin/manage/job/setInactive/' . $job->id) }}" class="btn btn-default">Set Inactive</a>
								@elseif ($job->status == '1')
								<a href="{{ url('admin/manage/job/setActive/' . $job->id) }}" class="btn btn-default">Set Active</a>
								@endif
								<a href="{{ url('admin/manage/job/edit/' . $job->id) }}" class="btn btn-default">Edit</a>
								<a onclick="javascript: if (confirm('Are you sure you want to delete this?')) { href='{{ url('admin/manage/job/destroy/' . $job->id) }}'} else { alert('Delete Cancelled.');return false; }; " href="#" class="btn btn-danger">Delete</a>
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
	$('#tbl-job').DataTable();
});
</script>
@endsection