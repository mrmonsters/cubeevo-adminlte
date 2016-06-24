@if ($response = Session::get('response'))
	<div class="alert alert-{{ ($response['code'] == \App\Models\Status::SUCCESS) ? 'success' : 'danger' }} alert-dismissable">
		<i class="fa fa-{{ ($response['code'] == \App\Models\Status::SUCCESS) ? 'check' : 'ban' }}" style="padding: 0 8px;"></i> {{ $response['msg'] }}
		<button type="button" class="close" data-dismiss="alert">×</button>
	</div>
@endif