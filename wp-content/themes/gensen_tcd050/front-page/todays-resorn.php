<?php $upload_dir = wp_upload_dir(); ?>

<div class="cb_content cb_content-wysiwyg">
    <div class="inner">
        <div class="post_content clearfix">
            <div class="res-dis-none">
                <h2 class="cb_headline rich_font">本日のRESORN（リゾーン）</h2>
                <p class="cb_desc">本日の「RESORN（リゾーン）」の求人掲載情報です。</p>
                <div class="post_row">
                    <div class="post_col post_col-3">
                        <h3>掲載件数</h3>
                        <div class="top-icons">
                            <img class="top-icon"
                                src="http://dev-resorn-xx.xyz/wp-content/uploads/top/three-features/number-of-recruits.png">
                        </div>
                        <p>RESORN（リゾーン）では、驚くことに5,000件以上もの求人を掲載しています。トップレベルの求人数を誇るRESORNで仕事を探してみましょう。
                        </p>
                    </div>
                    <div class="post_col post_col-3">
                        <h3>平均時給</h3>
                        <div class="top-icons">
                            <img class="top-icon"
                                src="http://dev-resorn-xx.xyz/wp-content/uploads/top/three-features/japan.png">
                        </div>
                        <p>北は北海道から南は沖縄まで、日本全国の地域検索に対応しています。スキーや温泉、南国の海など目的別の求人探しができる優れた検索機能を有しています。<?php echo average_salary_all_job_offers(); ?>
                        </p>
                    </div>
                    <div class="post_col post_col-3">
                        <h3>最高時給</h3>
                        <div class="top-icons">
                            <img class="top-icon"
                                src="http://dev-resorn-xx.xyz/wp-content/uploads/top/three-features/type-of-salary.png">
                        </div>
                        <p>時給・月給の給料別検索に対応しています。時給800円未満から1,400円以上まで、高機能な検索で満足できる価値を必ず提供します。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 福利厚生ゾーン -->
    <div class="inner">
        <div class="post_content clearfix">
            <div class="post_row">
                <div class="post_col post_col-4">
                    <div class="top-icons">
                        <div class="for-sp-icon">
                            <h3>①個室寮付き求人</h3>
                            <img class="top-icon"
                                src="<?php echo $upload_dir['baseurl']; ?>/top/todays-resorn/graph-test.png">
                        </div>
                    </div>
                    <p class="icon-bottom-text">
                        RESORN（リゾーン）では、派遣会社4社の5,000件以上もの求人を掲載しています。トップレベルの求人数を誇るRESORNで仕事を探してみましょう。</p>
                </div>
                <div class="post_col post_col-4">
                    <div class="top-icons">
                        <div class="for-sp-icon">
                            <h3>②食事付き求人</h3>
                            <img class="top-icon"
                                src="<?php echo $upload_dir['baseurl']; ?>/top/todays-resorn/graph-test.png">
                        </div>
                    </div>
                    <p class="icon-bottom-text">北は北海道から南は沖縄まで、日本全国の地域検索に対応しています。スキーや温泉、南国の海など目的別の求人探しができる優れた検索機能を有しています。
                    </p>
                </div>
                <div class="post_col post_col-4">
                    <div class="top-icons">
                        <div class="for-sp-icon">
                            <h3>③Wi-Fi付き求人</h3>
                            <img class="top-icon"
                                src="<?php echo $upload_dir['baseurl']; ?>/top/todays-resorn/graph-test.png">
                        </div>
                    </div>
                    <p class="icon-bottom-text">時給・月給の給料別検索に対応しています。時給800円未満から1,400円以上まで、高機能な検索で満足できる価値を提供します。</p>
                </div>
                <div class="post_col post_col-4">
                    <div class="top-icons">
                        <div class="for-sp-icon">
                            <h3>③Wi-Fi付き求人</h3>
                            <img class="top-icon"
                                src="<?php echo $upload_dir['baseurl']; ?>/top/todays-resorn/graph-test.png">
                        </div>
                    </div>
                    <p class="icon-bottom-text">時給・月給の給料別検索に対応しています。時給800円未満から1,400円以上まで、高機能な検索で満足できる価値を提供します。</p>
                </div>
            </div>
        </div>
    </div>
</div>