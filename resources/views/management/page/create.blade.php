@extends('app')
<?php
use App\Models\Status;
use App\Models\Locale;

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
	<div class="col-md-10 col-md-offset-1">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Create New Page</h3>
			</div>
			<form method="POST" action="{{ url('manage/page/store') }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<div class="box-body">
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input id="name" name="name" type="text" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="slug" class="control-label">Slug</label>
						<input id="slug" name="slug" type="text" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="meta_title" class="control-label">Site Title</label>
						<input id="meta_title" name="meta_title" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="meta_keyword" class="control-label">Meta Keyword</label>
						<input id="meta_keyword" name="meta_keyword" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="meta_desc" class="control-label">Meta Description</label>
						<input id="meta_desc" name="meta_desc" type="text" class="form-control" />
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
										<input id="desc" name ="desc[{{ $locale->id }}]" type="text" class="form-control" />
									</div>
									<div class="form-group">
										<label for="content_{{ $locale->id }}" class="control-label">Content</label>
										<textarea id="content_{{ $locale->id }}" name="content[{{ $locale->id }}]" class="form-control" rows="8"></textarea>
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
						<button type="submit" class="btn btn-primary">Submit</button>
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