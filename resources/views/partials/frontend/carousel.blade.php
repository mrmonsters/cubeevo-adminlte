<div class="row">
    <div class="col-xs-12 nopadding">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 980px;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php $count = 0; ?>
                @foreach ($project->projectImages()->orderBy('sort_order')->get() as $image)
                <li class="{{ ($count == 0) ? 'active' : '' }}" data-target="#carousel-example-generic" data-slide-to="{{ $count++ }}"></li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $count = 0; ?>
                @foreach ($project->projectImages()->orderBy('sort_order')->get() as $image)
                <div class="item {{ ($count++ == 0) ? 'active' : '' }}" style="max-height: 980px;">
                    <img src="{{ $image->image->dir }}" alt="{{ $image->image->name }}" width="100%">
                </div>
                @endforeach
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>