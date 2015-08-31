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
			<div class="box-header with-border">
				<h3 class="box-title">View File #{{ $file->id }}</h3>
			</div>
			<div class="row" style="padding-top: 20px;">
				<div class="col-md-10 col-md-offset-1" style="text-align: center;">
					<img src="{{ $file->dir }}" alt="{{ $file->name }}" class="img-thumbnail" />
				</div>
			</div>
			<hr />
			<div class="box-body">
				<div class="form-group">
					<label for="name" class="control-label">File Name</label>
					<input id="name" name="name" type="text" class="form-control" value="{{ $file->name }}" readonly />
				</div>
				<div class="form-group">
					<label for="dir" class="control-label">Directory</label>
					<input id="dir" name="dir" type="text" class="form-control" value="{{ $file->dir }}" readonly />
				</div>
			</div>
			<div class="box-footer clearfix">
				<div class="pull-right">
					<a href="{{ url('/admin/manage/file/') }}" class="btn btn-default">Cancel</a>
					<a href="{{ url('/admin/manage/file/destroy/' . $file->id) }}" class="btn btn-danger">Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection