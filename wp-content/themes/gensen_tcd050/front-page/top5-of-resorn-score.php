<?php
$upload_dir = wp_upload_dir();
?>

<div class="cb_content cb_content-wysiwyg">
    <div class="inner">
        <div class="post_content clearfix">
            <div class="res-dis-none">
                <h2 class="cb_headline rich_font">RESORN（リゾーン）スコア TOP5求人</h2>
                <p class="cb_desc">さぁ、ホワイトなリゾートバイト求人を簡単に見つけましょう。</p>
                <p><?php echo top5_of_resorn_score(); ?>
                </p>
                <p>> もっと見てみる</p>
            </div>
        </div>
    </div>
</div>