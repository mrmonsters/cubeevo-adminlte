@extends('app')

@section('htmlheader_title')
    Home
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
	<div class="col-md-12">
		<div class="box box-primary"> 
			<div class="panel-heading">Home</div>

			<div class="panel-body">
				You are logged in!
			</div> 
		</div>
	</div>
</div>
@endsection
