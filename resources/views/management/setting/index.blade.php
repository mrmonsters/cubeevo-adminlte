@extends('app')

@section('htmlheader_title')
Setting Management
@endsection

@section('contentheader_title')
Setting Management
@endsection

@section('contentheader_description')
Description for setting management
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
				<h3 class="box-title">Setting</h3>
				<a href="{{ url('admin/manage/setting/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>
			<div class="box-body">
				<table id="tbl-setting" class="table">
					<thead>
						<th width="5%">ID</th>
						<th width="15%">Name</th>
						<th width="20%">Description</th>
						<th width="10%">Type</th>
						<th width="10%">Value</th>
						<th width="10%">Created At</th>
						<th width="10%">Updated At</th>
						<th width="5%">Status</th>
						<th width="15%">Action</th>
					</thead>
					<tbody>
						@if (isset($settings) && !$settings->isEmpty())
						@foreach ($settings as $setting)
						<tr>
							<td>{{ $setting->id }}</td>
							<td>{{ $setting->name }}</td>
							<td>{{ $setting->desc }}</td>
							<td>{{ $setting->type }}</td>
							<td>{{ $setting->value }}</td>
							<td>{{ $setting->created_at }}</td>
							<td>{{ $setting->updated_at }}</td>
							<td>
								@if ($setting->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($setting->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('admin/manage/setting/edit/' . $setting->id) }}" class="btn btn-default">Edit</a>
								<a href="{{ url('admin/manage/setting/destroy/' . $setting->id) }}" class="btn btn-danger">Delete</a>
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
	$('#tbl-setting').DataTable();
});
</script>
@endsection