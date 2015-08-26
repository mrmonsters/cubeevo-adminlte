@extends('app')
<?php
use App\Models\Locale;
use App\Models\PageContent;

$locales = Locale::where('status', '=', '2')->get();
?>

@section('htmlheader_title')
Static Page Management
@endsection

@section('contentheader_title')
Static Page Management
@endsection

@section('contentheader_description')
Description for static page management
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
	<div class="col-md-10 col-md-offset-1">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Page #{{ $page->id }}</h3>
			</div>
			<form method="POST" action="{{ url('manage/page/update/' . $page->id) }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input name="_method" type="hidden" value="PUT" />
				<div class="box-body">
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input id="title" name="title" type="text" class="form-control" value="{{ $page->title }}" />
					</div>
					<div class="form-group">
						<label for="desc" class="control-label">Description</label>
						<input id="desc" name ="desc" type="text" class="form-control" value="{{ $page->desc }}" />
					</div>
					<div class="form-group">
						<label for="menu" class="control-label">Menu / Type</label>
						@if (isset($pMenus) && !$pMenus->isEmpty())
						<select multiple id="menu" name="menu[]" class="form-control">
						@foreach ($pMenus as $menu)
							<optgroup label="{{ $menu->name }}">
								<option value="{{ $menu->id }}" {{ (in_array($menu->id, $pageMenuIds)) ? 'selected' : '' }}>{{ $menu->name }}</option>
								@if (isset($cMenus) && !$cMenus->isEmpty())
								@foreach ($cMenus as $cMenu)
								@if ($cMenu->parent_id == $menu->id)
								<option value="{{ $cMenu->id }}" {{ (in_array($cMenu->id, $pageMenuIds)) ? 'selected' : '' }}>{{ $cMenu->name }}</option>
								@endif
								@endforeach
								@endif
							</optgroup>
						@endforeach
						@else
						<select id="menu" name="menu" class="form-control" disabled>
						@endif 
						</select>
					</div>
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						@if (isset($locales) && !$locales->isEmpty())
							<?php $count = 0; ?>
							@foreach ($locales as $locale)
								<?php $count++; ?>
								<li class="{{ ($count == 1) ? 'active' : '' }}"><a href="#{{ $locale->code }}" data-toggle="tab">{{ $locale->name }}</a></li>
							@endforeach
						@endif
						</ul>
						<div class="tab-content">
						@if (isset($locales) && !$locales->isEmpty())
							<?php $count = 0; ?>
							@foreach ($locales as $locale)
								<?php $count++; ?>
								<div id="{{ $locale->code }}" class="tab-pane {{ ($count == 1) ? 'active' : '' }}">
									<div class="form-group">
										<label for="content" class="control-label">Content</label>
										<textarea id="content" name="content_{{ $locale->id }}" class="form-control" rows="16">{{ ($content = $page->pageContents()->where('locale_id', $locale->id)->first()) ? $content->content : '' }}</textarea>
									</div>
								</div>
							@endforeach
						@endif
						</div>
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/page/') }}" class="btn btn-default">Cancel</a>
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
	@foreach ($locales as $locale)
	CKEDITOR.replace('content_{{ $locale->id }}');
	@endforeach
});
</script>
@endsection