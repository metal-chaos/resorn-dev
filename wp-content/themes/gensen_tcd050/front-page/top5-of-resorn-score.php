<?php
$upload_dir = wp_upload_dir();
?>

<div class="cb_content cb_content-wysiwyg">
    <div class="inner">
        <div class="post_content clearfix">
            <div class="res-dis-none">
                <h2 class="cb_headline rich_font">RESORNスコアTOP5求人</h2>
                <p class="cb_desc">RESORNスコアの計算方法については、こちらをご覧ください。</p>
                <?php echo top5_of_resorn_score(); ?>
            </div>
        </div>
    </div>
</div>