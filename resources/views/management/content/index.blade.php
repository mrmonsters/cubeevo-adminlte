@extends('app')

@section('htmlheader_title')
Content Management
@endsection

@section('contentheader_title')
Content Management
@endsection

@section('contentheader_description')
Description for content management
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
				<h3 class="box-title">Content</h3>
				<a href="{{ url('admin/manage/content/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-content" class="table">
					<thead>
						<th width="5%">ID</th>
						<th width="15%">Title</th>
						<th width="30%">Description</th>
						<th width="10%">Created At</th>
						<th width="10%">Updated At</th>
						<th width="5%">Status</th>
						<th width="15%">Action</th>
					</thead>
					<tbody>
						@if (isset($contents) && !$contents->isEmpty())
						@foreach ($contents as $content)
						<tr>
							<td>{{ $content->id }}</td>
							<td>{{ $content->title }}</td>
							<td>{{ $content->desc }}</td>
							<td>{{ $content->created_at }}</td>
							<td>{{ $content->updated_at }}</td>
							<td>
								@if ($content->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($content->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('admin/manage/content/edit/' . $content->id) }}" class="btn btn-default">Edit</a>
								<a href="{{ url('admin/manage/content/destroy/' . $content->id) }}" class="btn btn-danger">Delete</a>
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
	$('#tbl-content').DataTable();
});
</script>
@endsection