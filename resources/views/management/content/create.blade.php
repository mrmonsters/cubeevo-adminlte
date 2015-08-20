@extends('app')

@section('htmlheader_title')
Content Management
@endsection

@section('contentheader_title')
Content Management
@endsection

@section('contentheader_description')
Description for content management
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
				<h3 class="box-title">Page Content</h3>
			</div>
			<form method="POST" action="{{ url('manage/content/update/' . $content->id) }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input name="_method" type="hidden" value="PUT" />
				<div class="box-body">
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input id="title" name="title" type="text" class="form-control" value="" />
					</div>
					<div class="form-group">
						<label for="desc" class="control-label">Description</label>
						<input id="desc" name ="desc" type="text" class="form-control" value="" />
					</div>
					<div class="form-group">
						<label for="locale" class="control-label">Locale / Language</label>
						<select id="locale" name="locale" class="form-control">
							<option value="en-us">English</option>
							<option value="zh-cn">Chinese</option>
						</select>
					</div>
					<div class="form-group">
						<label for="content" class="control-label">Content</label>
						<textarea id="content" name="content" class="form-control" rows="8"></textarea>
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/content/') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('addon-script')
<script type="text/javascript">
$(document).ready(function()
{
	var cssSources = [
		'{{ asset('css/bootstrap.min.css') }}',
		'{{ asset('css/style.css') }}',
		'{{ asset('css/jquery.fullPage.css') }}',
		'{{ asset('css/custom.css') }}'
	];

	CKEDITOR.config.contentsCss = cssSources;
	CKEDITOR.config.allowedContent = true;
	CKEDITOR.replace('content');
});
</script>
@endsection