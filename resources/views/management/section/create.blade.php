@extends('app')

@section('htmlheader_title')
Page Section Management
@endsection

@section('contentheader_title')
Page Section Management
@endsection

@section('contentheader_description')
Description for page section management
@endsection

@section('main-content')
<div class="container">
	<div class="row">

		<div class="col-md-10 col-offset-md-1">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Page Section</h3>
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
							<label for="section_title" class="control-label">Title</label>
							<input id="section_title" name="section_title" type="text" class="form-control" />
						</div>
						<div class="form-group">
							<label for="section_desc" class="control-label">Description</label>
							<input id="section_desc" name ="section_desc" type="text" class="form-control" />
						</div>
						<div class="form-group">
							<label for="section_menu" class="control-label">Locale / Language</label>
							<select id="section_menu" name="section_menu" class="form-control">
								<option value="en-us">English</option>
								<option value="zh-cn">Chinese</option>
							</select>
						</div>
						<div class="form-group">
							<label for="section_content" class="control-label">Content</label>
							<textarea id="section_content" name="section_content" class="form-control" rows="8"></textarea>
						</div>
					</div>

					<div class="box-footer clearfix">
						<div class="pull-right">
							<a href="{{ url('/manage/section/') }}" class="btn btn-default">Cancel</a>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
@endsection

@section('addon-script')
<script type="text/javascript">
$(document).ready(function()
{
	CKEDITOR.replace('section_content');
});
</script>
@endsection