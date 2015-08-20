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
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Setting</h3>
			</div>
			<form method="POST" action="{{ url('manage/setting/store') }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<div class="box-body">
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input id="name" name="name" type="text" class="form-control" value="" />
					</div>
					<div class="form-group">
						<label for="desc" class="control-label">Description</label>
						<input id="desc" name ="desc" type="text" class="form-control" value="" />
					</div>
					<div class="form-group">
						<label for="value" class="control-label">Value</label>
						<input id="value" name ="value" type="text" class="form-control" value="" />
					</div>
					<div class="form-group">
						<label for="type" class="control-label">Type</label>
						<select id="type" name="type" class="form-control">
							<option value="site">Site</option>
							<option value="user">User</option>
						</select>
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/setting/') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection