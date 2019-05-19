<?php
$upload_dir = wp_upload_dir();
?>

<div class="cb_content cb_content-wysiwyg">
    <div class="inner">
        <div class="post_content clearfix">
            <h2 class="cb_headline rich_font">RESORN（リゾーン）の3つの特徴</h2>
            <p class="cb_desc">リゾートバイト求人検索サイト「RESORN（リゾーン）」の特徴を紹介します。</p>
            <div class="post_row">
                <div class="post_col post_col-3">
                    <div class="top-icons">
                        <div class="for-sp-icon">
                            <h3>①圧倒的求人数</h3>
                            <img class="top-icon"
                                src="<?php  echo $upload_dir['baseurl']; ?>/top/three-features/number-of-recruits.png"
                                alt="求人数は<?php echo number_of_all_job_offers(); ?>件">
                        </div>
                    </div>
                    <p class="icon-bottom-text">
                        RESORN（リゾーン）では、派遣会社4社の5,000件以上もの求人を掲載しています。トップレベルの求人数を誇るRESORNで仕事を探してみましょう。</p>
                </div>
                <div class="post_col post_col-3">
                    <div class="top-icons">
                        <div class="for-sp-icon">
                            <h3>②全国から選ぶ</h3>
                            <img class="top-icon"
                                src="<?php  echo $upload_dir['baseurl']; ?>/top/three-features/japan.png"
                                alt="日本全国47都道府県">
                        </div>
                    </div>
                    <p class="icon-bottom-text">北は北海道から南は沖縄まで、日本全国の地域検索に対応しています。スキーや温泉、南国の海など目的別の求人探しができる優れた検索機能を有しています。
                    </p>
                </div>
                <div class="post_col post_col-3">
                    <div class="top-icons">
                        <div class="for-sp-icon">
                            <h3>③給料別の検索</h3>
                            <img class="top-icon"
                                src="<?php  echo $upload_dir['baseurl']; ?>/top/three-features/type-of-salary.png"
                                alt="高時給の求人も検索可能">
                        </div>
                    </div>
                    <p class="icon-bottom-text">時給・月給の給料別検索に対応しています。時給800円未満から1,400円以上まで、高機能な検索で満足できる価値を提供します。</p>
                </div>
            </div>
            <div class="top-logos">
                <div class="top-logo">
                    <a href="<?php echo home_url(); ?>/tag/humanic/">
                        <img
                            src="<?php  echo $upload_dir['baseurl']; ?>/2018/01/logo_humanic_1-2.png">
                    </a>
                </div>
                <div class="top-logo">
                    <a href="<?php echo home_url(); ?>/tag/goodman/">
                        <img
                            src="<?php  echo $upload_dir['baseurl']; ?>/2018/01/logo_goodman_1-2.png">
                    </a>
                </div>
                <div class="top-logo">
                    <a href="<?php echo home_url(); ?>/tag/apptli/">
                        <img
                            src="<?php  echo $upload_dir['baseurl']; ?>/2018/01/logo_appli_1-2-300x53.png">
                    </a>
                </div>
                <div class="top-logo">
                    <a
                        href="<?php echo home_url(); ?>/tag/a-resort/">
                        <img
                            src="<?php  echo $upload_dir['baseurl']; ?>/2018/01/logo_alpharesort_1-1.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>