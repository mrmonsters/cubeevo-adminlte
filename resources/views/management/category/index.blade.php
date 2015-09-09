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
						<th>Grid Front Image</th>
						<th>Name</th> 
						<th>Sort Order</th> 
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if (isset($categories) && !$categories->isEmpty())
						@foreach ($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td class="col-xs-2"><img id="grid_img" class="img-thumbnail" src="{{ $category->frontImage->dir }}" alt="{{ $category->frontImage->name }}" width="150"></td> 
							<td class="col-xs-5">{{ $category->name }}</td> 
							<td class="col-xs-1">{{ $category->sort_order }}</td> 
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
								<a onclick="javascript: if (confirm('Are you sure you want to delete this?')) { href='{{ url('admin/manage/category/destroy/' . $category->id) }}'} else { alert('Delete Cancelled.');return false; }; " href="#" class="btn btn-danger">Delete</a>
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