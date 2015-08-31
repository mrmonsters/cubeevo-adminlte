<?php 
use App\Models\Status;

$response = Session::get('response');
?>

@if ($response != null && !empty($response))
<div class="col-md-12">
	<div class="alert alert-{{ ($response['code'] == STATUS::SUCCESS) ? 'success' : 'danger' }} alert-dismissable">
		<i class="fa fa-{{ ($response['code'] == STATUS::SUCCESS) ? 'check' : 'ban' }}" style="padding: 0 8px;"></i> {{ $response['msg'] }}
		<button type="button" class="close" data-dismiss="alert">×</button>
	</div>
</div>
@endif