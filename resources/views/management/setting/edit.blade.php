@extends('app')

@section('htmlheader_title')
Setting Management
@endsection

@section('contentheader_title')
Setting Management
@endsection

@section('contentheader_description')
Description for setting management
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Setting</h3>
			</div>
			<form method="POST" action="{{ url('manage/setting/update') }}">
				<input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
				<input name="_method" type="hidden" value="PUT" />
				<div class="box-body">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#site" data-toggle="tab">Site</a></li>
							<li><a href="#user" data-toggle="tab">User</a></li>
						</ul>
						<div class="tab-content">
							<div id="site" class="tab-pane active">
								<div class="form-group">
									<label for="ga_key" class="control-label">{{ $settings->where('code', 'ga_key')->first()->name }}</label>
									<input id="ga_key" name="ga_key" type="text" class="form-control" value="{{ $settings->where('code', 'ga_key')->first()->value }}" />
								</div>
								<div class="form-group">
									<label for="gmaps_lat" class="control-label">{{ $settings->where('code', 'gmaps_lat')->first()->name }}</label>
									<input id="gmaps_lat" name="gmaps_lat" type="text" class="form-control" value="{{ $settings->where('code', 'gmaps_lat')->first()->value }}" />
								</div>
								<div class="form-group">
									<label for="gmaps_lng" class="control-label">{{ $settings->where('code', 'gmaps_lng')->first()->name }}</label>
									<input id="gmaps_lng" name="gmaps_lng" type="text" class="form-control" value="{{ $settings->where('code', 'gmaps_lng')->first()->value }}" />
								</div>
							</div>
							<div id="user" class="tab-pane">
								<div class="form-group">
									<label for="address" class="control-label">{{ $settings->where('code', 'address')->first()->name }}</label>
									<textarea id="address" name="address" class="form-control" row="3">{{ $settings->where('code', 'address')->first()->value }}</textarea>
								</div>
								<div class="form-group">
									<label for="phone" class="control-label">{{ $settings->where('code', 'phone')->first()->name }}</label>
									<input id="phone" name="phone" type="text" class="form-control" value="{{ $settings->where('code', 'phone')->first()->value }}" />
								</div>
								<div class="form-group">
									<label for="fax" class="control-label">{{ $settings->where('code', 'fax')->first()->name }}</label>
									<input id="fax" name="fax" type="text" class="form-control" value="{{ $settings->where('code', 'fax')->first()->value }}" />
								</div>
								<div class="form-group">
									<label for="email" class="control-label">{{ $settings->where('code', 'email')->first()->name }}</label>
									<input id="email" name="email" type="text" class="form-control" value="{{ $settings->where('code', 'email')->first()->value }}" />
								</div>
								<div class="form-group">
									<label for="facebook_link" class="control-label">{{ $settings->where('code', 'facebook_link')->first()->name }}</label>
									<input id="facebook_link" name="facebook_link" type="text" class="form-control" value="{{ $settings->where('code', 'facebook_link')->first()->value }}" />
								</div>
								<div class="form-group">
									<label for="youtube_link" class="control-label">{{ $settings->where('code', 'youtube_link')->first()->name }}</label>
									<input id="youtube_link" name="youtube_link" type="text" class="form-control" value="{{ $settings->where('code', 'youtube_link')->first()->value }}" />
								</div>
								<div class="form-group">
									<label for="instagram_link" class="control-label">{{ $settings->where('code', 'instagram_link')->first()->name }}</label>
									<input id="instagram_link" name="instagram_link" type="text" class="form-control" value="{{ $settings->where('code', 'instagram_link')->first()->value }}" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection