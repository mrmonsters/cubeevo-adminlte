@extends('app')

@section('htmlheader_title')
Contact Us Management
@endsection

@section('contentheader_title')
Contact Us Management
@endsection

@section('contentheader_description')
Description for contact us management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">View Message #{{ $message->id }}</h3>
			</div>
			<hr />
			<div class="box-body">
				<div class="form-group">
					<label for="subject" class="control-label">Subject</label>
					<input id="subject" name="subject" type="text" class="form-control" value="{{ $message->subject }}" readonly />
				</div>
				<div class="form-group">
					<label for="name" class="control-label">Sender's Name</label>
					<input id="name" name="name" type="text" class="form-control" value="{{ $message->name }}" readonly />
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Sender's Email</label>
					<input id="email" name="email" type="text" class="form-control" value="{{ $message->email }}" readonly />
				</div>
				<div class="form-group">
					<label for="phone" class="control-label">Sender's Contact Number</label>
					<input id="phone" name="phone" type="text" class="form-control" value="{{ $message->phone }}" readonly />
				</div>
				<div class="form-group">
					<label for="content" class="control-label">Directory</label>
					<textarea id="content" name="content" class="form-control" rows="8" readonly>{{ $message->content }}</textarea>
				</div>
			</div>
			<div class="box-footer clearfix">
				<div class="pull-right">
					<a href="{{ url('/admin/manage/message/') }}" class="btn btn-default">Cancel</a>
					<a href="{{ url('/admin/manage/message/destroy/' . $message->id) }}" class="btn btn-danger">Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection