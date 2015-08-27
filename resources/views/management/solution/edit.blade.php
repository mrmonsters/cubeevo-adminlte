@extends('app')
<?php
use App\Models\Locale;

$locales = Locale::where('status', '=', '2')->get();
?>

@section('htmlheader_title')
Solution Management
@endsection

@section('contentheader_title')
Solution Management
@endsection

@section('contentheader_description')
Description for solution management
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
				<h3 class="box-title">Edit Solution #{{ $solution['id'] }}</h3>
			</div>
			<form method="POST" action="{{ url('manage/solution/update/' . $solution['id']) }}">
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
										<input id="name" name="name[{{ $locale->id }}]" type="text" class="form-control" value="{{ $solution['name'] }}" />
									</div>
									<div class="form-group">
										<label for="desc" class="control-label">Description</label>
										<input id="desc" name ="desc[{{ $locale->id }}]" type="text" class="form-control" value="{{ $solution['desc'] }}" />
									</div>
								</div>
							@endforeach
						@endif
						</div>
					</div>
					<div class="form-group">
						<label for="grid_img_id" class="control-label">Grid Image</label>
						<input id="grid_img_id" name="grid_img_id" type="text" class="form-control" value="{{ $solution['grid_img_id'] }}" />
					</div>
					<div class="form-group">
						<label for="grid_bg_img_id" class="control-label">Grid Background Image</label>
						<input id="grid_bg_img_id" name="grid_bg_img_id" type="text" class="form-control" value="{{ $solution['grid_bg_img_id'] }}" />
					</div>
					<div class="form-group">
						<label for="pri_color_code" class="control-label">Primary Color</label>
						<div class="input-group colorpicker-element">
							<input id="pri_color_code" name ="pri_bg_color_code" type="text" class="form-control" value="{{ $solution['pri_bg_color_code'] }}" />
							<div class="input-group-addon">
								<i style="background-color: {{ $solution['pri_bg_color_code'] }};"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/solution/') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection