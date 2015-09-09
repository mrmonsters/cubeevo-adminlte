@extends('app')

@section('htmlheader_title')
Block Management
@endsection

@section('contentheader_title')
Block Management
@endsection

@section('contentheader_description')
Description for block management
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
				<h3 class="box-title">Block</h3>
				<a href="{{ url('admin/manage/block/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-block" class="table">
					<thead>
						<th width="5%">ID</th>
						<th width="15%">Title</th>
						<th width="30%">Description</th>
						<th width="10%">Locale</th>
						<th width="10%">Created At</th>
						<th width="10%">Updated At</th>
						<th width="5%">Status</th>
						<th width="15%">Action</th>
					</thead>
					<tbody>
						@if (isset($blocks) && !$blocks->isEmpty())
						@foreach ($blocks as $block)
						<tr>
							<td>{{ $block->id }}</td>
							<td>{{ $block->title }}</td>
							<td>{{ $block->desc }}</td>
							<td>{{ $block->locale }}</td>
							<td>{{ $block->created_at }}</td>
							<td>{{ $block->updated_at }}</td>
							<td>
								@if ($block->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($block->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('admin/manage/block/edit/' . $block->id) }}" class="btn btn-default">Edit</a>
								<a onclick="javascript: if (confirm('Are you sure you want to delete this?')) { href='{{ url('admin/manage/block/destroy/' . $block->id) }}'} else { alert('Delete Cancelled.');return false; }; " href="#" class="btn btn-danger">Delete</a>
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
	$('#tbl-block').DataTable();
});
</script>
@endsection