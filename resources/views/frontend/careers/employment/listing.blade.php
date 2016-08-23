<div class="col-xs-12 jobs">
    @if ($jobs->count() > 0)
        <div class="row">
            @foreach ($jobs as $index => $job)
                <div class="col-sm-push-2 col-md-5 col-md-push-1 col-lg-6 col-lg-push-1 m-b-md col-xs-push-1 col-xs-10 col-sm-8 job">
                    <h4>{{ strtoupper($job->title) }} </h4>
                    <?php echo html_entity_decode($job->qualification); ?>
                    <div class="m-t-lg">
                        <a href="mailto:career@cubeevo.com" class="btn btn-orange__apply m-b-xxl">Apply</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">There is no full time position available.</p>
    @endif
</div>