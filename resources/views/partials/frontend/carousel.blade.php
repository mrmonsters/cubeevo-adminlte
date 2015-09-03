<?php
use App\Models\Files;

$imgIds = explode(",", $block->value);
?>
<div class="row">
    <div class="col-xs-12 nopadding">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php $count = 0; ?>
                @foreach ($imgIds as $id)
                <li class="{{ ($count == 0) ? 'active' : '' }}" data-target="#carousel-example-generic" data-slide-to="{{ $count++ }}"></li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $count = 0; ?>
                @foreach ($imgIds as $id)
                <div class="item {{ ($count++ == 0) ? 'active' : '' }}" style="max-height: 980px;">
                    <img src="{{ Files::find($id)->dir }}" alt="{{ Files::find($id)->name }}" width="100%">
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