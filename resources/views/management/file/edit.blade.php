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

	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Edit File #{{ $file->file_id }}</h3>
			</div>

			<form method="POST" action="{{ url('manage/file/update/' . $file->file_id) }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input name="_method" type="hidden" value="PUT" />
				<div class="box-body">
					<div class="form-group">
						<label for="file_name" class="control-label">File Name</label>
						<input id="file_name" name="file_name" type="text" class="form-control" value="{{ $file->file_name }}" />
					</div>

					<div class="form-group">
						<label for="base_dir" class="control-label">Directory</label>
						<input id="base_dir" name="base_dir" type="text" class="form-control" value="{{ $file->file_dir }}" />
					</div>
				</div>

				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/manage/file/') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="col-md-8">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Preview</h3>
			</div>
			<div class="box-body">
				@if ($isImage)
				<img src="{{ $file->file_dir }}" alt="{{ $file->file_desc }}" width="100%" />
				@elseif ($isDocument)
				<p>Document type file.</p>
				@endif
			</div>
			<div class="box-footer clearfix">
				<a href="{{ URL::to($file->file_dir) }}" target="_blank" class="btn btn-primary pull-right">Open in New Tab</a>
			</div>
		</div>
	</div>

</div>
@endsection