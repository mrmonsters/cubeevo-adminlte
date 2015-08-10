@extends('app')

@section('htmlheader_title')
Section Management
@endsection

@section('contentheader_title')
Section Management
@endsection

@section('contentheader_description')
Description for section management
@endsection

@section('main-content')
<div class="row">

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Section</h3>
				<a href="{{ url('manage/section/create') }}" class="btn btn-primary pull-right">Create</a>
			</div>

			<div class="box-body">
				<table id="tbl-section" class="table">
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
						@if (isset($sections) && !$sections->isEmpty())
						@foreach ($sections as $section)
						<tr>
							<td>{{ $section->section_id }}</td>
							<td>{{ $section->section_title }}</td>
							<td>{{ $section->section_desc }}</td>
							<td>{{ $section->section_locale }}</td>
							<td>{{ $section->created_at }}</td>
							<td>{{ $section->updated_at }}</td>
							<td>
								@if ($section->status == '2')
								<span class="label label-success">Active</span>
								@elseif ($section->status == '1')
								<span class="label label-danger">Inactive</span>
								@else 
								<span class="label label-warning">Incomplete</span>
								@endif
							</td>
							<td>
								<a href="{{ url('manage/section/edit/' . $section->section_id) }}" class="btn btn-default">Edit</a>
								<a href="{{ url('manage/section/destroy/' . $section->section_id) }}" class="btn btn-danger">Delete</a>
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
	$('#tbl-section').DataTable();
});
</script>
@endsection