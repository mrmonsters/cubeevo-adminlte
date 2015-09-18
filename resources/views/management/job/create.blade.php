@extends('app')
<?php 
use App\Models\Status;
use App\Models\Locale;

$locales = Locale::where('status', '=', Status::ACTIVE)->get();
?>

@section('htmlheader_title')
Job Management
@endsection

@section('contentheader_title')
Job Management
@endsection

@section('contentheader_description')
Description for job management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Create New Job</h3>
			</div>
			<form method="POST" action="{{ url('manage/job/store/') }}" accept-charset="UTF-8" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
				<div class="box-body">
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
										<label for="title" class="control-label">Title</label>
										<input id="title" name="title[{{ $locale->id }}]" type="text" class="form-control" value="" required />
									</div>
									<div class="form-group">
										<label for="desc" class="control-label">Description</label>
										<textarea id="desc" name="desc[{{ $locale->id }}]" class="form-control" rows="5"></textarea>
									</div>
									<div class="form-group">
										<label for="qualification" class="control-label">Qualification</label>
										<textarea id="qualification_{{ $locale->id }}" name="qualification[{{ $locale->id }}]" class="form-control" rows="5"></textarea>
									</div>
								</div>
							@endforeach
						@endif
						</div>
					</div>
					<div class="form-group">
						<label for="sort_order" class="control-label">Sort Order</label>
						<input id="sort_order" name ="sort_order" type="text" class="form-control" />
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/job/') }}" class="btn btn-default">Cancel</a>
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
	CKEDITOR.config.height         = '250px';
	CKEDITOR.config.protectedSource.push(/<i[^>]*><\/i>/g);
	@foreach ($locales as $locale)
	CKEDITOR.replace('qualification_{{ $locale->id }}');
	@endforeach
});
</script>
@endsection