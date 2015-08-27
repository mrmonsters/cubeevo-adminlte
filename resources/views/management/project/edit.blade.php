@extends('app')
<?php
use App\Models\Locale;
use App\Models\Entity;
use App\Models\EntityInstance;
use App\Services\GeneralHelper;

$locales = Locale::where('status', '=', '2')->get();
$entity  = Entity::where('code', '=', 'category')->first();
$entityInstances = EntityInstance::where('entity_id', '=', $entity->id)->get();

$categories = array();
foreach ($entityInstances as $instance)
{
	$item = array();
	$genHelper = new GeneralHelper;

	$item['id']   = $instance->id;
	$item['name'] = $genHelper->getAttribute('name', $instance);
	$categories[] = $item;
}
?>

@section('htmlheader_title')
Project Management
@endsection

@section('contentheader_title')
Project Management
@endsection

@section('contentheader_description')
Description for project management
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
				<h3 class="box-title">Edit Page #{{ $project['id'] }}</h3>
			</div>
			<form method="POST" action="{{ url('manage/project/update/' . $project['id']) }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input name="_method" type="hidden" value="PUT" />
				<div class="box-body">
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
										<label for="name" class="control-label">Name</label>
										<input id="name" name="name[{{ $locale->id }}]" type="text" class="form-control" value="{{ $project['name'] }}" />
									</div>
									<div class="form-group">
										<label for="desc_{{ $locale->id }}" class="control-label">Description</label>
										<textarea id="desc_{{ $locale->id }}" name="desc[{{ $locale->id }}]" class="form-control" rows="8">{{ $project['desc'] }}</textarea>
									</div>
								</div>
							@endforeach
						@endif
						</div>
					</div>
					<div class="form-group">
						<label for="category" class="control-label">Category</label>
						<select id="category" name="category" class="form-control">
							@foreach ($categories as $category)
							<option value="{{ $category['id'] }}" {{ (isset($project['parent_id']) && $project['parent_id'] == $category['id']) ? 'selected' : '' }}>{{ $category['name'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="founder" class="control-label">Founder</label>
						<input id="founder" name="founder" type="text" class="form-control" value="{{ $project['founder'] }}" />
					</div>
					<div class="form-group">
						<label for="year" class="control-label">Year</label>
						<input id="year" name="year" type="text" class="form-control" value="{{ $project['year'] }}" />
					</div>
					<div class="form-group">
						<label for="cover_img_id" class="control-label">Cover Image</label>
						<input id="cover_img_id" name="cover_img_id" type="text" class="form-control" value="{{ $project['cover_img_id'] }}" />
					</div>
					<div class="form-group">
						<label for="grid_img_id" class="control-label">Grid Image</label>
						<input id="grid_img_id" name="grid_img_id" type="text" class="form-control" value="{{ $project['grid_img_id'] }}" />
					</div>
					<div class="form-group">
						<label for="grid_bg_img_id" class="control-label">Grid Background Image</label>
						<input id="grid_bg_img_id" name="grid_bg_img_id" type="text" class="form-control" value="{{ $project['grid_bg_img_id'] }}" />
					</div>
					<div class="form-group">
						<label for="img_ids" class="control-label">Banners</label>
						<input id="img_ids" name="img_ids" type="text" class="form-control" value="{{ $project['img_ids'] }}" />
					</div>
					<div class="form-group">
						<label for="pri_color_code" class="control-label">Primary Color</label>
						<div class="input-group colorpicker-element">
							<input id="pri_color_code" name ="pri_bg_color_code" type="text" class="form-control" value="{{ $project['pri_bg_color_code'] }}" />
							<div class="input-group-addon">
								<i style="background-color: {{ $project['pri_bg_color_code'] }};"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="sec_color_code" class="control-label">Secondary Color</label>
						<div class="input-group colorpicker-element">
							<input id="sec_color_code" name ="sec_bg_color_code" type="text" class="form-control" value="{{ $project['sec_bg_color_code'] }}" />
							<div class="input-group-addon">
								<i style="background-color: {{ $project['sec_bg_color_code'] }};"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="sort_order" class="control-label">Sort Order</label>
						<input id="sort_order" name ="sort_order" type="text" class="form-control" value="{{ $project['sort_order'] }}" />
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/project/') }}" class="btn btn-default">Cancel</a>
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
	$('.colorpicker-element').colorpicker();

	@foreach ($locales as $locale)
	CKEDITOR.replace('desc_{{ $locale->id }}');
	@endforeach
});
</script>
@endsection