@extends('app')

@section('htmlheader_title')
File Management
@endsection

@section('contentheader_title')
File Management
@endsection

@section('contentheader_description')
Description for file management
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
				<h3 class="box-title">File</h3>
				<a href="{{ url('admin/manage/file/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-file" class="table">
					<thead>
						<th width="5%">ID</th>
						<th width="15%">Name</th>
						<th width="10%">Type</th>
						<th width="25%">Directory</th>
						<th width="10%">Created At</th>
						<th width="10%">Updated At</th>
						<th width="10%">Status</th>
						<th width="15%">Action</th>
					</thead>
					<tbody>
						@if (isset($files) && !$files->isEmpty())
						@foreach ($files as $file)
						<tr>
							<td>{{ $file->id }}</td>
							<td>{{ $file->name }}</td>
							<td>{{ $file->type }}</td>
							<td>{{ $file->dir }}</td>
							<td>{{ $file->created_at }}</td>
							<td>{{ $file->updated_at }}</td>
							<td>
								@if ($file->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($file->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('admin/manage/file/edit/' . $file->id) }}" class="btn btn-default">Edit</a>
								<a href="{{ url('admin/manage/file/destroy/' . $file->id) }}" class="btn btn-danger">Delete</a>
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
	$('#tbl-file').DataTable();
});
</script>
@endsection