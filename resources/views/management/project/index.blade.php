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
						<th>Grid Front Image</th>
						<th>Client Name</th>
						<th>Project Name</th> 
						<th>Category</th> 
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if (isset($projects) && !$projects->isEmpty())
						@foreach ($projects as $project)
						<tr>
							<td>{{ $project->id }}</td>
							<td ><img id="grid_img" class="img-thumbnail" src="{{ ($project->grid_img_id) ? $project->frontImage->dir : '' }}" alt="{{ ($project->grid_img_id) ? $project->frontImage->name : '' }}" width="100px"></td>
							<td class="col-md-3">{{ $project->client_name }}</td>
							<td>{{ $project->name }}</td> 
							<td>	
							@foreach ($categories as $category)
								@if(isset($project->category_id) && $project->category_id == $category->id)
									{{ $category->name }}
								@endif
							@endforeach
							</td> 
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
								@if ($project->status == '2')
								<a href="{{ url('admin/manage/project/setInactive/' . $project->id) }}" class="btn btn-default">Set Inactive</a>
								@elseif ($project->status == '1')
								<a href="{{ url('admin/manage/project/setActive/' . $project->id) }}" class="btn btn-default">Set Active</a>
								@endif
								<a href="{{ url('admin/manage/project/edit/' . $project->id) }}" class="btn btn-default">Edit</a>
								<a onclick="javascript: if (confirm('Are you sure you want to delete this?')) { href='{{ url('admin/manage/project/destroy/' . $project->id) }}'} else { alert('Delete Cancelled.') }; " href="{{ url('admin/manage/project/destroy/' . $project->id) }}" class="btn btn-danger">Delete</a>
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