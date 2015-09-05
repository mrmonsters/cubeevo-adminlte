@extends('app')
<?php
use App\Models\Status;
use App\Models\Locale;
use App\Models\PageContent;

$locales = Locale::where('status', '=', STATUS::ACTIVE)->get();
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
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Page #{{ $page->id }}</h3>
			</div>
			<form method="POST" action="{{ url('manage/page/update/' . $page->id) }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input name="_method" type="hidden" value="PUT" />
				<div class="box-body">
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input id="name" name="name" type="text" class="form-control" value="{{ $page->name }}" />
					</div>
					<div class="form-group">
						<label for="slug" class="control-label">Slug</label>
						<input id="slug" name="slug" type="text" class="form-control" value="{{ $page->slug }}" />
					</div>
					<div class="form-group">
						<label for="meta_title" class="control-label">Site Title</label>
						<input id="meta_title" name="meta_title" type="text" class="form-control" value="{{ $page->site_title }}" />
					</div>
					<div class="form-group">
						<label for="meta_keyword" class="control-label">Meta Keyword</label>
						<input id="meta_keyword" name="meta_keyword" type="text" class="form-control" value="{{ $page->meta_keyword }}" />
					</div>
					<div class="form-group">
						<label for="meta_desc" class="control-label">Meta Description</label>
						<input id="meta_desc" name="meta_desc" type="text" class="form-control" value="{{ $page->meta_desc }}" />
					</div>
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						@if (isset($locales) && !$locales->isEmpty())
							<?php $count = 0; ?>
							@foreach ($locales as $locale)
								<?php $count++; ?>
								<li class="{{ ($count == 1) ? 'active' : '' }}"><a href="#{{ $locale->language }}" data-toggle="tab">{{ strtoupper($locale->language) }}</a></li>
							@endforeach
						@endif
						</ul>
						<div class="tab-content">
						@if (isset($locales) && !$locales->isEmpty())
							<?php $count = 0; ?>
							@foreach ($locales as $locale)
								<?php $count++; ?>
								<div id="{{ $locale->language }}" class="tab-pane {{ ($count == 1) ? 'active' : '' }}">
									<div class="form-group">
										<label for="desc" class="control-label">Description</label>
										<input id="desc" name ="desc[{{ $locale->id }}]" type="text" class="form-control" value="{{ $page->translate($locale->language)->desc }}" />
									</div>
									<div class="form-group">
										<label for="content_{{ $locale->id }}" class="control-label">Content</label>
										<textarea id="content_{{ $locale->id }}" name="content[{{ $locale->id }}]" class="form-control" rows="8"><?php echo html_entity_decode($page->translate($locale->language)->content); ?></textarea>
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
		'{{ asset('css/animate.css') }}',
		'{{ asset('css/jquery.fullPage.css') }}',
		'{{ asset('css/custom.css') }}'
	];

	CKEDITOR.config.contentsCss    = cssSources;
	CKEDITOR.config.allowedContent = true;
	CKEDITOR.config.height         = '450px';
	@foreach ($locales as $locale)
	CKEDITOR.replace('content_{{ $locale->id }}');
	@endforeach
});
</script>
@endsection