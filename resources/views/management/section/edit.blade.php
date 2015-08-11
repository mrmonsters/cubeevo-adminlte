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
					<h3 class="box-title">Edit Section #{{ $section->section_id }}</h3>
				</div>
				<form method="POST" action="{{ url('manage/section/update/' . $section->section_id) }}">
					<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
					<input name="_method" type="hidden" value="PUT" />
					<div class="box-body">
						<!--
						<div class="form-group">
							<label for="" class="control-label"></label>
							<input id="" name ="" type="" class="form-control" />
						</div>
						-->
						<div class="form-group">
							<label for="section_title" class="control-label">Title</label>
							<input id="section_title" name="section_title" type="text" class="form-control" value="{{ $section->section_title }}" />
						</div>
						<div class="form-group">
							<label for="section_desc" class="control-label">Description</label>
							<input id="section_desc" name ="section_desc" type="text" class="form-control" value="{{ $section->section_desc }}" />
						</div>
						<div class="form-group">
							<label for="section_locale" class="control-label">Locale / Language</label>
							<select id="section_locale" name="section_locale" class="form-control">
								<option value="en-us" {{ ($section->section_locale == 'en-us') ? 'selected' : '' }}>English</option>
								<option value="zh-cn" {{ ($section->section_locale == 'zh-cn') ? 'selected' : '' }}>Chinese</option>
							</select>
						</div>
						<div class="form-group">
							<label for="add_to_page" class="control-label">Add to Page</label>
							@if (isset($pages) && !$pages->isEmpty())
							<select id="add_to_page" name="add_to_page" class="form-control">
								<option value="0" {{ ($pageSections->count() < 1) ? 'selected' : '' }}>No</option>
								<option value="1" {{ ($pageSections->count() > 0) ? 'selected' : '' }}>Yes</option>
							@else
							<select id="add_to_page" name="add_to_page" class="form-control" disabled>
							@endif
							</select>
						</div>
						<div class="form-group">
							<label for="page_id" class="control-label">Page</label>
							@if (isset($pages) && !$pages->isEmpty())
							<select multiple id="page_id" name="page_id" class="form-control">
							@foreach ($pages as $page)
							@foreach ($pageSections as $item)
							@if ($item->page_id == $page->page_id)
								<option value="{{ $page->page_id }}" selected>{{ $page->page_title }}</option>
							@else
								<option value="{{ $page->page_id }}">{{ $page->page_title }}</option>
							@endif
							@endforeach
							@endforeach
							@else
							<select id="page_id" name="page_id" class="form-control" disabled>
							@endif
							</select>
						</div>
						<div class="form-group">
							<label for="section_content" class="control-label">Content</label>
							<textarea id="section_content" name="section_content" class="form-control" rows="8">{{ $section->section_content }}</textarea>
						</div>
					</div>
					<div class="box-footer clearfix">
						<div class="pull-right">
							<a href="{{ url('/manage/section/') }}" class="btn btn-default">Cancel</a>
							<button type="submit" class="btn btn-primary">Save</button>
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