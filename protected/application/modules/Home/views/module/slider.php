<div class="sequence-theme">
    <div id="sequence">
        <ul class="sequence-canvas">
            <?php if($getData['slider']){ $dem=1; foreach ($getData['slider'] as $item) { ?>
                <li class="slide-item slide-item-<?=$dem?>">
                    <div class="container slider-caption">
                        <h2 class="title"><span style="color:#fff;"><?=$item['name']?></span></h2>
                        <p><span style="color:#ffffff;font-size:12px;"><?=$item['description']?></span></p>
                        <p><a class="btn btn-link" href="#">Read more!</a></p>
                    </div>
                    <a href="#" class="model"> <img alt="<?=$item['name']?>" src="<?=$item['photo']?>" /> </a>
                </li>
            <?php $dem++; } } ?>
        </ul>
        <ul class="sequence-pagination">
        <?php for($i=1;$i<$dem;$i++){ ?>
            <li><span><i class="icon-circle"></i></span></li>
        <?php } ?>
        </ul>
    </div>
</div>