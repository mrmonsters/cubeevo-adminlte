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
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input id="title" name="title" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label for="desc" class="control-label">Description</label>
						<input id="desc" name ="desc" type="text" class="form-control" />
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