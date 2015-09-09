@extends('app')

@section('htmlheader_title')
Static Page Management
@endsection

@section('contentheader_title')
Static Page Management
@endsection

@section('contentheader_description')
Description for static page management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Static Page</h3>
				<a href="{{ url('admin/manage/page/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-page" class="table">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Slug</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if (isset($pages) && !$pages->isEmpty())
						@foreach ($pages as $page)
						<tr>
							<td>{{ $page->id }}</td>
							<td>{{ $page->name }}</td>
							<td>{{ $page->slug }}</td>
							<td>{{ $page->created_at }}</td>
							<td>{{ $page->updated_at }}</td>
							<td>
								@if ($page->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($page->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('admin/manage/page/edit/' . $page->id) }}" class="btn btn-default">Edit</a>
								<a onclick="javascript: if (confirm('Are you sure you want to delete this?')) { href='{{ url('admin/manage/page/destroy/' . $page->id) }}'} else { alert('Delete Cancelled.') }; " href="{{ url('admin/manage/page/destroy/' . $page->id) }}" class="btn btn-danger">Delete</a>
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
	$('#tbl-page').DataTable();
});
</script>
@endsection