<?php 
$locale = Session::get('locale'); 
$count  = 0;
?>

@foreach ($jobs as $job)
@if (++$count % 3 == 1)
	<?php echo '<div class="row">'; ?>
@endif
<div class="col-xs-12 col-sm-4">
	<div class="job">
		<h5 class="txtwhite">{{ $job->translate($locale)->title }}</h5>
		<p>{{ $job->translate($locale)->desc }}</p>
		<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal{{ $job->id }}">{{ ($locale == 'cn') ? '加入形立方' : 'JOIN' }}</button>
	</div>	
</div>
@if (($count % 3 == 0) || ($count == $jobs->count())) 
	<?php echo "</div>"; ?>
@endif
@endforeach

@foreach ($jobs as $job)
<?php $qualifications = explode("|", $job->translate($locale)->qualification); ?>
<div class="modal fade" id="myModal{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">{{ $job->translate($locale)->title }}</h4>
			</div>
			<div class="modal-body">
				<ul>
					@foreach ($qualifications as $q)
					<li>{{ $q }}</li>
					@endforeach
				</ul> 
			</div>
			<div class="modal-footer"> 
				<a href="mailto:enquire@cubeevo.com" class="btn btn-primary btn-orange">{{ ($locale == 'cn') ? '申请' : 'Apply' }}</a>
			</div>
		</div>
	</div>
</div>
@endforeach