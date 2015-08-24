@extends('app')
<?php use App\Models\Files; ?>

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
			<form method="POST" action="{{ url('manage/solution/store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
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
								<div id="{{ $locale->code }}" class="tab-pane {{ ($count == 1) ? 'active' : '' }}">
									<div class="form-group">
										<label for="title" class="control-label">Title</label>
										<input id="title" name="name[{{ $locale->id }}]" type="text" class="form-control" />
									</div>
									<div class="form-group">
										<label for="desc" class="control-label">Description</label>
										<input id="desc" name ="desc[{{ $locale->id }}]" type="text" class="form-control" />
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
						<label for="img_id" class="control-label">Image</label>
						<div class="row action">
							<div class="col-md-6">
								<button type="button" class="btn btn-block btn-primary btn-upload">Upload New Image</button>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-block btn-default btn-use">Use Existing</button>
							</div>
						</div>
						<input id="img_id" name="img_id" type="file" class="form-control upload" style="display: none;" />
						<div class="row use-existing" style="display: none;">
							<div class="col-md-12">
								<table class="tbl-files">
									<thead>
										<th>ID</th>
										<th>Name</th>
										<th>Directory</th>
										<th>Action</th>
									</thead>
									<tbody>
										@if ($files = Files::where('type', 'image/png')->orWhere('type', 'image/jpeg')->get())
											@foreach ($files as $file)
											<tr>
												<td>{{ $file->id }}</td>
												<td>{{ $file->name }}</td>
												<td>{{ $file->dir }}</td>
												<td>
													<button type="button" class="btn btn-default" onClick="window.open('{{ asset($file->dir) }}', '_blank')">View</button>
													<button type="button" class="btn btn-primary btn-select-img" onClick="selectImg({{ $file->id }}, this)">Select</button>
												</td>
											</tr>
											@endforeach
										@endif
									</tbody>
								</table>
							</div>
							<input id="old_img_id" name="old_img_id" type="hidden" value="" />
						</div>
					</div>
					<div class="form-group">
						<label for="bg_img_id" class="control-label">Background Image</label>
						<div class="row action">
							<div class="col-md-6">
								<a href="#" class="btn btn-block btn-primary btn-upload">Upload New Image</a>
							</div>
							<div class="col-md-6">
								<a href="#" class="btn btn-block btn-default btn-use">Use Existing</a>
							</div>
						</div>
						<input id="bg_img_id" name="bg_img_id" type="file" class="form-control upload" style="display: none;" />
						<div class="row use-existing" style="display: none;">
							<div class="col-md-12">
								<table class="tbl-files">
									<thead>
										<th>ID</th>
										<th>Name</th>
										<th>Directory</th>
										<th>Action</th>
									</thead>
									<tbody>
										@if ($files = Files::where('type', 'image/png')->orWhere('type', 'image/jpeg')->get())
											@foreach ($files as $file)
											<tr>
												<td>{{ $file->id }}</td>
												<td>{{ $file->name }}</td>
												<td>{{ $file->dir }}</td>
												<td>
													<button type="button" class="btn btn-default" onClick="window.open('{{ asset($file->dir) }}', '_blank')">View</button>
													<button type="button" class="btn btn-primary btn-select-bg-img" onClick="selectBgImg({{ $file->id }}, this)">Select</button>
												</td>
											</tr>
											@endforeach
										@endif
									</tbody>
								</table>
							</div>
							<input id="old_bg_img_id" name="old_bg_img_id" type="hidden" value="" />
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

	$('.tbl-files').DataTable();

	$('.btn-upload').click(function()
	{
		$(this).closest('.action').hide();
		$(this).closest('.action').siblings('.upload').show();
	});

	$('.btn-use').click(function()
	{
		$(this).closest('.action').hide();
		$(this).closest('.action').siblings('.use-existing').show();
	});
});

function selectImg(imgId, btn)
{
	$('.btn-select-img').removeClass('btn-success');
	$('.btn-select-img').addClass('btn-primary');
	$('.btn-select-img').text('Select');

	$(btn).removeClass('btn-primary');
	$(btn).addClass('btn-success');
	$(btn).text('Selected');

	$('#old_img_id').val(imgId);
}

function selectBgImg(imgId, btn)
{
	$('.btn-select-bg-img').removeClass('btn-success');
	$('.btn-select-bg-img').addClass('btn-primary');
	$('.btn-select-bg-img').text('Select');

	$(btn).removeClass('btn-primary');
	$(btn).addClass('btn-success');
	$(btn).text('Selected');
	
	$('#old_bg_img_id').val(imgId);
}
</script>
@endsection