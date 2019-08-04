<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/unzen/unzen.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>雲仙は長崎県小浜町にある温泉で、昭和９年に日本で初めて国立公園に指定されました。メインスポットは硫黄の匂いに包まれ、白い蒸気が勢いよく立ち上る「雲仙地獄」。30あまりの地獄があり、キリシタン殉教の舞台としても有名です。雲仙地獄めぐりの名物になっている温泉たまご、島原半島で獲れる新鮮な海鮮や手間暇かけて育てられた地元野菜など「食」の楽しみも多くあります。
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
            <td class="r1">東京（羽田）→長崎空港→雲仙</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">5時間</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→福岡空港→博多→雲仙</td>
            <td class="r2">飛行機→電車→バス</td>
            <td class="r3">7時間</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）→福岡空港→博多→雲仙</td>
            <td class="r2">飛行機→電車→バス</td>
            <td class="r3">7時間</td>
        </tr>
        <tr>
            <td class="r1">名古屋空港→福岡空港→博多→雲仙</td>
            <td class="r2">飛行機→電車→バス</td>
            <td class="r3">5時間40分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関空）→長崎空港→雲仙</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">4時間50分</td>
        </tr>
        <tr>
            <td class="r1">福岡→博多→雲仙</td>
            <td class="r2">電車→バス</td>
            <td class="r3">3時間45分</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>仁田峠ロープウェイ</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/unzen/nagasaki-nitamisaki-ropeway.jpg"
                alt="仁田峠ロープウェイ">
            <p>標高差約174m、距離にして約500mを結ぶロープウェイです。海抜1300m上空を空中散歩しながら眺める景色は抜群で、春はツツジ、夏はヤマボウシ、秋は紅葉、冬は花ぼうろと四季折々でまったく異なる表情を見せる大自然を満喫できます。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>温泉神社</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/unzen/unzen-unzen-jinja.jpg"
                alt="温泉神社">
            <p>古くからこの地域の祈願所として有名であった温泉神社（うんぜんじんじゃ）の総本山です。この神社は雲仙地獄のすぐ近くにあり、無料で参拝できるため、周辺を散策している途中に立ち寄りやすい観光スポットです。また、恋愛成就のパワースポットとしても有名です。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>白雲の池</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/unzen/unzen-shirokumonoike.jpg"
                alt="白雲の池">
            <p>温泉街から徒歩でおよそ20分のところにあり、レンタルボートやキャンプを楽しむこともできます。近くある絹笠山では野鳥のさえずりや心地よい風を感じながらの散策も可能で、山頂からは雲仙の温泉街や山々を一望できます。
            </p>
        </div>
    </div>