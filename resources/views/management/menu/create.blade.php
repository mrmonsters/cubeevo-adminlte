@extends('app')

@section('htmlheader_title')
Menu Management
@endsection

@section('contentheader_title')
Menu Management
@endsection

@section('contentheader_description')
Description for menu management
@endsection

@section('main-content')
<div class="container">
	<div class="row">

		<div class="col-md-10 col-offset-md-1">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">New Menu</h3>
				</div>

				<form method="POST" action="{{ url('manage/menu/store') }}" class="form-horizontal">
					<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
					<div class="box-body">
						<div class="form-group">
							<label for="menu_name" class="control-label col-md-2">Name</label>
							<div class="col-md-10">
								<input id="menu_name" name="menu_name" type="text" class="form-control" />
							</div>
						</div>

						<div class="form-group">
							<label for="menu_desc" class="control-label col-md-2">Description</label>
							<div class="col-md-10">
								<textarea id="menu_desc" name="menu_desc" class="form-control" rows="5"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="parent_menu_id" class="control-label col-md-2">Parent Menu</label>
							<div class="col-md-10">
								@if (isset($menus) && !$menus->isEmpty())
								<select id="parent_menu_id" name="parent_menu_id" class="form-control">
									<option value="">None</option>
								@foreach ($menus as $menu)
									<option value="{{ $menu->menu_id }}">{{ $menu->menu_name }}</option>
								@endforeach
								@else
								<select id="parent_menu_id" name="parent_menu_id" class="form-control" disabled>
								@endif
								</select>
							</div>
						</div>
					</div>

					<div class="box-footer clearfix">
						<div class="pull-right">
							<a href="{{ url('/manage/menu/') }}" class="btn btn-default">Cancel</a>
							<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
@endsection