@extends('app')

@section('htmlheader_title')
Solution Management
@endsection

@section('contentheader_title')
Solution Management
@endsection

@section('contentheader_description')
Description for solution management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Solution</h3>
				<a href="{{ url('admin/manage/solution/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-solution" class="table">
					<thead>
						<th>ID</th>
						<th>Grid Front Image</th> 
						<th>Name</th> 
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if (isset($solutions) && !$solutions->isEmpty())
						@foreach ($solutions as $solution)
						<tr>
							<td>{{ $solution->id }}</td>
							<td class="col-xs-2"><img id="grid_img" class="img-thumbnail" src="{{ $solution->frontImage->dir }}" alt="{{ $solution->frontImage->name }}" width="150"></td> 
							<td class="col-xs-6">{{ $solution->name }}</td> 
							<td>
								@if ($solution->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($solution->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('admin/manage/solution/edit/' . $solution->id) }}" class="btn btn-default">Edit</a>
								<a onclick="javascript: if (confirm('Are you sure you want to delete this?')) { href='{{ url('admin/manage/solution/destroy/' . $solution->id) }}'} else { alert('Delete Cancelled.') }; " href="#"  class="btn btn-danger">Delete</a>
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
	$('#tbl-solution').DataTable();
});
</script>
@endsection