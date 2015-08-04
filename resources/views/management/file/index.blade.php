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
<div class="row">

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">File</h3>
				<a href="{{ url('manage/file/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>

			<div class="box-body">
				<table class="table">
					<thead>
						<th width="5%">ID</th>
						<th width="15%">Name</th>
						<th width="10%">Type</th>
						<th width="25%">Directory</th>
						<th width="10%">Size</th>
						<th width="10%">Created At</th>
						<th width="10%">Updated At</th>
						<th width="5%">Status</th>
						<th width="10%">Action</th>
					</thead>
					<tbody>
						@if (isset($files) && !$files->isEmpty())
						@foreach ($files as $file)
						<tr>
							<td>{{ $file->file_id }}</td>
							<td>{{ $file->file_name }}</td>
							<td>{{ $file->file_type }}</td>
							<td>{{ $file->file_dir }}</td>
							<td>{{ $file->file_size }}</td>
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
								<a href="{{ url('manage/file/edit/' . $file->file_id) }}" class="btn btn-default">Edit</a>
								<a href="{{ url('manage/file/destroy/' . $file->file_id) }}" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>

			<div class="box-footer clearfix">
				<div style="text-align: center;">
					Displaying <span class="label label-success">{{ $files->count() }}</span> result(s)
				</div>	
			</div>
		</div>
	</div>

</div>
@endsection