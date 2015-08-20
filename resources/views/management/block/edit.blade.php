@extends('app')

@section('htmlheader_title')
Block Management
@endsection

@section('contentheader_title')
Block Management
@endsection

@section('contentheader_description')
Description for block management
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
					<h3 class="box-title">Edit Block #{{ $block->block_id }}</h3>
				</div>
				<form id="block-form" method="POST" action="{{ url('manage/block/update/' . $block->id) }}">
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
							<label for="title" class="control-label">Title</label>
							<input id="title" name="title" type="text" class="form-control" value="{{ $block->title }}" />
						</div>
						<div class="form-group">
							<label for="desc" class="control-label">Description</label>
							<input id="desc" name ="desc" type="text" class="form-control" value="{{ $block->desc }}" />
						</div>
						<div class="form-group">
							<label for="locale" class="control-label">Locale / Language</label>
							<select id="locale" name="locale" class="form-control">
								<option value="en-us" {{ ($block->locale == 'en-us') ? 'selected' : '' }}>English</option>
								<option value="zh-cn" {{ ($block->locale == 'zh-cn') ? 'selected' : '' }}>Chinese</option>
							</select>
						</div>
						<div class="form-group">
							<label for="add_to_page" class="control-label">Add to Page</label>
							@if (isset($pages) && !$pages->isEmpty())
							<select id="add_to_page" name="add_to_page" class="form-control">
								<option value="0" {{ ($pageBlocks->count() < 1) ? 'selected' : '' }}>No</option>
								<option value="1" {{ ($pageBlocks->count() > 0) ? 'selected' : '' }}>Yes</option>
							@else
							<select id="add_to_page" name="add_to_page" class="form-control" disabled>
							@endif
							</select>
						</div>
						<div class="form-group">
							<label for="id" class="control-label">Page</label>
							@if (isset($pages) && !$pages->isEmpty())
							<select multiple id="id" name="id[]" class="form-control">
							@foreach ($pages as $page)
							@foreach ($pageBlocks as $item)
							@if ($item->id == $page->id)
								<option value="{{ $page->id }}" selected>{{ $page->title }}</option>
							@else
								<option value="{{ $page->id }}">{{ $page->title }}</option>
							@endif
							@endforeach
							@endforeach
							@else
							<select id="id" name="id" class="form-control" disabled>
							@endif
							</select>
						</div>
						<div class="form-group">
							<label for="content" class="control-label">Content</label>
							<textarea id="content" name="content" class="form-control" rows="8">{{ $block->content }}</textarea>
						</div>
					</div>
					<div class="box-footer clearfix">
						<div class="pull-right">
							<a href="{{ url('/admin/manage/block/') }}" class="btn btn-default">Cancel</a>
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