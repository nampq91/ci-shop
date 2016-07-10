<?php if($getData['top_hot']) { ?>
<div class="title_gwperfectproduct col-md-2 col-sm-4 col-xs-12">
    <p>New <strong><br> 2015</strong></p>
    <p>
        <a class="owl-prev-1" href="#" onclick="$('.gwperfectproduct').trigger('prev.owl'); return false;"><i class="icon-caret-left"></i></a>
        <a class="owl-next-1" href="#" onclick="$('.gwperfectproduct').trigger('next.owl'); return false;"><i class="icon-caret-right"></i></a>
    </p>
</div>
<div id="gwperfectproduct-carousel" class="col-md-10 col-sm-8 col-xs-12">
    <ul class="gwperfectproduct owl-carousel" data-autoplay="false" data-hoverpause="false" data-timeout="6000">
        <?php foreach ($getData['top_hot'] as $item) { ?>
            <li>
                <a href="<?=$item->link?>" title="<?=$item->name?>"><img src="<?=$item->photo?>" alt="<?=$item->name?>" /></a>
                <h4><?=$item->name?></h4>
            </li>
        <?php } ?>
    </ul>
</div>
<?php } ?>