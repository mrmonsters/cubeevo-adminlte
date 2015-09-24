@extends('app')

@section('htmlheader_title')
Profile Management
@endsection

@section('contentheader_title')
Profile Management
@endsection

@section('contentheader_description')
Description for profile management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Profile</h3>
				<a href="{{ url('admin/manage/profile/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-profile" class="table">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Title</th>
						<th>Sort Order</th> 
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if (isset($profiles) && !$profiles->isEmpty())
						@foreach ($profiles as $profile)
						<tr>
							<td>{{ $profile->id }}</td>
							<td>{{ $profile->name }}</td>
							<td>{{ $profile->title }}</td>
							<td>{{ $profile->sort_order }}</td> 
							<td>
								@if ($profile->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($profile->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								@if ($profile->status == '2')
								<a href="{{ url('admin/manage/profile/setInactive/' . $profile->id) }}" class="btn btn-default">Set Inactive</a>
								@elseif ($profile->status == '1')
								<a href="{{ url('admin/manage/profile/setActive/' . $profile->id) }}" class="btn btn-default">Set Active</a>
								@endif
								<a href="{{ url('admin/manage/profile/edit/' . $profile->id) }}" class="btn btn-default">Edit</a>
								<a onclick="javascript: if (confirm('Are you sure you want to delete this?')) { href='{{ url('admin/manage/profile/destroy/' . $profile->id) }}'} else { alert('Delete Cancelled.');return false; }; " href="#" class="btn btn-danger">Delete</a>
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
	$('#tbl-profile').DataTable();
});
</script>
@endsection