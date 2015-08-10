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
				<table id="tbl-page" class="table">
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
						@if (isset($pages) && !$pages->isEmpty())
						@foreach ($pages as $page)
						<tr>
							<td>{{ $page->page_id }}</td>
							<td>{{ $page->page_title }}</td>
							<td>{{ $page->page_desc }}</td>
							<td>{{ $page->page_locale }}</td>
							<td>{{ $page->created_at }}</td>
							<td>{{ $page->updated_at }}</td>
							<td>
								@if ($page->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($page->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('manage/page/edit/' . $page->page_id) }}" class="btn btn-default">Edit</a>
								<a href="{{ url('manage/page/destroy/' . $page->page_id) }}" class="btn btn-danger">Delete</a>
							</td>
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
	$('#tbl-page').DataTable();
});
</script>
@endsection