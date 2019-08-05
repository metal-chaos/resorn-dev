<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner" src="<?php
        echo $upload_dir['baseurl'];
        echo read_category_template();
    ?>/main.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>沖縄県小浜島は、石垣島からフェリーで約30分の距離にあります。朝ドラ『ちゅらさん』のロケ地にも選ばれた、のんびりとした風土の小さな島です。リゾート施設『はいむるぶし』は、小浜島で最も認知度の高い観光施設として、島の観光業を支えています。はいむるびし以外の観光スポットは、『大岳』と呼ばれる標高99mの小さな山で、国の史跡としても有名です。また『大盛家住宅』と呼ばれる1915年に建築された伝統的な民家は、「ちゅらさん」のロケ地としても知られています。
        </p>
    </div>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>へのアクセス・所要時間</h3>
    <table class="archive_heading_table">
        <tr>
            <th class="r1">出発地</th>
            <th class="r2">手段</th>
            <th class="r3">所要時間</th>
        </tr>
        <tr>
            <td class="r1">東京（羽田）→石垣空港→小浜島</td>
            <td class="r2">飛行機→フェリー</td>
            <td class="r3">3時間45分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→石垣空港→小浜島</td>
            <td class="r2">飛行機→フェリー</td>
            <td class="r3">5時間45分</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）→石垣空港→小浜島</td>
            <td class="r2">飛行機→フェリー</td>
            <td class="r3">5時間30分</td>
        </tr>
        <tr>
            <td class="r1">名古屋→石垣空港→小浜島</td>
            <td class="r2">飛行機→フェリー</td>
            <td class="r3">2時間55分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関西空港）→石垣空港→小浜島</td>
            <td class="r2">飛行機→フェリー</td>
            <td class="r3">2時間55分</td>
        </tr>
        <tr>
            <td class="r1">福岡→石垣空港→小浜島</td>
            <td class="r2">飛行機→フェリー</td>
            <td class="r3">2時間30分</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>はいむるぶし</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_1.jpg" alt="はいむるぶし">
            <p>島の5分の1の面積を占める、大型リゾート施設です。様々な種類のコテージが海沿いに面して作られており、自然の中でゆったりと過ごすことが可能です。施設内のレストランは島が大きく見渡せるガラス張りで、島でとれる新鮮な魚介類を堪能できます。小浜島のフェリー乗り場からシャトルバスが出ており、はいむるぶしまでは約10分で到着します。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>はいむるぶしビーチ</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_2.jpg" alt="はいむるぶしビーチ">
            <p>大型リゾート施設「はいむるぶし」の施設内にある「はいむるぶしビーチ」は、小浜島随一の海岸です。当日申し込みの船を使えば、サンゴ礁の綺麗な沖合に浮かぶ「シーステーション」まで1時間で向かうことができます。マリンジェットやロデオボート、シースライダー、ウェイクボード（水上スキー）などマリンスポーツも充実しています。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>浜島（幻の島）</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_3.jpg" alt="浜島（幻の島）">
            <p>石垣島から西に10kmに位置する浜島は、石垣島・西表島・竹富島などに属する八重山諸島の島のひとつです。潮が引くときのみ島が姿を現すため、「幻の島」という呼び名の観光スポットになっています。真っ白なビーチと透き通ったエメラルドグリーンの美しい海は魅力的です。
            </p>
        </div>
    </div>