@if ($reviewers->count() > 0)
    @foreach ($reviewers->chunk(2) as $collection)
        <div class="col-xs-12  col-lg-10 col-lg-push-1">
            <div class="row">
                @foreach ($collection as $reviewer)
                    <div class="col-md-6">
                        <div class="b-b b-black b-3x m-t-lg">
                            <p style="width: 100%;">{{ strtoupper($reviewer->name) }}<br/><span
                                        class="pull-right"> {{ strtoupper(date_format(new DateTime($reviewer->date), 'd M Y')) }} </span> {{ strtoupper($reviewer->qualification) }} </p>
                        </div>
                        @if (Session::get('locale') == 'cn')
                            <div class="m-t-lg">
                            @foreach ($reviewer->zhReviews()->get()->sortBy('sort') as $review)
                                <p>
                                    Q: <b>{{ $review->question }}</b><br/>
                                    A: {{ $review->answer }}
                                </p><br/>
                            @endforeach
                            </div>
                        @else
                            <div class="m-t-lg">
                                @foreach ($reviewer->enReviews()->get()->sortBy('sort') as $review)
                                    <p>
                                        Q: <b>{{ $review->question }}</b><br/>
                                        A: {{ $review->answer }}
                                    </p><br/>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endif