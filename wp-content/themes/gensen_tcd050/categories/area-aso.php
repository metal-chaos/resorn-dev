<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/aso/aso.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>江戸時代に豊後街道の宿場町として発達した「阿蘇市」は、熊本県北東部の地域で阿蘇カルデラの北半を占めます。熊本の象徴である阿蘇山周辺の雄大な自然を楽しめる観光地です。また、雲海や阿蘇五岳を臨む温泉で、幻想的な体験をするのもおすすめです。
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
            <td class="r1">東京（羽田）</td>
            <td class="r2">飛行機</td>
            <td class="r3">1時間50分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）</td>
            <td class="r2">飛行機（成田経由）</td>
            <td class="r3">7時間25分</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）</td>
            <td class="r2">飛行機（大阪伊丹経由）</td>
            <td class="r3">4時間30分</td>
        </tr>
        <tr>
            <td class="r1">名古屋</td>
            <td class="r2">飛行機</td>
            <td class="r3">1時間20分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関西空港）</td>
            <td class="r2">飛行機</td>
            <td class="r3">1時間15分</td>
        </tr>
        <tr>
            <td class="r1">福岡</td>
            <td class="r2">電車</td>
            <td class="r3">4時間15分</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>かぶと岩展望所</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/aso/aso-kabutoiwa.jpg"
                alt="かぶと岩展望所">
            <p>小高い丘にある展望所から阿蘇の外輪山を背景にした町並みを望むことができる絶好のスポットです。駐車場が４０台分ありますので、レンタカーで立ち寄るのがおすすめ。夜には幻想的な夜景を楽しむこともできます。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>阿蘇神社</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/aso/aso-aso-shrine.jpg"
                alt="阿蘇神社">
            <p>日本最古の歴史をもつ由緒ある神社です。境内には、３回なでて願い事を唱えるとその願い事がかなうという『願掛け石』や、恋人が欲しい人がその周りを２回まわると良縁にめぐまれるという『高砂の松』といったパワースポットがあります。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>阿蘇ネイチャーランド</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/aso/aso-nature-land.jpg"
                alt="阿蘇ネイチャーランド">
            <p>パラグライダーや熱気球、トレッキングなど、阿蘇の雄大な自然を全身で感じながら様々なアクティビティを体験できる観光スポットです。すべてのアクティビティが予約制なので計画的に観光できるのも魅力です。
            </p>
        </div>
    </div>