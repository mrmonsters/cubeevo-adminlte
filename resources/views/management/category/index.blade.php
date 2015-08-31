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
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Category</h3>
				<a href="{{ url('admin/manage/category/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-category" class="table">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if (isset($categories) && !$categories->isEmpty())
						@foreach ($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
							<td>{{ $category->created_at }}</td>
							<td>{{ $category->updated_at }}</td>
							<td>
								@if ($category->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($category->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('admin/manage/category/edit/' . $category->id) }}" class="btn btn-default">Edit</a>
								<a href="{{ url('admin/manage/category/destroy/' . $category->id) }}" class="btn btn-danger">Delete</a>
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
	$('#tbl-category').DataTable();
});
</script>
@endsection