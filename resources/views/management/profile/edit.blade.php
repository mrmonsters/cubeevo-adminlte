@extends('app')
<?php 
use App\Models\Status;
use App\Models\Locale;

$locales = Locale::where('status', '=', Status::ACTIVE)->get();
?>

@section('htmlheader_title')
Profile Management
@endsection

@section('contentheader_title')
Profile Management
@endsection

@section('contentheader_description')
Description for profile management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Profile #{{ $profile->id }}</h3>
			</div>
			<form method="POST" action="{{ url('manage/profile/update/' . $profile->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input name="_method" type="hidden" value="PUT" />
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
										<input id="title" name="title[{{ $locale->id }}]" type="text" class="form-control" value="{{ $profile->translate($locale->language)->title }}" required />
									</div>
									<div class="form-group">
										<label for="desc" class="control-label">Description</label>
										<textarea id="desc_{{ $locale->id }}" name="desc[{{ $locale->id }}]" class="form-control" rows="5">{{ $profile->translate($locale->language)->desc }}</textarea>
									</div>
								</div>
							@endforeach
						@endif
						</div>
					</div>
					@if (isset($profile->img_dir) && strlen($profile->img_dir))
					<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<img id="profile_pic" class="img-thumbnail" src="{{ $profile->img_dir }}" alt="{{ $profile->name }}">
								<div class="caption" style="text-align: center;">
									<p><strong>Profile Picture</strong></p>
									<div class="row">
										<div class="col-xs-12">
											<a href="#" class="btn btn-block btn-danger" id="btnRemovePic"><i class="fa fa-remove"></i> Remove</a> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					<div class="form-group">
						<label for="new_img_dir" class="control-label">Profile Picture</label>
						<input id="new_img_dir" name ="new_img_dir" type="file" class="form-control" />
						<input id="img_dir" name ="img_dir" type="hidden" class="form-control" value="{{ $profile->img_dir }}" />
					</div>
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input id="name" name ="name" type="text" class="form-control" value="{{ $profile->name }}" />
					</div>
					<div class="form-group">
						<label for="sort_order" class="control-label">Sort Order</label>
						<input id="sort_order" name ="sort_order" type="text" class="form-control" value="{{ $profile->sort_order }}" />
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/profile/') }}" class="btn btn-default">Cancel</a>
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
	CKEDITOR.replace('desc_{{ $locale->id }}');
	@endforeach

	$('#btnRemovePic').click(function()
	{
		$('#img_dir').val('');
		$('#profile_pic').attr('src', '');
		$(this).attr('disabled', true);
	});
});
</script>
@endsection