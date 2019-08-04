<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/oita/beppu/beppu-onsen.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>別府温泉は、大分県別府市（旧国豊後国速見郡）に多数ある温泉の総称名で、代表的な8つの温泉を総称して「別府八湯」ともいわれます。源泉数は約2,217で、2位の由布院の約879を引き離して日本一かつ世界一であり、湧出量は日本一です。名物料理は、温泉から噴き出す高温の蒸気が即座に蒸し上げる「地獄蒸し」で、余分な脂分が取り除かれて旨味が凝縮した、さっぱりしたヘルシーな味わいです。
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
            <td class="r1">東京（羽田）→大分空港→別府</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">2時間30分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→福岡空港→別府</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">4時間20分</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）→福岡空港→別府</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">4時間</td>
        </tr>
        <tr>
            <td class="r1">名古屋→大分空港→別府</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">1時間50分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関西空港）→大分空港→別府</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">1時間40分</td>
        </tr>
        <tr>
            <td class="r1">福岡空港→別府</td>
            <td class="r2">バス（とよのくに号）</td>
            <td class="r3">2時間</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>別府地獄めぐり</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/oita/beppu/chinoike-jigoku.jpg"
                alt="別府地獄めぐり">
            <p>「別府地獄めぐり」は、「別府地獄」と例えられる8つの温泉を回る、「別府といえばこれ！」といわれる観光地です。各温泉の湯は成分によりバラエティ豊かな色彩に変色し、噴出口からは高温の蒸気が噴き出して世にも恐ろしい光景に見えるため、地獄と呼ばれています。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>明礬温泉</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/oita/beppu/myouban-onsen.jpg"
                alt="明礬温泉">
            <p>明礬温泉は別府八湯のなかでも最も人気で賑わいのある温泉であり、白く濁った硫黄泉や湯の花が特徴的です。温泉施設「湯の里」では、高台から景色が楽しめる大露天岩風呂や、藁葺き屋根の湯の花小屋をモチーフにした家族風呂などが満喫できます。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>鉄輪温泉</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/oita/beppu/kannawa-onsen.jpg"
                alt="鉄輪温泉">
            <p>鉄輪温泉は別府八湯のひとつであり、中でも特に湯けむりが豪華といわれ、国の重要文化的景観にも選ばれています。「湯けむり展望台」は日本夜景遺産地にも選定され、至るところから湯けむりが立ち上る鉄輪の町を一望できます。
            </p>
        </div>
    </div>