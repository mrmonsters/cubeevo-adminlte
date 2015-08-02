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

			<form>
				<div class="box-body">
					<!--
					<div class="form-group">
						<label for="" class="control-label"></label>
						<input id="" name ="" type="" class="form-control" />
					</div>
					-->
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
						<select id="page_locale" name="page_menu" class="form-control">
							<option value="en-us">English</option>
							<option value="zh-cn">Chinese</option>
						</select>
					</div>
					<div class="form-group">
						<label for="page_menu" class="control-label">Menu / Type</label>
						<select id="page_menu" name="page_menu" class="form-control">
							<optgroup label="Parent Cat 1">
								<option value="child_cat_1">Child Cat 1</option>
								<option value="child_cat_2">Child Cat 2</option>
							</optgroup>
							<optgroup label="Parent Cat 2">
								<option value="child_cat_3">Child Cat 3</option>
								<option value="child_cat_4">Child Cat 4</option>
							</optgroup>
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
				<table class="table">
					<thead>
						<th width="80%">Name</th>
						<th>Action</th>
					</thead>
					<tbody>
						<tr>
							<td>Sample Section #1</td>
							<td><a href="#" class="btn btn-primary">Add</a></td>
						</tr>
						<tr>
							<td>Sample Section #2</td>
							<td><a href="#" class="btn btn-primary">Add</a></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="box-footer clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<li><a href="#">«</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">»</a></li>
				</ul>
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
});
</script>
@endsection