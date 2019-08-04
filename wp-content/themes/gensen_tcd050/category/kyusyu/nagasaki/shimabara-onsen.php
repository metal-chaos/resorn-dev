<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/shimabara-onsen/shimabara-onsen.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>島原温泉は長崎県島原市にある温泉街で島原城を中心に城下町として栄え、武家屋敷跡をはじめ江戸時代から現在に続く格式高い景観を残す街、島原に湧く温泉です。泉質は炭酸水素塩泉で特に冷え性の方に効果があります。
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
            <td class="r1">東京（羽田）→長崎空港→島原駅</td>
            <td class="r2">飛行機→島鉄バス</td>
            <td class="r3">3時間</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→長崎空港→島原駅</td>
            <td class="r2">飛行機→島鉄バス</td>
            <td class="r3">5時間30分</td>
        </tr>
        <tr>
            <td class="r1">仙台（仙台空港）→長崎空港→島原駅</td>
            <td class="r2">飛行機→島鉄バス</td>
            <td class="r3">4時間25分</td>
        </tr>
        <tr>
            <td class="r1">名古屋（中部国際空港）→長崎空港→島原駅</td>
            <td class="r2">飛行機→島鉄バス</td>
            <td class="r3">5時間</td>
        </tr>
        <tr>
            <td class="r1">大阪（関西空港）→長崎空港→島原駅</td>
            <td class="r2">飛行機→島鉄バス</td>
            <td class="r3">5時間15分</td>
        </tr>
        <tr>
            <td class="r1">福岡（天神）→島原駅</td>
            <td class="r2">高速バス</td>
            <td class="r3">3時間10分</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>島原城</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/shimabara-onsen/shimabara-onsen-shimabara-castle.jpg"
                alt="島原城">
            <p>江戸初期に松倉重政が安土桃山様式の築城技術の粋を集め、7年の歳月を費やして築いた名城です。館内はキリシタン関連の資料を集めた資料館になっており、彫刻家北村西望の作品を展示している西望記念館や雲仙普賢岳噴火災害を映像と各種資料で紹介している観光復興記念館があります。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>武家屋敷</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/shimabara-onsen/shimabara-onsen-bukeyashiki.jpg"
                alt="武家屋敷">
            <p>山本邸、篠塚邸、鳥田邸などの一般公開せれている武家屋敷があり見学することが出来ます。城下町の面影が色濃く残る街並みと水の都と呼ばれるほどの美しい川のせせらぎを聞きながら町を散策することが出来ます。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>島原温泉</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/shimabara-onsen/shimabara-onsen-kemuri.jpg"
                alt="島原温泉">
            <p>島原半島海岸沿いに湧出する温泉は、泉質が炭酸水素塩泉でさらりとした感触の湯で、肌にやさしく冷え性にも効く効能があります。趣のある露天風呂が楽しめる宿が立ち並び、公共の浴場、島原温泉 ゆとろぎの湯や24時間入れる足湯もあります。
            </p>
        </div>
    </div>