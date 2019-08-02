<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/oita/chojabaru-onsen/chojabaru-onsen.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>長者原温泉は、大分県玖珠郡九重町（旧国豊後国）の温泉で、九州の屋根と呼ばれるくじゅう（九重）連山の懐にある飯田高原にあります。温泉郷からは、ミヤマキリシマの花や紅葉など四季折々のくじゅう連山の山景色が楽しめ、泉質は神経痛や皮膚病などによく効くといわれています。
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
            <td class="r1">東京（羽田）→福岡空港→由布院→長者原</td>
            <td class="r2">飛行機→高速バス（ゆふいん号）→バス</td>
            <td class="r3">4時間45分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→福岡空港→由布院→長者原</td>
            <td class="r2">飛行機→高速バス（ゆふいん号）→バス</td>
            <td class="r3">5時間20分</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）→福岡空港→由布院→長者原</td>
            <td class="r2">飛行機→高速バス（ゆふいん号）→バス</td>
            <td class="r3">4時間55分</td>
        </tr>
        <tr>
            <td class="r1">名古屋→福岡空港→由布院→長者原</td>
            <td class="r2">飛行機→高速バス（ゆふいん号）→バス</td>
            <td class="r3">4時間25分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関空）→福岡空港→由布院→長者原</td>
            <td class="r2">飛行機→高速バス（ゆふいん号）→バス</td>
            <td class="r3">4時間10分</td>
        </tr>
        <tr>
            <td class="r1">福岡空港→由布院→長者原</td>
            <td class="r2">高速バス（ゆふいん号）→バス</td>
            <td class="r3">3時間</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>寒の地獄温泉</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/oita/chojabaru-onsen/reisen.jpg"
                alt="寒の地獄温泉">
            <p>寒の地獄温泉は約14℃の冷泉であり、毎分2,160リットルともいわれる湧出量は非常に多いレベルです。水着などを着て混浴で入ります。冷泉の隣の部屋には、ストーブがたかれた暖房室が備えられ、冷泉と暖房室を行き来するのが伝統的な入浴法です。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>阿蘇くじゅう国立公園</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/oita/chojabaru-onsen/aso-kuju-kokuritsu-park.jpg"
                alt="阿蘇くじゅう国立公園">
            <p>阿蘇くじゅう国立公園は、大きなカルデラが特徴的な阿蘇山や、北部に連なるくじゅう連山、その周辺になだらかに広がる草原が特徴的な公園です。長者原温泉に近い「長者原ビジターセンター」は公園が望める絶好な立地であり、敷地内のタデ原湿原では広い木道を散策できます。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>くじゅう（九重）連山</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/oita/chojabaru-onsen/kuju-renzan.jpg"
                alt="くじゅう（九重）連山">
            <p>くじゅう連山は、九州本土最高峰の中岳（標高1,791m）をはじめとした山々を持つ、日本百名山のひとつです。5月下旬から6月上旬頃まで、天然記念物のミヤマキリシマの花が、山肌をピンクに染める様子を楽しむことができます。
            </p>
        </div>
    </div>