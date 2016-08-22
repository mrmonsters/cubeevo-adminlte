<div class="col-xs-12">
    @if ($jobs->count() > 0)
        <div class="row">
            @foreach ($jobs as $index => $job)
                <div class="col-sm-push-3 col-md-6 m-b-md col-md-push-1 col-xs-10">
                    <h4>{{ strtoupper($job->title) }} </h4>
                    <?php echo html_entity_decode($job->qualification); ?>
                    {{--<ul class="padder">--}}
                        {{--<li>Good understanding in advertising industries.</li>--}}
                        {{--<li>Able to work closely with client and creative team.</li>--}}
                        {{--<li>Good understanding in advertising industries.</li>--}}
                        {{--<li>Able to work closely with client and creative team.</li>--}}
                        {{--<li>Good understanding in advertising industries.</li>--}}
                        {{--<li>Able to work closely with client and creative team.</li>--}}
                        {{--<li>Good understanding in advertising industries.</li>--}}
                    {{--</ul>--}}
                    <div class="visible-xs visible-sm m-t-lg">
                        <a href="mailto:career@cubeevo.com" class="btn btn-orange__apply m-b-xxl">Apply</a>
                    </div>
                </div>
            @endforeach
            @foreach ($jobs as $index => $job)
                <div class="col-sm-6 m-b-md col-md-push-1 col-xs-10 m-b-xxl hidden-xs hidden-sm">
                    <a href="mailto:career@cubeevo.com" class="btn btn-orange__apply m-b-xxl">Apply</a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">There is no full time position available.</p>
    @endif
</div>