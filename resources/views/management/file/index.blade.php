@extends('app')

@section('htmlheader_title')
File Management
@endsection

@section('contentheader_title')
File Management
@endsection

@section('contentheader_description')
Description for file management
@endsection

@section('main-content')
<div class="row">

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">File</h3>
				<a href="{{ url('manage/file/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>

			<div class="box-body">
				<table class="table">
					<thead>
						<th width="5%">ID</th>
						<th width="15%">Name</th>
						<th width="10%">Type</th>
						<th width="25%">Directory</th>
						<th width="10%">Size</th>
						<th width="10%">Created At</th>
						<th width="10%">Updated At</th>
						<th width="5%">Status</th>
						<th width="10%">Action</th>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Sample File #1</td>
							<td>.pdf</td>
							<td>/image/image1.jpg</td>
							<td>1024</td>
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
							<td>Sample File #2</td>
							<td>.jpeg</td>
							<td>image/image2.jpg</td>
							<td>2048</td>
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