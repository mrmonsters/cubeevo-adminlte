@extends('app')

@section('htmlheader_title')
Category Management
@endsection

@section('contentheader_title')
Category Management
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Create New Category</h3>
			</div>
			<form method="POST" action="{{ url('manage/category/store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input id="id" name="id" type="hidden" value="" />
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
										<label for="name" class="control-label">Name</label>
										<input id="name" name="name[{{ $locale->id }}]" type="text" class="form-control" required />
									</div>
								</div>
							@endforeach
						@endif
						</div>
					</div>
					<div class="form-group">
						<label for="slug" class="control-label">URL Key</label>
						<input id="slug" name ="slug" type="text" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="sort_order" class="control-label">Sort Order</label>
						<input id="sort_order" name ="sort_order" type="text" class="form-control" />
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<img id="grid_img" class="img-thumbnail" src="" alt="">
								<div class="caption" style="text-align: center;">
									<p><strong>Grid Front Image</strong></p>
									<div class="row">
										<div class="col-xs-6">
											<a href="#" class="btn btn-block btn-primary" role="button" data-toggle="modal" data-target="#modal-grid-img"><i class="fa fa-cloud-upload"></i> Upload New</a>
										</div>
										<div class="col-xs-6">
											<a href="#" class="btn btn-block btn-default" role="button" data-toggle="modal" data-target="#modal-upload" onclick="useExist('grid_img_id')"><i class="fa fa-image"></i> Use Existing</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" id="grid_img_id" name="grid_img_id" value="" />
						<div class="col-md-4">
							<div class="thumbnail">
								<img id="grid_bg_img" class="img-thumbnail" src="" alt="">
								<div class="caption" style="text-align: center;">
									<p><strong>Grid Background Image</strong></p>
									<div class="row">
										<div class="col-xs-6">
											<a href="#" class="btn btn-block btn-primary" role="button" data-toggle="modal" data-target="#modal-grid-bg-img"><i class="fa fa-cloud-upload"></i> Upload New</a>
										</div>
										<div class="col-xs-6">
											<a href="#" class="btn btn-block btn-default" role="button" data-toggle="modal" data-target="#modal-upload" onclick="useExist('grid_bg_img_id')"><i class="fa fa-image"></i> Use Existing</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" id="grid_bg_img_id" name="grid_bg_img_id" value="" />
					</div>
				</div>
				<input type="hidden" id="selected_img" value="" />
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/category/') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				<!-- Grid Image - Modal -->
				<div class="modal fade" id="modal-grid-img" tabindex="-1" role="dialog" aria-labelledby="modal-grid-img">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="modal">Upload new grid front image</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="new_grid_img_id" class="control-label">New Grid Front Image</label>
									<input type="file" class="form-control" id="new_grid_img_id" name="new_grid_img_id" />
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Grid Background Image - Modal -->
				<div class="modal fade" id="modal-grid-bg-img" tabindex="-1" role="dialog" aria-labelledby="modal-grid-bg-img">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="modal">Upload new grid background image</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="new_grid_bg_img_id" class="control-label">New Grid Background Image</label>
									<input type="file" class="form-control" id="new_grid_bg_img_id" name="new_grid_bg_img_id" />
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

	@include('partials.admin.media-library', ['files' => $files])
@endsection

@section('addon-script')
<script type="text/javascript">
function useExist(imgType)
{
	$('#selected_img').val(imgType);
}

function selectImg(imgId, imgSrc)
{
	var imgType = $('#selected_img').val();

	if (imgType != '')
	{
		$('#' + imgType).val(imgId);

		if (imgType == 'grid_img_id')
		{
			$('#grid_img').attr('src', imgSrc);
		}
		else if (imgType == 'grid_bg_img_id')
		{
			$('#grid_bg_img').attr('src', imgSrc);
		}
	}
}
</script>
@endsection