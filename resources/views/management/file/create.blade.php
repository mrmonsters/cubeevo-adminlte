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
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<form method="POST" action="{{ url('manage/file/store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<div class="box-header with-border">
					<h3 class="box-title">Create File</h3>
				</div>  
				<div class="box-body"> 
					<div class="form-group">
						<label for="name" class="control-label">File</label>
						<input type="file" class="form-control" id="file" name="file" />
					</div>  
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/file/') }}" class="btn btn-default">Cancel</a> 
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection