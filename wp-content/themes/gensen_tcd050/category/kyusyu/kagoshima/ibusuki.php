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
        <p>指宿は、鹿児島県薩摩半島の南東に位置し、指宿温泉が有名です。デトックスや美肌効果が期待できる、砂蒸し風呂も楽しむことができます。また、温泉卵を使った「温たまらん丼」をはじめとするご当地グルメからパワースポット神社など、見どころがたくさんあります。雄大な自然に囲まれながら心も体もリフレッシュすることができます。
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
            <td class="r1">東京（羽田）→鹿児島空港→指宿</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">3時間30分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→鹿児島空港→指宿</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">5時間30分</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）→鹿児島空港→指宿</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">4時間20分</td>
        </tr>
        <tr>
            <td class="r1">名古屋→鹿児島空港→指宿</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">2時間45分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関空）→鹿児島空港→指宿</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">2時間40分</td>
        </tr>
        <tr>
            <td class="r1"> 福岡→鹿児島中央駅→指宿駅</td>
            <td class="r2">バス→電車</td>
            <td class="r3">4時間40分</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>指宿温泉</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_1.jpg" alt="指宿温泉">
            <p>「指宿温泉」とは、指宿市東部にある摺ヶ浜温泉、弥次ヶ湯温泉、二月田温泉などの温泉群のことを言います。阿多カルデラのマグマで温められたお湯が、一日に約１２万トンも湧き出ているそうです。デトックス効果のある砂蒸し風呂も有名です。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>開聞岳</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_2.jpg" alt="開聞岳">
            <p>薩摩半島の南端に位置する「開聞岳」は標高９２４mの火山です。1964年3月16日に霧島屋久国立公園に指定され、日本百名山にも指定されています。山麓の北東部分は陸地に、南西部分は海に面していて、山の形から「薩摩富士」とも呼ばれています。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>池田湖</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_3.jpg" alt="池田湖">
            <p>薩摩半島南東部にある直径約３.５kmの「池田湖」は九州最大の湖です。深さは２３３mで、湖底には直径約８００m、高さ約１５０mの湖底火山があります。昔は「神の御池」と呼ばれており、龍神伝説があります。
            </p>
        </div>
    </div>