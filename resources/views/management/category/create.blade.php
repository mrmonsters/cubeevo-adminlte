@extends('app')
<?php use App\Models\Files; ?>

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
				<h3 class="box-title">Category</h3>
			</div>
			<form method="POST" action="{{ url('manage/category/store') }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input id="id" name="id" type="hidden" value="" />
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
										<label for="title" class="control-label">Name</label>
										<input id="title" name="title[{{ $locale->code }}]" type="text" class="form-control" />
									</div>
								</div>
							@endforeach
						@endif
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
										@if ($files = Files::where('type', 'IMAGE/PNG')->orWhere('type', 'IMAGE/JPEG')->get())
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
										@if ($files = Files::where('type', 'IMAGE/PNG')->orWhere('type', 'IMAGE/JPEG')->get())
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
						<a href="{{ url('/admin/manage/category/') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add Projects</h3>
			</div>
			<div class="box-body">
				<table id="tbl-project" class="table">
					<thead>
						<th width="80%">Name</th>
						<th>Action</th>
					</thead>
					<tbody>
					@if (isset($projects) && !$projects->isEmpty())
					@foreach ($projects as $project)
						<tr>
							<td>{{ $project->name }}</td>
							<td><button type="button" class="btn btn-primary" onclick="addProject('{{ $project->id }}', this)">Add</button></td>
						</tr>
					@endforeach
					@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('addon-script')
<script type="text/javascript">
$(document).ready(function()
{
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

function addProject(projectId, btn)
{
	var oriProjectIds = $('#id').val();
	var projectIds = (oriProjectIds != '') ? oriProjectIds + ", " + projectId : projectId;
	$('#id').val(projectIds);

	var newHtml = '<button type="button" class="btn btn-danger" onclick="removeProject('+ projectId +', this)">Remove</button>';
	$(btn).replaceWith(newHtml);
}

function removeProject(projectId, btn)
{
	var projectIds = $('#id').val().replace(projectId, "");
	var projectIds = projectIds.replace(projectId, "");
	var projectIds = projectIds.replace(projectId + ", ", "");
	$('#id').val(projectIds);

	var newHtml = '<button type="button" class="btn btn-primary" onclick="addProject('+ projectId +', this)">Add</button>';
	$(btn).replaceWith(newHtml);
}

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