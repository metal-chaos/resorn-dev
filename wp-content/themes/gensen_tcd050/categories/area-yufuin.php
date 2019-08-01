<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/oita/yufuin/yufuin.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>湯布院は由布院温泉、湯平温泉、塚原温泉という泉質の異なった3つ温泉地を抱えた観光スポットです。
            温泉が多い大分県の中でも山間に位置する湯布院は景色が素晴らしく、ゆったりと温泉につかって心と身体を癒やしたい方にはおすすめの温泉地です。
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
            <td class="r1">東京（羽田）→大分空港→由布院駅前バスセンター</td>
            <td class="r2">飛行機→バス（湯布院高速リムジンバス）</td>
            <td class="r3">2時間55分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→東京（羽田）→大分空港→由布院駅前バスセンター</td>
            <td class="r2">飛行機→バス（湯布院高速リムジンバス）</td>
            <td class="r3">5時間15分</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台空港）→大阪（伊丹）→大分空港→由布院駅前バスセンター</td>
            <td class="r2">飛行機→バス（湯布院高速リムジンバス）</td>
            <td class="r3">4時間45分</td>
        </tr>
        <tr>
            <td class="r1">名古屋（中部国際空港）→大分空港→由布院駅前バスセンター</td>
            <td class="r2">飛行機→バス（湯布院高速リムジンバス）</td>
            <td class="r3">2時間30分</td>
        </tr>
        <tr>
            <td class="r1">大阪（伊丹空港）→大分空港→由布院駅前バスセンター</td>
            <td class="r2">飛行機→バス（湯布院高速リムジンバス）</td>
            <td class="r3">2時間15分</td>
        </tr>
        <tr>
            <td class="r1">福岡（博多バスターミナル）→由布院駅前バスセンター</td>
            <td class="r2">バス（ゆふいん号）</td>
            <td class="r3">2時間</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>由布院温泉</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/oita/yufuin/yufuin-onsen.jpg"
                alt="由布院温泉">
            <p>湯布院へ行ったら由布院温泉、湯平温泉、塚原温泉の温泉めぐりをしない手はありません。中でも由布院温泉は日本で2番目の湧出量をほこるります。泉質は単純泉で、神経痛や関節痛、筋肉痛、疲労回復などに効能があります。由布岳のふともに広がる温泉地は「別府の奥座敷」ともよばれ、豊かな自然に囲まれた風光明媚な温泉地です。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>狭霧台</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/oita/yufuin/sagiridai.jpg"
                alt="狭霧台">
            <p>由布岳のふもとに広がる湯布院の温泉街を見下ろす場所にある展望台です。秋から冬にかけては由布院盆地に朝霧がかかる様子を見ることができる絶好の撮影スポットになっています。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>金鱗湖</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/oita/yufuin/kinrinko.jpg"
                alt="金鱗湖">
            <p>かつて由布院盆地は湖になっていたと言われています。その湖の岸をウナギヒメという神様が力持ちの男に命じて蹴破らせました。湖の主であった竜がすみかとして与えられたのが金鱗湖であるという言い伝えがあります。池の底からは温泉水が湧き出しているために秋から冬には水面に霧が立ち込めて幻想的な雰囲気が広がります。
            </p>
        </div>
    </div>