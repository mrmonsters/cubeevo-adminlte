@extends('app')

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
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Page #{{ $project->id }}</h3>
			</div>
			<form method="POST" action="{{ url('manage/project/update/' . $project->id) }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input name="_method" type="hidden" value="PUT" />
				<div class="box-body">
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input id="title" name="title" type="text" class="form-control" value="{{ $project->title }}" />
					</div>
					<div class="form-group">
						<label for="desc" class="control-label">Description</label>
						<input id="desc" name ="desc" type="text" class="form-control" value="{{ $project->desc }}" />
					</div>
					<div class="form-group">
						<label for="category" class="control-label">Category</label>
						@if (isset($categories) && !$categories->isEmpty())
						<select multiple id="category" name="category[]" class="form-control">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}" {{ (in_array($category->id, $projectCategoryIds)) ? 'selected' : '' }}>{{ $category->name }}</option>
						@endforeach
						@else
						<select id="category" name="category" class="form-control" disabled>
						@endif 
						</select>
					</div>
					<div class="form-group">
						<label for="content" class="control-label">Content</label>
						<textarea id="content" name="content" class="form-control" rows="8">{{ $project->content }}</textarea>
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