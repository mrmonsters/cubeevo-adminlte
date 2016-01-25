@extends('app')

@section('htmlheader_title')
Blog Post Management
@endsection

@section('contentheader_title')
Blog Post Management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Create New Blog Post</h3>
			</div>
			<form method="POST" action="{{ url('admin/manage/post/create') }}" accept-charset="UTF-8" enctype="multipart/form-data">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<div class="box-body">
					<div class="form-group">
						<label for="cover_image" class="control-label">Cover Image</label>
						<input id="cover_image" name="cover_image" type="file" class="form-control" />
					</div>
					<div class="form-group">
						<label for="slug" class="control-label">Sort Order</label>
						<input id="slug" name="post[sort_order]" type="text" class="form-control" value="0" />
					</div>
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						@if (isset($locales) && !$locales->isEmpty())
							@foreach ($locales as $index => $locale)
								<li class="{{ ($index != 0) ? : 'active' }}"><a href="#{{ $locale->language }}" data-toggle="tab">{{ strtoupper($locale->language) }}</a></li>
							@endforeach
						@endif
						</ul>
						<div class="tab-content">
						@if (isset($locales) && !$locales->isEmpty())
							@foreach ($locales as $index => $locale)
								<div id="{{ $locale->language }}" class="tab-pane {{ ($index != 0) ? : 'active' }}">
									<div class="form-group">
										<label for="title_{{ $locale->id }}" class="control-label">Title</label>
										<input id="title_{{ $locale->id }}" name="post[title][{{ $locale->id }}]" type="text" class="form-control" required />
									</div>
									<div class="form-group">
										<label for="description_{{ $locale->id }}" class="control-label">Description</label>
										<textarea id="description_{{ $locale->id }}" name ="post[description][{{ $locale->id }}]" class="form-control"></textarea>
									</div>
								</div>
							@endforeach
						@endif
						</div>
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/post/') }}" class="btn btn-default">Cancel</a>
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
$(document).ready(function() {

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
	CKEDITOR.config.protectedSource.push(/<i[^>]*><\/i>/g);

	@foreach ($locales as $locale)
	CKEDITOR.replace('description_{{ $locale->id }}');
	@endforeach
});
</script>
@endsection