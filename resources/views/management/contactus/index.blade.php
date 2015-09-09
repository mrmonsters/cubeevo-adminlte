@extends('app')

@section('htmlheader_title')
Contact Us Management
@endsection

@section('contentheader_title')
Contact Us Management
@endsection

@section('contentheader_description')
Description for contact us management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Contact Us</h3>
			</div>
			<div class="box-body">
				<table id="tbl-message" class="table">
					<thead>
						<th width="5%">ID</th>
						<th width="15%">Subject</th>
						<th width="15%">Name</th>
						<th width="10%">Created At</th>
						<th width="10%">Updated At</th>
						<th width="10%">Status</th>
						<th width="15%">Action</th>
					</thead>
					<tbody>
						@if (isset($messages) && !$messages->isEmpty())
						@foreach ($messages as $message)
						<tr>
							<td>{{ $message->id }}</td>
							<td>{{ $message->subject }}</td>
							<td>{{ $message->name }}</td>
							<td>{{ $message->created_at }}</td>
							<td>{{ $message->updated_at }}</td>
							<td>
								@if ($message->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($message->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('admin/manage/message/show/' . $message->id) }}" class="btn btn-default">View</a>
								<a  onclick="javascript: if (confirm('Are you sure you want to delete this?')) { href='{{ url('admin/manage/message/destroy/' . $message->id) }}'} else { alert('Delete Cancelled.');return false; }; "   href="#"  class="btn btn-danger">Delete</a>
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
	$('#tbl-message').DataTable();
});
</script>
@endsection