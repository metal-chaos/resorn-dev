<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/saga/ureshino-onsen.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>嬉野温泉は、佐賀県嬉野市嬉野町（旧国肥前国）にある温泉で、武雄温泉と並び九州を代表する温泉です。栃木県の「喜連川温泉」、島根県の「斐乃上温泉」と並んで「日本三大美肌の湯」にも選ばれた名湯です。名物料理は温泉水で豆腐を煮込んだ「嬉野温泉湯どうふ」で、豆腐の成分が溶け出しスープが白濁したとろとろ食感が舌をとろけさせます。
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
            <td class="r1">東京（成田）→佐賀空港</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間15分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→福岡空港→嬉野温泉バスセンター</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">4時間</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）→福岡空港→嬉野温泉バスセンター</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">3時間30分</td>
        </tr>
        <tr>
            <td class="r1">名古屋→福岡空港→嬉野温泉バスセンター</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">3時間</td>
        </tr>
        <tr>
            <td class="r1">大阪（関西空港）→福岡空港→嬉野温泉バスセンター</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">2時間45分</td>
        </tr>
        <tr>
            <td class="r1">福岡→嬉野温泉バスセンター</td>
            <td class="r2">バス（九州号）</td>
            <td class="r3">2時間</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>シーボルトの湯</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/saga/ureshino-onsen-siebold.jpg" alt="シーボルトの湯">
            <p>ゴシック風木造2階建ての日帰り温泉「嬉野温泉公衆浴場シーボルトの湯」は、平成22年にオープンし、平成25年3月に入場者数25万人を達成した人気の宿です。1996年に歴史を閉じた公衆浴場「古湯」がリニューアルオープンしたものです。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>轟の滝</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/saga/ureshino-onsen-todorokinotaki.jpg" alt="轟の滝">
            <p>嬉野の温泉街から長崎方面に1kmほど行くと見える「轟の滝」は、岩屋川内山系と不動山山系の連峰の清水が塩田川に合流した滝です。3段の滝で、落差は11mを誇ります。武雄温泉駅からバスで20分、JR嬉野温泉駅から徒歩10分で向かうことができます。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>豊玉姫神社</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/saga/ureshino-onsen-toyotamahime.jpg" alt="豊玉姫神社">
            <p>嬉野温泉商店街沿い、旅館大正屋の前に参道がある「豊玉姫神社」は、安産の神として鎮座する「トヨタマヒメ」の名を冠した神社です。境内には、豊玉姫の使いとされる「なまず様」が祀られており、美肌効果を感じることができます。
            </p>
        </div>
    </div>