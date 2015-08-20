@extends('app')

@section('htmlheader_title')
Static Page Management
@endsection

@section('contentheader_title')
Static Page Management
@endsection

@section('contentheader_description')
Description for static page management
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
				<h3 class="box-title">Static Page</h3>
			</div>
			<form method="POST" action="{{ url('manage/page/store') }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input id="id" name="id" type="hidden" value="" />
				<div class="box-body">
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input id="title" name="title" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="desc" class="control-label">Description</label>
						<input id="desc" name ="desc" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="menu" class="control-label">Menu / Type</label>
						@if (isset($pMenus) && !$pMenus->isEmpty())
						<select multiple id="menu" name="menu[]" class="form-control">
						@foreach ($pMenus as $menu)
							<optgroup label="{{ $menu->name }}">
								<option value="{{ $menu->id }}">{{ $menu->name }}</option>
								@if (isset($cMenus) && !$cMenus->isEmpty())
								@foreach ($cMenus as $cMenu)
								@if ($cMenu->parent_id == $menu->id)
								<option value="{{ $cMenu->id }}">{{ $cMenu->name }}</option>
								@endif
								@endforeach
								@endif
							</optgroup>
						@endforeach
						@else
						<select id="menu" name="menu" class="form-control" disabled>
						@endif 
						</select>
					</div>
					<div class="form-group">
						<label for="content" class="control-label">Content</label>
						<textarea id="content" name="content" class="form-control" rows="8"></textarea>
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/admin/manage/page/') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add Blocks</h3>
			</div>
			<div class="box-body">
				<table id="tbl-block" class="table">
					<thead>
						<th width="80%">Name</th>
						<th>Action</th>
					</thead>
					<tbody>
					@if (isset($blocks) && !$blocks->isEmpty())
					@foreach ($blocks as $block)
						<tr>
							<td>{{ $block->title }}</td>
							<td><button type="button" class="btn btn-primary" onclick="addBlock('{{ $block->id }}', this)">Add</button></td>
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
	var cssSources = [
		'{{ asset('css/bootstrap.min.css') }}',
		'{{ asset('css/style.css') }}',
		'{{ asset('css/jquery.fullPage.css') }}',
		'{{ asset('css/custom.css') }}'
	];

	CKEDITOR.config.contentsCss = cssSources;
	CKEDITOR.config.allowedContent = true;
	CKEDITOR.replace('content');

	$('#tbl-block').DataTable({
		searching: false,
		info: false
	});
});

function addBlock(blockId, btn)
{
	var oriBlockIds = $('#id').val();
	var blockIds = (oriBlockIds != '') ? oriBlockIds + ", " + blockId : blockId;
	$('#id').val(blockIds);

	var newHtml = '<button type="button" class="btn btn-danger" onclick="removeBlock('+ blockId +', this)">Remove</button>';
	$(btn).replaceWith(newHtml);
}

function removeBlock(blockId, btn)
{
	var blockIds = $('#id').val().replace(blockId, "");
	var blockIds = blockIds.replace(blockId, "");
	var blockIds = blockIds.replace(blockId + ", ", "");
	$('#id').val(blockIds);

	var newHtml = '<button type="button" class="btn btn-primary" onclick="addBlock('+ blockId +', this)">Add</button>';
	$(btn).replaceWith(newHtml);
}
</script>
@endsection