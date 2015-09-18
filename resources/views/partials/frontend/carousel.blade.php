<?php
use App\Models\Files;

$imgIds = explode(",", $block->value);
?>
<div class="row">
    <div class="col-xs-12 nopadding">
        <div class="slick-carousel"> 
            <?php $count = 0; ?>
            @foreach ($imgIds as $id)
            <div class="item {{ ($count++ == 0) ? 'active' : '' }}" style="max-height: 980px;position:relative;">
                <img data-lazy="{{ Files::find($id)->dir }}" width="100%"/> 
                <div class="loader" style="position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 60px;
                    height: 4px; 
                    margin-left: -30px;
                    margin-top: -2px;
                    animation: spin 1.5s infinite linear;
                    animation-timing-function: ease;
                    -webkit-animation: spin 1.5s infinite linear;
                    -webkit-animation-timing-function: ease;">
                    <div class="loader">
                      <div class="square" ></div>
                      <div class="square"></div>
                      <div class="square last"></div>
                      <div class="square clear"></div>
                      <div class="square"></div>
                      <div class="square last"></div>
                      <div class="square clear"></div>
                      <div class="square "></div>
                      <div class="square last"></div>
                    </div> 
                </div> 
            </div>
            @endforeach
        </div> 
    </div>
</div>