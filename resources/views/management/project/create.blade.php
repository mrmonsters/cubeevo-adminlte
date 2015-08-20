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
				<h3 class="box-title">Project</h3>
			</div>
			<form method="POST" action="{{ url('manage/project/store') }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<div class="box-body">
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input id="name" name="name" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="desc" class="control-label">Description</label>
						<input id="desc" name ="desc" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="category" class="control-label">Category</label>
						@if (isset($categories) && !$categories->isEmpty())
						<select multiple id="category" name="category[]" class="form-control">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
						@else
						<select id="category" name="category" class="form-control" disabled>
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
						<a href="{{ url('/admin/manage/project/') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection