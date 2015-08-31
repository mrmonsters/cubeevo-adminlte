@extends('app')
<?php 
use App\Models\Status;
use App\Models\Locale;
use App\Models\Files;

$locales = Locale::where('status', '=', STATUS::ACTIVE)->get();
?>

@section('htmlheader_title')
Category Management
@endsection

@section('contentheader_title')
Category Management
@endsection

@section('contentheader_description')
Description for category management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Category #{{ $category->id }}</h3>
			</div>
			<form method="POST" action="{{ url('manage/category/update/' . $category->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
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
										<label for="name" class="control-label">Name</label>
										<input id="name" name="name[{{ $locale->id }}]" type="text" class="form-control" value="{{ $category->translate($locale->language)->name }}" />
									</div>
								</div>
							@endforeach
						@endif
						</div>
					</div>
					<div class="form-group">
						<label for="sort_order" class="control-label">Sort Order</label>
						<input id="sort_order" name ="sort_order" type="text" class="form-control" value="{{ $category->sort_order }}" />
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<img id="grid_img" class="img-thumbnail" src="{{ $category->frontImage->dir }}" alt="{{ $category->frontImage->name }}">
								<div class="caption" style="text-align: center;">
									<p><strong>Grid Front Image</strong></p>
									<a href="#" class="btn btn-block btn-primary" role="button" data-toggle="modal" data-target="#modal-grid-img">Upload New</a> 
									<a href="#" class="btn btn-block btn-default" role="button" data-toggle="modal" data-target="#modal-upload" onclick="useExist('grid_img_id')">Use Existing</a>
								</div>
							</div>
						</div>
						<input type="hidden" id="grid_img_id" name="grid_img_id" value="{{ $category->grid_img_id }}" />
						<div class="col-md-4">
							<div class="thumbnail">
								<img id="grid_bg_img" class="img-thumbnail" src="{{ $category->backgroundImage->dir }}" alt="{{ $category->backgroundImage->name }}">
								<div class="caption" style="text-align: center;">
									<p><strong>Grid Background Image</strong></p>
									<a href="#" class="btn btn-block btn-primary" role="button" data-toggle="modal" data-target="#modal-grid-bg-img">Upload New</a> 
									<a href="#" class="btn btn-block btn-default" role="button" data-toggle="modal" data-target="#modal-upload" onclick="useExist('grid_bg_img_id')">Use Existing</a>
								</div>
							</div>
						</div>
						<input type="hidden" id="grid_bg_img_id" name="grid_bg_img_id" value="{{ $category->grid_bg_img_id }}" />
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

<!-- Modal -->
<div class="modal fade" id="modal-upload" tabindex="-1" role="dialog" aria-labelledby="modal-upload">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modal">Choose from existing image collection</h4>
			</div>
			<div class="modal-body" style="max-height: 450px; overflow-y: auto;">
				<?php $count = 0; ?>
				<?php $images = Files::where('status', '=', STATUS::ACTIVE)->get(); ?>
				@foreach ($images as $image)
				<?php $count++; ?>
				@if ($count % 4 == 1)
				<div class="row">
				@endif
					<div class="col-xs-6 col-md-3">
						<button class="thumbnail" data-dismiss="modal" onclick="selectImg({{ $image->id }}, '{{ $image->dir }}')">
							<img src="{{ $image->dir }}" alt="{{ $image->name }}">
						</button>
					</div>
				@if (($count % 4 == 0) || ($count == $images->count())) 
				</div>
        		@endif
				@endforeach
			</div>
		</div>
	</div>
</div>
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