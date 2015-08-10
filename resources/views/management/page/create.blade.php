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
<div class="row">

	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Static Page</h3>
			</div>

			<form method="POST" action="{{ url('manage/page/store') }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input id="section_id" name="section_id" type="hidden" value="" />
				<div class="box-body">
					<div class="form-group">
						<label for="page_title" class="control-label">Title</label>
						<input id="page_title" name="page_title" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="page_desc" class="control-label">Description</label>
						<input id="page_desc" name ="page_desc" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="page_slug" class="control-label">Page Link</label>
						<input id="page_slug" name ="page_slug" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="page_locale" class="control-label">Locale / Language</label>
						<select id="page_locale" name="page_locale" class="form-control">
							<option value="en-us">English</option>
							<option value="zh-cn">Chinese</option>
						</select>
					</div>
					<div class="form-group">
						<label for="page_menu" class="control-label">Menu / Type</label>
						@if (isset($pMenus) && !$pMenus->isEmpty())
						<select multiple id="page_menu" name="page_menu[]" class="form-control">
						@foreach ($pMenus as $menu)
							<optgroup label="{{ $menu->menu_name }}">
								<option value="{{ $menu->menu_id }}">{{ $menu->menu_name }}</option>
								@if (isset($cMenus) && !$cMenus->isEmpty())
								@foreach ($cMenus as $cMenu)
								@if ($cMenu->parent_menu_id == $menu->menu_id)
								<option value="{{ $cMenu->menu_id }}">{{ $cMenu->menu_name }}</option>
								@endif
								@endforeach
								@endif
							</optgroup>
						@endforeach
						@else
						<select id="page_menu" name="page_menu" class="form-control" disabled>
						@endif 
						</select>
					</div>
					<div class="form-group">
						<label for="page_content" class="control-label">Content</label>
						<textarea id="page_content" name="page_content" class="form-control" rows="8"></textarea>
					</div>
				</div>

				<div class="box-footer clearfix">
					<div class="pull-right">
						<a href="{{ url('/manage/page/') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add From Sections</h3>
			</div>

			<div class="box-body">
				<table id="tbl-section" class="table">
					<thead>
						<th width="80%">Name</th>
						<th>Action</th>
					</thead>
					<tbody>
					@if (isset($sections) && !$sections->isEmpty())
					@foreach ($sections as $section)
						<tr>
							<td>{{ $section->section_title }}</td>
							<td><button type="button" class="btn btn-primary" onclick="addSection('{{ $section->section_id }}', this)">Add</button></td>
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
	CKEDITOR.replace('page_content');

	$('#tbl-section').DataTable({
		searching: false,
		info: false
	});
});

function addSection(sectionId, btn)
{
	var oriSecIds = $('#section_id').val();
	var secIds = (oriSecIds != '') ? oriSecIds + ", " + sectionId : sectionId;
	$('#section_id').val(secIds);

	var newHtml = '<button type="button" class="btn btn-danger" onclick="removeSection('+ sectionId +', this)">Remove</button>';
	$(btn).replaceWith(newHtml);
}

function removeSection(sectionId, btn)
{
	var secIds = $('#section_id').val().replace(sectionId, "");
	var secIds = secIds.replace(sectionId, "");
	var secIds = secIds.replace(sectionId + ", ", "");
	$('#section_id').val(secIds);

	var newHtml = '<button type="button" class="btn btn-primary" onclick="addSection('+ sectionId +', this)">Add</button>';
	$(btn).replaceWith(newHtml);
}
</script>
@endsection