@extends('app')

@section('htmlheader_title')
Blog Post Management
@endsection

@section('contentheader_title')
Blog Post Management
@endsection

@section('contentheader_description')
Description for post management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Blog Post</h3>
				<a href="{{ url('admin/manage/post/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-post" class="table">
					<thead>
						<th>ID</th>
						<th>Cover Image</th>
						<th>Title</th> 
						<th>Sort Order</th> 
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if (isset($posts) && !$posts->isEmpty())
						@foreach ($posts as $post)
						<tr>
							<td>{{ $post->id }}</td>
							<td class="col-xs-2"><img id="grid_img" class="img-thumbnail" src="{{ $post->coverImage->dir }}" alt="{{ $post->coverImage->name }}" width="150"></td> 
							<td class="col-xs-5">{{ $post->title }}</td> 
							<td class="col-xs-1">{{ $post->sort_order }}</td> 
							<td>
								@if ($post->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($post->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								@if ($post->status == '2')
								<a href="{{ url('admin/manage/post/setInactive/' . $post->id) }}" class="btn btn-default">Set Inactive</a>
								@elseif ($post->status == '1')
								<a href="{{ url('admin/manage/post/setActive/' . $post->id) }}" class="btn btn-default">Set Active</a>
								@endif
								<a href="{{ url('admin/manage/post/edit/' . $post->id) }}" class="btn btn-default">Edit</a>
								<a onclick="javascript: if (confirm('Are you sure you want to delete this?')) { href='{{ url('admin/manage/post/destroy/' . $post->id) }}'} else { alert('Delete Cancelled.');return false; }; " href="#" class="btn btn-danger">Delete</a>
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
	$('#tbl-post').DataTable();
});
</script>
@endsection