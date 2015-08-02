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
<div class="row">

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Menu</h3>
				<a href="{{ url('manage/menu/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>

			<div class="box-body">
				<table class="table">
					<thead>
						<th width="5%">ID</th>
						<th width="15%">Name</th>
						<th width="25%">Description</th>
						<th width="15%">Parent</th>
						<th width="10%">Created At</th>
						<th width="10%">Updated At</th>
						<th width="5%">Status</th>
						<th width="15%">Action</th>
					</thead>
					<tbody>
						@if (isset($menus) && !$menus->isEmpty())
						@foreach ($menus as $menu)
						<tr>
							<td>{{ $menu->menu_id }}</td>
							<td>{{ $menu->menu_name }}</td>
							<td>{{ $menu->menu_desc }}</td>
							@if (isset($menu->parent_menu_id))
							<td>{{ $menu->parent_menu_id }}</td>
							@else
							<td>-</td>
							@endif
							<td>{{ $menu->created_at }}</td>
							<td>{{ $menu->updated_at }}</td>
							<td>
								@if ($menu->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($menu->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('manage/menu/edit/' . $menu->menu_id) }}" class="btn btn-default">Edit</a>
								<a href="{{ url('manage/menu/destroy/' . $menu->menu_id) }}" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>

			<div class="box-footer clearfix">
				<div style="text-align: center;">
					Displaying <span class="label label-success">{{ $menus->count() }}</span> result(s)
				</div>	
			</div>
		</div>
	</div>

</div>
@endsection