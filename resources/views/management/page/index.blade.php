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

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Static Page</h3>
				<a href="{{ url('manage/page/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>

			<div class="box-body">
				<table class="table">
					<thead>
						<th width="5%">ID</th>
						<th width="15%">Title</th>
						<th width="30%">Description</th>
						<th width="10%">Locale</th>
						<th width="10%">Created At</th>
						<th width="10%">Updated At</th>
						<th width="5%">Status</th>
						<th width="15%">Action</th>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Sample Page Title #1</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
							<td>zh-cn</td>
							<td>2-8-2015 17:49:00</td>
							<td>2-8-2015 17:49:00</td>
							<td>
								<span class="label label-success">Active</span>
							</td>
							<td>
								<a href="#" class="btn btn-default">Edit</a>
								<a href="#" class="btn btn-danger">Delete</a>
							</td>
						</tr>

						<tr>
							<td>2</td>
							<td>Sample Page Title #2</td>
							<td>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
							<td>zh-cn</td>
							<td>2-8-2015 17:49:00</td>
							<td>2-8-2015 17:49:00</td>
							<td>
								<span class="label label-danger">Inactive</span>
							</td>
							<td>
								<a href="#" class="btn btn-default">Edit</a>
								<a href="#" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
@endsection