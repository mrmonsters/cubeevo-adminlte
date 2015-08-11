@extends('app')

@section('htmlheader_title')
File Management
@endsection

@section('contentheader_title')
File Management
@endsection

@section('contentheader_description')
Description for file management
@endsection

@section('main-content')
@if (isset($response) && !empty($response))
	@if ($response['status'] == 1)
		@include('partials.msg-success')
	@elseif ($response['status'] == 0)
		@include('partials.msg-error')
	@endif
@endif

<div class="container">
	<div class="row">
		<div class="col-md-10 col-offset-md-1">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Upload New File</h3>
				</div>
				<form method="POST" action="{{ url('manage/file/store') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
					<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
					<div class="box-body">
						<div class="form-group">
							<label for="file_new" class="control-label col-md-2">New File</label>
							<div class="col-md-10">
								<input id="file_new" name="file_new" type="file" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label for="file_name" class="control-label col-md-2">File Name</label>
							<div class="col-md-10">
								<input id="file_name" name="file_name" type="text" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label for="base_dir" class="control-label col-md-2">Directory</label>
							<div class="col-md-10">
								<input id="base_dir" name="base_dir" type="text" class="form-control" />
							</div>
						</div>
					</div>
					<div class="box-footer clearfix">
						<div class="pull-right">
							<a href="{{ url('/manage/file/') }}" class="btn btn-default">Cancel</a>
							<button type="submit" class="btn btn-primary">Upload</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection