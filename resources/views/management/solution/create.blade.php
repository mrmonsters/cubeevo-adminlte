@extends('app')

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
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Solution</h3>
			</div>
			<form method="POST" action="{{ url('manage/solution/store') }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
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
								<div id="cn" class="tab-pane {{ ($count == 1) ? 'active' : '' }}">
									<div class="form-group">
										<label for="title" class="control-label">Title</label>
										<input id="title" name="title[{{ $locale->code }}]" type="text" class="form-control" />
									</div>
									<div class="form-group">
										<label for="desc" class="control-label">Description</label>
										<input id="desc" name ="desc[{{ $locale->code }}]" type="text" class="form-control" />
									</div>
								</div>
							@endforeach
						@endif
						</div>
					</div>
					<div class="form-group">
						<label for="bg_color_code" class="control-label">Background Color</label>
						<div class="input-group colorpicker-element">
							<input id="bg_color_code" name ="bg_color_code" type="text" class="form-control" />
							<div class="input-group-addon">
								<i style="background-color: rgb(0,0,0);"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="sort_order" class="control-label">Image</label>
						<div class="row">
							<div class="col-md-6">
								<a href="#" class="btn btn-block btn-primary">Upload New Image</a>
							</div>
							<div class="col-md-6">
								<a href="#" class="btn btn-block btn-default">Use Existing</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="sort_order" class="control-label">Background Image</label>
						<div class="row">
							<div class="col-md-6">
								<a href="#" class="btn btn-block btn-primary">Upload New Image</a>
							</div>
							<div class="col-md-6">
								<a href="#" class="btn btn-block btn-default">Use Existing</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="sort_order" class="control-label">Sort Order</label>
						<input id="sort_order" name ="sort_order" type="text" class="form-control" />
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/solution/') }}" class="btn btn-default">Cancel</a>
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
	$('.colorpicker-element').colorpicker();
});
</script>
@endsection