@extends('app')

@section('htmlheader_title')
Category Management
@endsection

@section('contentheader_title')
Category Management
@endsection

@section('contentheader_description')
Description for category management
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
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Category</h3>
			</div>
			<form method="POST" action="{{ url('manage/category/store') }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input id="id" name="id" type="hidden" value="" />
				<div class="box-body">
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input id="name" name="name" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="desc" class="control-label">Description</label>
						<input id="desc" name ="desc" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="sort_order" class="control-label">Sort Order</label>
						<input id="sort_order" name ="sort_order" type="text" class="form-control" />
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/category/') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add Projects</h3>
			</div>
			<div class="box-body">
				<table id="tbl-project" class="table">
					<thead>
						<th width="80%">Name</th>
						<th>Action</th>
					</thead>
					<tbody>
					@if (isset($projects) && !$projects->isEmpty())
					@foreach ($projects as $project)
						<tr>
							<td>{{ $project->name }}</td>
							<td><button type="button" class="btn btn-primary" onclick="addProject('{{ $project->id }}', this)">Add</button></td>
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
function addProject(projectId, btn)
{
	var oriProjectIds = $('#id').val();
	var projectIds = (oriProjectIds != '') ? oriProjectIds + ", " + projectId : projectId;
	$('#id').val(projectIds);

	var newHtml = '<button type="button" class="btn btn-danger" onclick="removeProject('+ projectId +', this)">Remove</button>';
	$(btn).replaceWith(newHtml);
}

function removeProject(projectId, btn)
{
	var projectIds = $('#id').val().replace(projectId, "");
	var projectIds = projectIds.replace(projectId, "");
	var projectIds = projectIds.replace(projectId + ", ", "");
	$('#id').val(projectIds);

	var newHtml = '<button type="button" class="btn btn-primary" onclick="addProject('+ projectId +', this)">Add</button>';
	$(btn).replaceWith(newHtml);
}
</script>
@endsection