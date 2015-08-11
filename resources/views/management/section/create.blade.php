@extends('app')

@section('htmlheader_title')
Section Management
@endsection

@section('contentheader_title')
Section Management
@endsection

@section('contentheader_description')
Description for section management
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
					<h3 class="box-title">Section</h3>
				</div>

				<form method="POST" action="{{ url('manage/section/store') }}">
					<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
					<div class="box-body">
						<!--
						<div class="form-group">
							<label for="" class="control-label"></label>
							<input id="" name ="" type="" class="form-control" />
						</div>
						-->
						<div class="form-group">
							<label for="section_title" class="control-label">Title</label>
							<input id="section_title" name="section_title" type="text" class="form-control" />
						</div>
						<div class="form-group">
							<label for="section_desc" class="control-label">Description</label>
							<input id="section_desc" name ="section_desc" type="text" class="form-control" />
						</div>
						<div class="form-group">
							<label for="section_locale" class="control-label">Locale / Language</label>
							<select id="section_locale" name="section_locale" class="form-control">
								<option value="en-us">English</option>
								<option value="zh-cn">Chinese</option>
							</select>
						</div>
						<div class="form-group">
							<label for="add_to_page" class="control-label">Add to Page</label>
							@if (isset($pages) && !$pages->isEmpty())
							<select id="add_to_page" name="add_to_page" class="form-control">
							@else
							<select id="add_to_page" name="add_to_page" class="form-control" disabled>
							@endif
								<option value="0">No</option>
								<option value="1">Yes</option>
							</select>
						</div>
						<div class="form-group">
							<label for="page_id" class="control-label">Page</label>
							@if (isset($pages) && !$pages->isEmpty())
							<select id="page_id" name="page_id" class="form-control">
							@foreach ($pages as $page)
								<option value="{{ $page->page_id }}">{{ $page->page_title }}</option>
							@endforeach
							@else
							<select id="page_id" name="page_id" class="form-control" disabled>
							@endif
							</select>
						</div>
						<div class="form-group">
							<label for="section_content" class="control-label">Content</label>
							<textarea id="section_content" name="section_content" class="form-control" rows="8"></textarea>
						</div>
					</div>
					<div class="box-footer clearfix">
						<div class="pull-right">
							<a href="{{ url('/manage/section/') }}" class="btn btn-default">Cancel</a>
							<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('addon-script')
<script type="text/javascript">
$(document).ready(function()
{
	CKEDITOR.replace('section_content');
});
</script>
@endsection