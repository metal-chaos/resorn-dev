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
        <p>種子島は鹿児島県南部の大隅半島南方約35kmの海上にある島で、面積は約446㎢、人口は約3万5千人です。縦に細長いのが特徴で、東西は一番広い場所でも約12kmですが、南北には約72kmあります。また、低い平らな島であり、一番高いところでも約280mしかありません。なお、種子島には西之表市と中種子町、南種子町があります。種子島と言えば、教科書にも載っているように、戦国時代の1543年に漂着したポルトガル人によって初めて日本に鉄砲が伝えられたことで有名です。種子島の名前が鉄砲の代名詞にもなっています。また、江戸時代の1698年に琉球からサツマイモが伝わりました。現在は、種子島宇宙センターが有名になっています。気候は温暖であり、ガジュマルやブッソウゲなどの亜熱帯性植物が繁茂し、サトウキビやタバコ、ラッカセイ、サヤエンドウなどの畑作物、ポンカンやタンカンなどの果樹栽培が盛んです。漁業は沿岸漁業が中心になっており、イカやトビウオ、トコブシなどが穫れます。
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
            <td class="r1">東京（羽田）→種子島空港（鹿児島空港経由）</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間15分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→種子島空港（鹿児島空港経由）</td>
            <td class="r2">飛行機</td>
            <td class="r3">4時間</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）→種子島空港（鹿児島空港経由）</td>
            <td class="r2">飛行機</td>
            <td class="r3">4時間</td>
        </tr>
        <tr>
            <td class="r1">名古屋（中部国際空港）→種子島空港（鹿児島空港経由）</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間</td>
        </tr>
        <tr>
            <td class="r1">大阪（関空）→種子島空港（鹿児島空港経由）</td>
            <td class="r2">飛行機</td>
            <td class="r3">1時間30分</td>
        </tr>
        <tr>
            <td class="r1">福岡（福岡空港）→種子島空港（鹿児島空港経由）</td>
            <td class="r2">飛行機</td>
            <td class="r3">1時間15分</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>種子島宇宙センター</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_1.jpg" alt="種子島宇宙センター">
            <p>「種子島宇宙センター」は南種子町にある宇宙航空研究開発機構(JAXA、ジャクサ)が運営するロケット発射施設であり、1966年に設置されました。約840万㎢の敷地に小型ロケットを打ち上げる竹崎射場と、実用衛星を打ち上げる大崎射場があります。日本初の静止衛星「きく2号」や、気象衛星「ひまわり」が打ち上げられました。射場の周りには追跡管制所やレーダーステーション(2ヶ所)があります。
            </p>
            <p>宇宙センターは無料で、ロケットのエンジンや歴代の宇宙飛行士の写真などを観覧できます。その他、宇宙旅行を体験するシアターや、ロケットの爆音を体験する施設を楽しむことができます。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>浦田海水浴場</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_2.jpg" alt="浦田海水浴場">
            <p>「浦田海水浴場」は日本の海水浴場88選の1つに選ばれており、種子島を代表するビーチになっています。種子島にあるビーチの中では、エメラルドグリーンの海がひと際美しい輝きを放っており、真っ白な砂浜もとてもきれいです。また、南国の海らしく、海の底が透けて見えるほど海水の透明度が高いことから、カメや熱帯魚と遊ぶスキューバダイビングの最適なスポットになっています。なお、シュノーケリングでカラフルな魚を見て楽しむこともできます。
            </p>
            <p>浦田海水浴場は人であふれるということが無く、また休憩所や展望デッキが設けられており、美しい景色をゆっくり堪能できる観光スポットです。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>千座の岩屋(ちくらのいわや)</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_3.jpg" alt="千座の岩屋(ちくらのいわや)">
            <p>侵食によってできた種子島最大の洞窟が「千座の岩屋」です。千人が中に座れるという言い伝えから、千座と名付けられました。干潮時のみ中に入ることができ、岩で作られた自然のオブジェは神秘的です。洞窟から見える海のシルエットが美しく、インスタ映えスポットとして有名です。
            </p>
            <p>なお毎年、千座の岩屋ではスーパープラネタリウムイベント「星の洞窟」が開催され、様々な色に輝く幻想的な星の世界を体感できます。焚き火で焼かれた焼き芋が無料で提供され、その他足湯コーナーやBARスペース、ワークショップなどが設けられます。カップルからファミリーまで憩いの時間を過ごせる楽しいイベントです。
            </p>
        </div>
    </div>